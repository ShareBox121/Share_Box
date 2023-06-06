<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::All();
        $dados = Files::All();

        return view('add.index', compact('dados', 'user'));
    }

    /**
     * Show the form for find a esource.
     */
    public function carregarDados()
    {
        //Puxa do banco a lista de arquivos
        $dados = Files::All();

        

        foreach ($dados as $dado) {
            if ($dado->type == "mp4") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "txt") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "pdf") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "docx" || $dado->type == "doc") {
                $dado->path = $dado->image;
            }
        }

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

        $files->user_id = Auth::user()->id;

        $files->image = "";
        $files->title = $request->title;
        $files->path = "";

        $files->description = $request->description;

        $files->type = "";

        $dirPath = "img/files/";

        $requestPath = $request->file('path');

        if ($request->hasFile('path') && $requestPath->isValid()) {
            $extension = $requestPath->getClientOriginalExtension();
            $pathName = md5($requestPath->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestPath->move(public_path($dirPath), $pathName);
            $files->type = $extension;
            if ($extension === "txt" || $extension === "pdf" || $extension === "docx" || $extension === "doc" || $extension === "mp4") {

                if ($extension === "txt") {
                    $files->image = "/img/iconFiles/iconTXT.png";
                } elseif ($extension === "pdf") {
                    $files->image = "/img/iconFiles/iconPDF.png";
                } elseif ($extension === "docx" || $extension === "doc") {
                    $files->image = "/img/iconFiles/iconDOCX.png";
                } elseif ($extension === "mp4") {
                    $files->image = "/img/iconFiles/iconMP4.png";
                }
                $files->path = $dirPath . $pathName;
            } elseif ($extension === "png" || $extension === "jpg" || $extension === "jpeg") {
                $files->path = $dirPath . $pathName;
            } else {
                return redirect()->back()->with('error', 'Falha ao fazer upload');
            }
        } else {
            return redirect()->back()->with('error', 'Falha ao fazer upload');
        }

        $files->save();

        $dados = Files::All();

        foreach ($dados as $dado) {
            if ($dado->type == "mp4") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "txt") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "pdf") {
                $dado->path = $dado->image;
            }
            if ($dado->type == "docx" || $dado->type == "doc") {
                $dado->path = $dado->image;
            }

            $user = User::where('id', $dados->user_id)->first();

            $dado->username = $user->name;
        }

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
        } else {
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
