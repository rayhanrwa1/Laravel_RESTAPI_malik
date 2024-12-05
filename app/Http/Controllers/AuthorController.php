<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'data' => $authors,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully.',
            'data' => $author,
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $author,
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $author->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully.',
            'data' => $author,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully.',
        ]);
    }
}
