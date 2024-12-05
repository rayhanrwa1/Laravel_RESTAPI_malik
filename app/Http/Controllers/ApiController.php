<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Author;
use App\Models\Country;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Get all quotes
    public function getQuotes()
    {
        return response()->json(Quote::all());
    }

    // Get all authors
    public function getAuthors()
    {
        return response()->json(Author::all());
    }

    public function getCountry()
    {
        return response()->json(Country::all());
    }
    // Create a new quote
    public function createQuote(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $quote = Quote::create($request->all());
        return response()->json($quote, 201);
    }

    // Create a new author
    public function createAuthor(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'nullable|string',
        ]);

        $author = Author::create($request->all());
        return response()->json($author, 201);
    }
    public function createCountry(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'id_counrty' => 'required|string',
        ]);

        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    // Update a quote
    public function updateQuote(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return response()->json($quote);
    }

    // Delete a quote
    public function deleteQuote($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return response()->json(null, 204);
    }

    // Update an author
    public function updateAuthor(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author);
    }

    // Delete an author
    public function deleteAuthor($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(null, 204);
    }
    public function updateCountry(Request $request, $id)
    {
        $Country = Country::findOrFail($id);
        $Country->update($request->all());

        return response()->json($Country);
    }

    // Delete an author
    public function deleteCountry($id)
    {
        $Country = Country::findOrFail($id);
        $Country->delete();

        return response()->json(null, 204);
    }
}
