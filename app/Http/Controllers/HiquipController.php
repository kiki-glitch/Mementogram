<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Session;

class HiquipController extends Controller
{
    public function hiquipview(){

        $products = Products::all();
        return view('hiquip.hiquipview',['products'=>$products]);
    }
     public function hiquipview_product($id){

        $product = Products::find($id);
        return view('hiquip.hiquipview_product',['product'=>$product]);
    } 

    public function add_to_cart(Products $product){

       // dd($product);

        //$product = Products::findOrFail($productid);

        //add to cart
        \Cart::session(auth()->id())->add(array(
        'id' => $product->id,
        'name' => $product->name,
        //'category'=>$product->category,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
    ));
    
    return redirect()->route('cart.index');
    }

    public function cart(){

        $cartItems = \Cart::session(auth()->id())->getContent();

        return view('hiquip.cart',compact('cartItems'));
    }

     public function cart_destroy($itemId){

        $cartItems = \Cart::session(auth()->id())->remove($itemId);

        return back();
    }
    public function cart_update($rowId){

        \Cart::session(auth()->id())->update($rowId, ['quantity'=> array(
                'relative' => false,
                'value' => request('quantity')
        )
    ]);

        return back();
    }
    public function checkout(){

        return view('hiquip.checkout');
    }
    public function checkout_order(Request $request){

         $this->validate($request,
            ['name'=> 'required|max:255',
            'phone'=> 'required|regex:/(07)[0-9]{8}/', 
             'location'=> 'required|max:255',
              'email'=> 'required|email|max:255',
            ]);     

         $order = new Order();
       
       $order->name = $request->input('name');
       $order->phone_number =$request->input('name');
       $order->location = $request->input('location');
       $order->email = $request->input('email');
        

       $order->grand_total = \Cart::session(auth()->id())->getTotal();
       $order->item_count = \Cart::session(auth()->id())->getContent()->count();
       $order->user_id = auth()->id();
        
        $order->save();

        //save order items
        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item){

            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity ]);
        }

        //empty cart
         \Cart::session(auth()->id())->clear();

        //send email to customer

        //take user to thank you

        return "order completed,thak you for order"

       // return redirect()->back();*/
        
    }

}
