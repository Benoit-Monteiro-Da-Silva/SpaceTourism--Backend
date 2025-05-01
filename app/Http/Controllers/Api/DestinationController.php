<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestinationController extends Controller
{
    public function index() {
        $destinations = Destination::all();
        return $destinations;
    }

    public function show($id) {
        $destination = Destination::findOrFail($id);
        return $destination;
    }
}
