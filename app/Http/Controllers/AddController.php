<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = Files::All();

        return view('add.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Rota de criação e adição de conteudo
        return view('add.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'path' => 'required',
        ]);

        $files = new Files;

        $files->path = "";

        $dirPath = "images/files/";

        if ($request->hasFile('path') && $request->file('path')->isValid()) {
            $requestPath = $request->path;
            $extension = $requestPath->extension();

            $pathName = md5($requestPath->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestPath->move(public_path($dirPath), $pathName);
            $files->path = $dirPath . $pathName;
        }

        $files->save();
        
        return redirect()->route('site.home');
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
