<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Contracts\View\View;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request): View
    {
        $query = Property::filter($request->input());
        $properties = $query->orderByDesc("created_at")->paginate(16);
        $input = $request->input();
        return view("properties.index", compact("properties", "input"));
    }

    public function show(string $slug, Property $property): View
    {
        if ($slug !== $property->slug) {
            return redirect()->back();
        }

        return view("properties.show", compact("property"));
    }
}
