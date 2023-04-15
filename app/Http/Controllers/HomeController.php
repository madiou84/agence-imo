<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $properties = Property::query()->orderByDesc("created_at")->paginate(25);
        return view("home", compact("properties"));
    }
}
