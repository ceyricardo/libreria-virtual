<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthorInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    private AuthorInterface $authorRepository;

    public function __construct(AuthorInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->authorRepository->getAllAuthors()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $authorDetails = $request->only([
            'name',
            'nationality',
            'birthdate'
        ]);

        return response()->json(
            [
                'data' => $this->authorRepository->createAuthor($authorDetails)                
            ],
            
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => $this->authorRepository->getAuthorById($id)
        ]);
    }

    public function getBooks(string $id)
    {                
        return response()->json([
            'data' => $this->authorRepository->getBooks($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $request;
        $newDetails = $request->only([
            'name',
            'nationality',
            'birthdate'
        ]);

        return response()->json(
            [
                'data' => $this->authorRepository->updateAuthor($id, $newDetails)
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorRepository->deleteAuthor($id);
        return response()->noContent();
    }
}
