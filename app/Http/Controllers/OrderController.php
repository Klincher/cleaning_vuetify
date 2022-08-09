<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Price;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $rooms = ['No rooms', '1 room', '2 rooms', '3 rooms', '4 rooms', '5 rooms', '6 rooms', '7 rooms', '8 rooms', '9 rooms', '10 rooms'];
        $bathrooms = ['0'=> 'No toilets', '0.5' => 'Toilet', '1' => 'Bathroom', '1.5' => 'Combined bathroom'];
        $kitchens = ['No kitchens', '1 kitchen', '2 kitchens', '3 kitchens', '4 kitchens', '5 kitchens'];

        if ($id = session('order_id')) {
            $order = Order::find($id);
            return view('welcome', ['order' => $order, 'rooms' => $rooms, 'bathrooms' => $bathrooms, 'kitchens' => $kitchens]);
        }

        return view('welcome', ['rooms' => $rooms, 'bathrooms' => $bathrooms, 'kitchens' => $kitchens]);
    }

    public function store(StoreOrderRequest $request)
    {

        $options = ['area', 'rooms', 'bathrooms', 'kitchens', 'fridges', 'wardrobes', 'animals', 'adults', 'children'];
        $sum = 0;

        foreach ($options as $option) {
            if ($request->filled($option)) {
                $price = Price::where('name', '=', $option)->first()->price;
                $sum += (int) $request->input($option) * $price;
            }
        }

        $client = Client::updateOrCreate(
            ['phone' => $request->phone],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]
        );

        // if ($request->session()->has('order_id')) {
        //     $order = Order::find(intval(session()->get('order_id')));
        // } else {
        //     $order = new Order;
        //     $order->client_id = $client->id;
        // // }

        // $order->status = 'created';
        // $order->sum = $sum;
        // $order->address = $request->address;
        // $order->area = $request->area;
        // $order->rooms = $request->rooms ?? 0;
        // $order->bathrooms = $request->bathrooms ?? 0;
        // $order->kitchens = $request->kitchens ?? 0;
        // $order->fridges = $request->fridges ?? 0;
        // $order->wardrobes = $request->wardrobes ?? 0;
        // $order->animals = $request->animals ?? 0;
        // $order->adults = $request->adults ?? 0;
        // $order->children = $request->children ?? 0;
        // $order->save();

        // session(['order_id' => $order->id]);

        // return redirect()->route('result');
    }
}
