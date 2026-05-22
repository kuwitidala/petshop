<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::with(['user', 'product'])->paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->back()->withErrors(['auth' => 'Для добавления отзыва нужно войти в аккаунт.']);
        }

        $validatedData = $request->validate([
            'text' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'text' => $validatedData['text'],
            'rating' => $validatedData['rating'],
            'is_approved' => false,
        ]);

        return redirect()->route('product.show', $productId)->with('success', 'Спасибо за ваш отзыв! Он будет опубликован после проверки модератором.');
    }
}
