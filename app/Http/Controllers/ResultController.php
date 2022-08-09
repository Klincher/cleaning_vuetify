<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index($id)
    {
        $sum = Order::find($id)->sum;

        return view('result', ['sum' => $sum]);
    }

    public function clear(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('welcome');
    }
}
