<?php

namespace App\Http\Controllers;

use App\Interfaces\ReviewInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    private $reviewInterface;
    public function __construct(ReviewInterface $reviewInterface)
    {
        $this->reviewInterface = $reviewInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => $this->reviewInterface->getAllReviews()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reviewDetails = $request->only([
            'review_date',
            'comment',
            'qualification',
            'user_id',
            'book_id',
        ]);
        return response()->json(['data' => $this->reviewInterface->createReview($reviewDetails)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['data' => $this->reviewInterface->getReviewById($id)]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newDetails = $request->only([
            'review_date',
            'comment',
            'qualification',
            'user_id',
            'book_id',
        ]);
        return response()->json(['data' => $this->reviewInterface->updateReview($id, $newDetails)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->reviewInterface->deleteReview($id);
        return response()->noContent();
    }
}
