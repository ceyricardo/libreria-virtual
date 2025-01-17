<?php

namespace App\Interfaces;

interface ReviewInterface 
{
    public function getAllReviews();
    public function getReviewById($reviewId);
    public function deleteReview($reviewId);
    public function createReview(array $reviewDetails);
    public function updateReview($reviewId, array $newDetails);
}