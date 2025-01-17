<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => $this->userInterface->getAllUsers()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userDetails = $request->only([
            'name',
            'email'
        ]);
        return response()->json(['data' => $this->userInterface->createUser($userDetails)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(['data' => $this->userInterface->getUserById($id)]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newDetails = $request->only([
            'name',
            'nationality',
            'birthdate',
        ]);
        return response()->json(['data' => $this->userInterface->updateUser($id,$newDetails)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userInterface->deleteUser($id);
        return response()->noContent();
    }
}
