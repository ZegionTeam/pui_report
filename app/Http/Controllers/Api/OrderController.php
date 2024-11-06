<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Hello";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cart()
    {
        try {
            $user = Auth::guard('api')->user();
            $cart = Cart::where('user_id', $user->id)
                ->with('menu')
                ->get();

            return response()->json([
                'message' => 'Success',
                'data' => $cart
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    public function history()
    {
        try {
            $user = Auth::guard('api')->user();
            $orders = Order::where('user_id', $user->id)
                ->with('orderItems.menu')
                ->get();

            return response()->json([
                'message' => 'Success',
                'data' => $orders
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
