<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Faq;


class HomeController extends Controller{
   public function index()
    {
        $stocks = Stock::limit(4)->get();
        $faqs = Faq::limit(2)->get();

        return view('index', compact('stocks', 'faqs'));
    }
    public function loadNew(Request $request)
    {
        
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 4;

        $products = \App\Models\Product::query()
            ->latest()
            ->skip($offset)
            ->take($limit)
            ->get();

        return response()->json($products);
    }
}
