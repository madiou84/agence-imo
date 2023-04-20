<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryFormRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderByDesc("created_at")->paginate(12);
        return view("admin.galleries.index", [
            "galleries" => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Gallery = new Gallery();
        return view("admin.galleries.create", [
            "Gallery" => $Gallery
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryFormRequest $request)
    {
        $file_path = str_replace("public", "storage", $request->file("file_path")->store("public/galleries"));
        Auth::user()->galleries()->create([
            "file_path" => $file_path
        ]);
        return to_route("admin.gallery.index")->with("success", "L'image à été ajouter à la gallerie.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $Gallery)
    {
        $Gallery->delete();
        return to_route("admin.gallery.index")->with("success", "Le bien à été supprimé.");
    }
}