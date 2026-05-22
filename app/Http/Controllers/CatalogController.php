<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {

        $query = Product::query();

        if ($search = $request->input('search')) {
            $keywords = array_filter(explode(' ', $search));
            
            if (!empty($keywords)) {
                foreach ($keywords as $word) {
                    $query->where(function($q) use ($word) {
                        $q->orWhere('description', 'like', '%' . $word . '%')
                          ->orWhere('shortDescription', 'like', '%' . $word . '%');
                    });
                }
            }
        }

        if ($request->has('category_id')) {
            $catId = (int)$request->category_id;
            if ($catId > 0) {
                $query->where('category_id', $catId);
            }
        }
        
        if ($request->has('for_dogs') || $request->has('for_cats') || $request->has('for_birds')) {
            $query->where(function($q) use ($request) {
                if ($request->has('for_dogs')) {
                    $q->orWhere('pet', 'like', '%dog%');
                }
                if ($request->has('for_cats')) {
                    $q->orWhere('pet', 'like', '%cat%');
                }
                if ($request->has('for_birds')) {
                    $q->orWhere('pet', 'like', '%bird%');
                }
            });
        }
        
        if ($request->filled('max_price')) {
            $query->whereRaw('CAST(price AS DECIMAL) <= ?', [$request->max_price]);
        }
        
        $products = $query->paginate(12);
        
        return view('catalog', compact('products'));
    }
}