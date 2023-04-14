<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.properties.index", [
            "properties" => Property::orderByDesc("created_at")->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $property = new Property();
        $property->fill([
            "title" => "Lorem ipsum dolor",
            "description" => "Lorem ipsum dolor",
            "surface" => 40,
            "rooms" => 3,
            "bedrooms" => 1,
            "floor" => 0,
            "price" => 32000,
            "city" => "Paris",
            "address" => "Vigneux-sur-seine",
            "postal_code" => 91270,
            "sold" => false,
        ]);
        return view("admin.properties.create", [
            "property" => $property,
            "options"  => Option::pluck("name", "id")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
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
    public function edit(Property $property)
    {
        return view("admin.properties.edit", [
            "property" => $property,
            "options"  => Option::pluck("name", "id")
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync(
            $request->validated("options")
        );
        return to_route("admin.property.index")->with("success", "Le bien à été modifier.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route("admin.property.index")->with("success", "Le bien à été supprimé.");
    }
}
