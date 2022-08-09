<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $clients = Client::orderByDesc('updated_at')->paginate(5);
        $orders = Order::orderByDesc('updated_at')->paginate(5);
        $statuses = ['created', 'paid', 'completed', 'canceled'];

        $firstDayOfThisMonth = Carbon::now()->startOfMonth();
        $lastDayOfThisMonth = Carbon::now()->endOfMonth();

        $thisMonth = Order::where('created_at', '>=', $firstDayOfThisMonth)
            ->where('created_at', '<=', $lastDayOfThisMonth)
            ->sum('sum');

        $averageSum = Order::where('created_at', '>=', $firstDayOfThisMonth)
            ->where('created_at', '<=', $lastDayOfThisMonth)
            ->avg('sum');

        $orderCount = Order::where('created_at', '>=', $firstDayOfThisMonth)
            ->where('created_at', '<=', $lastDayOfThisMonth)
            ->count();

        return view('dashboard', [
            'clients' => $clients,
            'orders' => $orders,
            'statuses' => $statuses,
            'thisMonth' => $thisMonth,
            'averageSum' => $averageSum,
            'orderCount' => $orderCount
        ]);
    }

    public function update(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();

        // return response()->json($order->refresh(), 200);

        return redirect()->route('dashboard');
    }
}
