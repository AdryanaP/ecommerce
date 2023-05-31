<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Review as ResourcesReview;
use App\Models\Review;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $reviews = Review::where('product_id', $id)
        ->get();

        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rating_number' => ['required', 'string'],
        ]);

        $review = new Review();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->comment = $request->input('comment');
        $review->rating_number = $request->input('rating_number');
        $review->product_id = $request->input('product_id');
        $review->client_id = $request->input('clint_id');


        if ($review->save()) {
            return new ResourcesReview($review);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }


    /**ava
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->comment = $request->input('comment');
        $review->rating_number = $request->input('rating_number');
        $review->product = $request->input('product_id');
        $review->client_id = $request->input('client_id');

        if ($review->save()) {
            return new ResourcesReview($review);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        if ($review->delete()) {
            return new ResourcesReview($review);
        }
    }
}
