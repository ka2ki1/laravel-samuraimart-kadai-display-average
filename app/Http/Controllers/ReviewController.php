<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required'
        ]);

        $review = new Review();
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->product_id = $request->input('product_id');
        $review->user_id = Auth::user()->id;
        $review->save();

        return back();
    }

}
