<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return view('stocks', compact('stocks'));
    }
}
