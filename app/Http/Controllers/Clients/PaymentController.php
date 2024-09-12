<?php

namespace App\Http\Controllers\Clients;

use App\Mail\SendOrderEmail;
use Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    protected $cart;
    protected $cartItem;
    protected $user;
    protected $order;
    protected $orderItem;
    public function __construct(Cart $cart, CartItem $cartItem, User $user, Order $order, OrderItem $orderItem)
    {
        $this->cart = $cart;
        $this->cartItem = $cartItem;
        $this->user = $user;
        $this->order = $order;
        $this->orderItem = $orderItem;
    }
    public function cart()
    {
        // tạm cho userId = 2;
        $userId = Auth::id();
        $cartId = $this->cart->where('user_id', $userId)->first()->id;
        $cartItems = $this->cartItem->where('cart_id', $cartId)->with('product:id,name')->get();

        return view('clients.payments.cart', compact('cartItems'));
    }
    public function changeCart(Request $request)
    {
        $action = $request->query('action');
        $id = $request->query('id');
        $cartItem = $this->cartItem->findOrFail($id);
        if ($action == 'less') {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }

            return redirect()->back();
        } else {
            $cartItem->quantity += 1;
            $cartItem->save();

            return redirect()->back();
        }
    }
    public function removeCart($id)
    {
        $cartItem = $this->cartItem->findOrFail($id);
        $cartItem->delete();

        return redirect()->back();
    }
    public function orderConfirmation(Request $request)
    {
        $userId = Auth::id();
        $user = $this->user->findOrFail($userId);
        $cartId = $this->cart->where('user_id', $userId)->first()->id;
        $cartItems = $this->cartItem->where('cart_id', $cartId)->with('product:id,name')->get();
        $totalAmount = $request->input('total_amount');

        return view('clients.payments.orderConfirmation', compact('totalAmount', 'cartItems', 'user'));
    }

    public function createOrder(Request $request)
    {
        // Cập nhật users
        $userId = Auth::id();
        $user = $this->user->findOrFail($userId);
        $userData = $request->all([
            'name',
            'number',
            'address',
        ]);
        $user->update($userData);

        // Thêm vào orders
        $orderData = $request->all([
            'total_amount',
        ]);
        $orderData['user_id'] = $userId;
        $YYYYMMDD = date('Ymd');
        $lastOrder = $this->order->orderBy('id', 'desc')->first();
        if ($lastOrder) {
            $orderCode = $lastOrder->order_code;
            $lastOrderCode = substr($orderCode, -4) + 1;
        } else {
            $lastOrderCode = 1;
        }
        $XXXX = str_pad($lastOrderCode, 4, '0', STR_PAD_LEFT);
        $orderCode = "ORD-$YYYYMMDD-$XXXX";
        $orderData['order_code'] = $orderCode;
        $order = $this->order->create($orderData);

        // Thêm vào oder_items
        $products = $request->input('products');
        $orderItemData = [];
        $orderItemData['order_id'] = $order->id;
        foreach ($products as $product) {
            $orderItemData['product_id'] = $product['product_id'];
            $orderItemData['quantity'] = $product['quantity'];
            $orderItemData['price'] = $product['price'];
            $this->orderItem->create($orderItemData);
        }

        // Gửi Mail
        $user = Auth::user();
        $order = $this->order->where('user_id', $user->id)->orderBy('id', 'desc')->with(['orderItem.product', 'user'])->first();
        Mail::to($user->email)->send(new SendOrderEmail($order));

        // Xóa khỏi cart_items
        $userId = Auth::id();
        $cartId = $this->cart->where('user_id', $userId)->pluck('id')->first();
        $this->cartItem->where('cart_id', $cartId)->delete();

        return redirect()->route('thank-you', compact('orderCode'));
    }
    public function thankYou()
    {
        $orderCode = $_GET['orderCode'];

        return view('clients.payments.thankYou', compact('orderCode'));
    }

    public function orderProcessing($id)
    {
        $order = $this->order->findOrFail($id);
        $order->status = 'processing';
        $order->save();

        return redirect()->route('home')->with('success', 'The order is being processed, 
        we will contact you when the order is completed');
    }
}
