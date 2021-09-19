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
        $users = Search::add(User::class, 'name')
            ->beginWithWildcard()
            ->paginate()
            ->get($request->get('term'));

        $companies = Search::add(Company::class, 'name')
            ->beginWithWildcard()
            ->paginate()
            ->get($request->get('term'));

        return view('search', compact('users', 'companies'));
    }
}