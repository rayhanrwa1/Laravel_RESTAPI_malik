<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    public function index(): JsonResponse
    {
        $quotes = Quote::with('author')->get();
        return response()->json([
            'success' => true,
            'data' => $quotes,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'content' => 'required|string',
        ]);

        $quote = Quote::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Quote created successfully.',
            'data' => $quote,
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $quote = Quote::with('author')->find($id);

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $quote,
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found.',
            ], 404);
        }

        $validatedData = $request->validate([
            'author_id' => 'sometimes|required|exists:authors,id',
            'content' => 'sometimes|required|string',
        ]);

        $quote->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Quote updated successfully.',
            'data' => $quote,
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found.',
            ], 404);
        }

        $quote->delete();

        return response()->json([
            'success' => true,
            'message' => 'Quote deleted successfully.',
        ]);
    }
}
