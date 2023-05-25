<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('add.index');

    }

    /**
     * Show the form for find a esource.
     */
    public function carregarDados()
    {
        //Puxa do banco a lista de arquivos
        $dados = Files::All();

        return response()->json($dados);
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

        $dirPath = "img/files/";

        $requestPath = $request->file('path');

        if ($request->hasFile('path') && $requestPath->isValid()) {
            $extension = $requestPath->getClientOriginalExtension();
            $pathName = md5($requestPath->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestPath->move(public_path($dirPath), $pathName);
            $files->path = $dirPath . $pathName;
            
        }
        else {
            return redirect()->back()->with('error', 'Falha ao fazer upload');
        }

        $files->save();

        $dados = Files::All();

        return response()->json($dados);
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
        $files = Files::findOrFail($id);
        
        $files->path = "";

        $dirPath = "img/files/";

        $requestPath = $request->file('path');

        if ($request->hasFile('path') && $requestPath->isValid()) {
            $extension = $requestPath->getClientOriginalExtension();
            $pathName = md5($requestPath->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestPath->move(public_path($dirPath), $pathName);
            $files->path = $dirPath . $pathName;
            
        }

        else {
            return redirect()->back()->with('error', 'Falha ao fazer upload');
        }

        $files->update();

        $files->save();

        return response()->json($files);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $files = Files::findOrFail($id);
        $files->delete();

        return response()->json($files);
    }
}
