<?php

namespace App\Http\Controllers;

use App\Interfaces\BookInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    private $bookInterface;
    public function __construct(BookInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => $this->bookInterface->getAllBooks()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookDetails = $request->only([
            'title',
            'number_of_pages',
            'editorial',
            'publication_date',
            'isbn',
            'author_id'
        ]);

        return response()->json(['data' => $this->bookInterface->createBook($bookDetails)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['data' => $this->bookInterface->getBookById($id)]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newDetails = $request->only([
            'title',
            'number_of_pages',
            'editorial',
            'publication_date',
            'isbn',
            'author_id'
        ]);
        return response()->json(['data' => $this->bookInterface->updateBook($id,$newDetails)]);
    }


    public function getQualification(string $id)
    {
        return response()->json(['data' => $this->bookInterface->calculateBookQualification($id)]);
    }

    public function getReviews(string $id)
    {
        return response()->json(['data' => $this->bookInterface->getReviews($id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookInterface->deleteBook($id);
        return response()->noContent();
    }
}
