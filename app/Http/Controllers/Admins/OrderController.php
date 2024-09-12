<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $order;
    protected $orderItem;
    protected $user;
    protected $product;

    public function __construct(Order $order, OrderItem $orderItem, User $user, Product $product)
    {
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->user = $user;
        $this->product = $product;
    }
    public function index()
    {
        $processing = $this->order->with(['orderItem', 'user'])->where('status', 'processing')->paginate(5);
        $pending = $this->order->with(['orderItem', 'user'])->where('status', 'pending')->orderByDesc('id')->paginate(5);

        return view('admins.orders.list', compact('processing','pending'));
    }
    public function completed()
    {
        $completed = $this->order->with(['orderItem', 'user'])->where('status', 'completed')->orderByDesc('id')->paginate(5);

        return view('admins.orders.list', compact('completed'));
    }
    public function canceled()
    {
        $canceled = $this->order->with(['orderItem', 'user'])->where('status', 'canceled')->orderByDesc('id')->paginate(5);

        return view('admins.orders.list', compact('canceled'));
    }

    public function orderDetail($id) 
    {
        $order = $this->order->with(['orderItem.product', 'user'])->findOrFail($id);

        return view('admins.orders.detail', compact('order'));
    }
    public function orderConfirm($id) 
    {
        $order = $this->order->findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return redirect()->route('orders.index');
        
    }
    public function orderCancel($id) 
    {
        $order = $this->order->findOrFail($id);
        $order->status = 'canceled';
        $order->save();

        return redirect()->route('orders.index');
        
    }
}
