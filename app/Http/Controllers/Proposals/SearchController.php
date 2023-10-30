<?php

namespace App\Http\Controllers\Proposals;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $searchQuery = $request->input('search');

        // Виконуємо запит до бази даних для пошуку пропозицій
        $proposals = Proposal::where('title', 'LIKE', "%$searchQuery%")
            ->orWhere('id', $searchQuery)
            ->orWhere('author', 'LIKE', "%$searchQuery%")
            ->get();

        $count = $proposals->count();

        return view('main.index', ["proposals" => $proposals, "searchQuery" => $searchQuery, "count" => $count]);
    }
}
