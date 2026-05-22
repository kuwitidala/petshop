<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.show', compact('review'));
    }

    public function approve($id)
    {

        $review = Review::findOrFail($id);
       $review->update(['is_approved' => 1]);
        $review->save();
        return redirect()->back()->with('success', 'Отзыв успешно одобрен.');
    }

        public function showApproveForm($id)
        {
            $review = Review::findOrFail($id);
            return view('approve', compact('review'));
        }
}