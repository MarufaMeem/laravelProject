<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function getSalesData()
    {
        // Query to fetch sales data based on product_id
        $salesData = DB::table('orders_item')
            ->select('product_id', DB::raw('SUM(quantity) as quantity'))
            ->groupBy('product_id')
            ->get();

        return response()->json($salesData);
    }
}
