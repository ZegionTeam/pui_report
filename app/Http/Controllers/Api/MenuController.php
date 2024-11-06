<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $menus = Menu::all();
            $favoriteMenus = Menu::select('menus.id', 'menus.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
                ->join('order_items', 'order_items.menu_id', '=', 'menus.id')
                ->groupBy('menus.id', 'menus.name')
                ->orderByDesc('total_quantity')
                ->limit(5) // Ambil 5 menu favorit
                ->get();

            return response()->json([
                'message' => 'Success',
                'data' => [
                    'menus' => $menus,
                    'favorite' => $favoriteMenus
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $menus = Menu::where('name', 'like', "%$request->keyword%")->get();

            return response()->json([
                'message' => 'Success',
                'data' => $menus
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed',
                'data' => $th->getMessage()
            ], 500);
        }
    }
}
