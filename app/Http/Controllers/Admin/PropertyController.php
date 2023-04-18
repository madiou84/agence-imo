<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $properties = Property::query()->orderByDesc("created_at")->paginate(12);
        return view("admin.properties.index", compact("properties"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $property = new Property();
        return view("admin.properties.create", [
            "property" => $property,
            "options"  => Option::pluck("name", "id")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());
        $property->options()->sync(
            $request->validated("options")
        );
        return to_route("admin.property.index")->with("success", "Le bien à été créer.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): View
    {
        return view("admin.properties.edit", [
            "property" => $property,
            "options"  => Option::pluck("name", "id")
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile("thumbnail")) {
            $file_path = $request->file("thumbnail")->store("public");
            $file_name = str_replace("public", "storage", $file_path);

            $data = array_merge(
                $data,
                ["thumbnail" => $file_name]
            );
        }

        // Update properties
        $property->update($data);

        // Update options
        $property->options()->sync(
            $request->validated("options")
        );
        return to_route("admin.property.index")->with("success", "Le bien à été modifier.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return to_route("admin.property.index")->with("success", "Le bien à été supprimé.");
    }
}
