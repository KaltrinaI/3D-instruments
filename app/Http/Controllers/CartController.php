<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\InstrumentsInfo;
use Illuminate\Http\Request;
use Inacho\CreditCard;

class CartController extends Controller
{
    public function index()
    {
        $data = Cart::content();
        $total = Cart::subtotal();
        return view('shopping_cart', ['data' => $data, 'total' => $total]);
    }


    public function increase($id)
    {
        $instrument = InstrumentsInfo::find($id);
        $rows  = Cart::content();
        $rowID = $rows->where('id', $id)->first()->rowId;
        $cartInstrument = Cart::get($rowID);

        if($cartInstrument->qty < $instrument['in_store']){
            $qty = $cartInstrument->qty + 1;
            Cart::update($rowID, $qty);
        }
        else{
            return back()->with('warning', 'You have reached the limit of available instruments!');
        }

        $data = Cart::content();
        $total = Cart::subtotal();
        return back();
    }


    public function decrease($id)
    {
        $rows  = Cart::content();
        $rowID = $rows->where('id', $id)->first()->rowId;
        $cartInstrument = Cart::get($rowID);

        if($cartInstrument->qty > 1){
            $qty = $cartInstrument->qty - 1;
            Cart::update($rowID, $qty);
        }
        else{
            return back()->with('warning', 'Cannot have a quantity lower than 1!');
        }

        $data = Cart::content();
        $total = Cart::subtotal();
        return back();
    }

    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return back()->with('warning', 'Item is already in your cart!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\InstrumentsInfo');
        return back()->with('success', 'Item was added to your cart!');
    }


    public function remove($id)
    {
        $rows  = Cart::content();
        $rowID = $rows->where('id', $id)->first()->rowId;

        Cart::remove($rowID);
        return redirect('shopping_cart')->with('success', 'Item has been removed!');
    }

    public function clear(){
        Cart::destroy();
        return redirect('shopping_cart')->with('success', 'Cart has been cleared!');
    }

    public function checkout(){
        $data = Cart::content();
        $total = Cart::subtotal();
        return view('checkout', ['data' => $data, 'total' => $total]);
    }


    public function validateCheckout(Request $request){

        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required | numeric',
            'phone' => 'required | numeric',
            'name_on_card' => 'required'
        ]);

        if(strlen($request->phone) != 8)
            return redirect('checkout')->with('danger', 'Invalid phone number!');

        $datetime = explode('-', $request->get('expiration_date'));
        $card = $request->card_number;

        if(CreditCard::validCreditCard($card)['valid'] == 0)
            return back()->with('danger', 'Invalid credit card number!');
        else if(!CreditCard::validCvc($request->cvc, CreditCard::validCreditCard($card)['type']))
            return back()->with('danger', 'Invalid CVC!');
        else if(CreditCard::validDate($datetime[0], $datetime[1]) == false)
            return back()->with('danger', 'Expired card!');

        foreach(Cart::content() as $item){

            $flag = false;
            $instrument = InstrumentsInfo::find($item->id);
            $instrument->in_store = $instrument->in_store - $item->qty;
            if($instrument->in_store == 0)
                $flag = true;
            $instrument->save();
            if($flag)
                InstrumentsInfo::find($item->id)->delete();
        }

        Cart::destroy();
        return redirect('shopping_cart')->with('success', 'Payment successful!');
    }
}
