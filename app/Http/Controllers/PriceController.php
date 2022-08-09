<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();

        return view('editor', ['prices' => $prices]);
    }

    public function update(Request $request)
    {
        $price = Price::find($request->id);
        $price->price = $request->price;
        $price->save();

        return redirect()->route('editor');
    }
}
