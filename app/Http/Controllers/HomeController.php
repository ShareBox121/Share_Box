<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    private function getFilteredPosts($searchType)
    {
        if ($searchType['search']) {
            $search = $searchType['search'];
            return Posts::where('tittle', 'like', "%{$search}%")->get();
        } elseif ($searchType['searchID']) {
            return Posts::where('id', $searchType['searchID'])->get();
        } elseif ($searchType['searchFirst']) {
            $search = $searchType['searchFirst'];
            return Posts::where('tittle', 'LIKE', "{$search}%")->get();
        } else {
            return Posts::all();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
