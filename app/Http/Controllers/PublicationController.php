<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class PublicationController extends Controller
{

    public function index()
    {
        $search = request('search');
        $selectedType = request('fileType');

        if ($search) {
            $events = Files::where('title', 'LIKE', "%{$search}%")->get();
        } else {
            $events = Files::all();
        }

        if ($selectedType && $selectedType !== 'all') {
            $events = $events->filter(function ($file) use ($selectedType) {
                $fileExtension = pathinfo($file->path, PATHINFO_EXTENSION);
                if ($selectedType === 'image' && in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
                    return true;
                } elseif ($selectedType === 'document' && in_array($fileExtension, ['pdf', 'txt'])) {
                    return true;
                } elseif ($selectedType === 'video' && $fileExtension === 'mp4') {
                    return true;
                }
                return false;
            });
        }

        $files = Files::all();

        return view('publication.index', compact('files'), ['events' => $events, 'search' => $search, 'selectedType' => $selectedType]);
    }
}
