<?php

namespace App\Repositories;

use App\Interfaces\ReviewInterface;
use App\Models\Review;

class ReviewRepository implements ReviewInterface
{
    public function getAllReviews()
    {
        return Review::all();
    }
    public function getReviewById($reviewId)
    {
        return Review::findOrFail($reviewId);
    }
    public function deleteReview($reviewId)
    {
        Review::destroy($reviewId);
    }
    public function createReview(array $reviewDetails)
    {
        return Review::create($reviewDetails);
    }
    public function updateReview($reviewId, array $newDetails)
    {
        return Review::whereId($reviewId)->update($newDetails);
    }
}
