<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestinationController extends Controller
{
    /**
     * @group Destinations
     * 
     * Fetch all destinations
     * 
     * @response 200 [
     * 
     *  {
     *      "id": 1,
     *      "name": "Moon",
     *      "distance": "384,400 km",
     *      "travel_time": "3 days",
     *      "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re            there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *      "image_png": "seed/image-moon.png",
     *      "image_webp": "seed/image-moon.webp",
     *      "created_at": "2025-05-01T15:50:39.000000Z",
     *      "updated_at": "2025-05-01T15:50:39.000000Z"
     *  },
     * 
     * 
     *  {
     *      "id": 2,
     *      "name": "Mars",
     *      "distance": "225 mil. km",
     *      "travel_time": "9 months",
     *      "description": "Don’t forget to pack your hiking boots. You’ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It’s two and a half times the size of Everest!",
     *      "image_png": "seed/image-mars.png",
     *      "image_webp": "seed/image-mars.webp",
     *      "created_at": "2025-05-01T15:50:39.000000Z",
     *      "updated_at": "2025-05-01T15:50:39.000000Z"
     *  },
     * 
     * ...
     * 
     * ]
     * 
     */
    public function index() {
        $destinations = Destination::all();
        return $destinations;
    }
    /**
     * @group Destinations
     * 
     * Fetch one specific destination
     * 
     * @response 200 {
     *      "id": 1,
     *      "name": "Moon",
     *      "distance": "384,400 km",
     *      "travel_time": "3 days",
     *      "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re            there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *      "image_png": "seed/image-moon.png",
     *      "image_webp": "seed/image-moon.webp",
     *      "created_at": "2025-05-01T15:50:39.000000Z",
     *      "updated_at": "2025-05-01T15:50:39.000000Z"
     *  }
     */
    public function show($id) {
        $destination = Destination::findOrFail($id);
        return $destination;
    }
}
