<?php

namespace App\Http\Controllers\Api;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    public function index() {
        $technologies = Technology::all();
        return $technologies;
    }

    public function show($id) {
        $technology = Technology::findOrFail($id);
        return $technology;
    }
}
