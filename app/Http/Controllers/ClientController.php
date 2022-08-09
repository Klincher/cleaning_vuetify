<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // return view('welcome');
    }

    public function store(Request $request)
    {
        // $client = new Client;
        // $client->phone = $request->phone;
        // $client->first_name = $request->first_name;
        // $client->last_name = $request->last_name;
        // $client->email = $request->email;
        // $client->save();

        // return redirect()->route('welcome');
    }
}
