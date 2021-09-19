<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController
{
    public function index(Request $request)
    {
        $results = Search::addMany([
                [User::class, 'name'],
                [Company::class, 'name']
            ])
            ->beginWithWildcard()
            ->paginate()
            ->get($request->get('term'));

        return view('search', compact('results'));
    }
}
