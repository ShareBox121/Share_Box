<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class PublicationController extends Controller{

    public function index(){
        $search = request('search');

        if($search) {
            $events = Files::where('title','LIKE',"%{$search}%")
            ->get();
        } else {
            $events = Files::all();
        }
       
        $files = Files::all();

        return view('publication.index', compact('files'), ['events' => $events, 'search' => $search]);
    }
}