<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientSalesResource;

class ClientController extends Controller
{
    public function index()
    {
        return inertia('Client/Index', [
            'clients' => Client::orderBy('first_name')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'address' => $user->address,
                    'phone' => $user->phone,
                    'credit_limit' => $user->credit_limit
                ];
            })
        ]);
    }

    public function show(Client $client)
    {
        $sales = Sales::with('soldItem')
            ->where('client_id', $client->id)
            ->get()
            ->map(function ($data) {
                return [
                    'id' => $data->id,
                    'date' => $data->date,
                    'is_credit' => $data->is_credit,
                    'amount' => $data->soldItem->amount
                ];
            });
        
        return inertia('Client/Show', [
            'client' => $client->makeHidden(['created_at', 'updated_at']),
            'sales' => $sales,
        ]);
    }
}
