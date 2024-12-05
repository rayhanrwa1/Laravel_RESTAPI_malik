<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    public function index(): JsonResponse
    {
        $Country = Country::all();

        return response()->json([
            'success' => true,
            'data' => $Country,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_counrty' => 'required|string|max:255',
        ]);

        $author = Country::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully.',
            'data' => $author,
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $Country = Country::find($id);

        if (!$Country) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $Country,
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $Country = Country::find($id);

        if (!$Country) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'id_counrty' => 'required|string|max:255',
        ]);

        $Country->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully.',
            'data' => $Country,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $Country = Country::find($id);

        if (!$Country) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $Country->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully.',
        ]);
    }
}
