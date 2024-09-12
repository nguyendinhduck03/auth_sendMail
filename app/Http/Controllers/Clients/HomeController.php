<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    protected $product;
    protected $category;
    protected $cartItem;
    protected $cart;

    public function __construct(Product $product, Category $category, CartItem $cartItem, Cart $cart) {
        $this->product = $product;
        $this->category = $category;
        $this->cartItem = $cartItem;
        $this->cart = $cart;
    }

    public function home() {
        $products = $this->product->orderBy('id', 'desc')->limit(3)->get();

        return view('clients.homes.home', compact('products'))->with('activePage', 'home');
    }
    public function detailProduct($id) {
        $product = $this->product->findOrFail($id);
        
        return view('clients.homes.detailProduct', compact('product'))->with('activePage', 'products');
    }
    public function products () {
        $categories = $this->category->with('product')->get();

        return view('clients.homes.products', compact('categories'))->with('activePage', 'products');
    }
    public function addToCart (Request $request, $id) {
        // cho tamj user_id = 2
        $userId = Auth::id();
        $cartId = $this->cart->where('user_id', $userId)->first()->id;
        $checkExist = $this->cartItem->where('product_id', $id)->first();
        if($checkExist) {
            $checkExist->quantity += $request->input('quantity');
            $checkExist->save();

            return redirect()->back()->with('message', 'Item quantity updated successfully.');
        } 
        $data = $request->all([
            'quantity',
            'price',
        ]);
        $data['cart_id'] = $cartId;
        $data['product_id'] = $id;

        $this->cartItem->create($data);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
