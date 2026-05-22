<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewApprovalController extends Controller
{
    public function approve(Request $request, Review $review)
    {
        $review->update(['is_approved' => true]);
        return redirect()->route('admin.reviews.index')->with('success', 'Отзыв одобрен');
    }
}