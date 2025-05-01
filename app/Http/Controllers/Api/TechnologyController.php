<?php

namespace App\Http\Controllers\Api;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{  
    /**
    * @group Technologies
    * 
    * Fetch all Technologies
    * 
    * @response 200 [
    * 
    *  {
    *       "id": 1,
    *       "name": "Launch vehicle",
    *       "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
    *       "image_portrait": "seed/image-launch-vehicle-portrait.jpg",
    *       "image_landscape": "seed/image-launch-vehicle-landscape.jpg",
    *       "created_at": "2025-05-01T15:50:39.000000Z",
    *       "updated_at": "2025-05-01T15:50:39.000000Z"
    *  },
    * 
    *  {
    *       "id": 2,
    *       "name": "Spaceport",
    *       "description": "A spaceport or cosmodrome is a site for launching (or receiving) spacecraft, by analogy to the seaport for ships or airport for aircraft. Based in the famous Cape Canaveral, our spaceport is ideally situated to take advantage of the Earth’s rotation for launch.",
    *       "image_portrait": "seed/image-spaceport-portrait.jpg",
    *       "image_landscape": "seed/image-spaceport-landscape.jpg",
    *       "created_at": "2025-05-01T15:50:39.000000Z",
    *       "updated_at": "2025-05-01T15:50:39.000000Z"
    *  },
    * 
    * ...
    * 
    * ]
    * 
    */
    public function index() {
        $technologies = Technology::all();
        return $technologies;
    }
    /**
    * @group Technologies
    * 
    * Fetch one specific Technology
    * 
    * @response 200 {
    *       "id": 1,
    *       "name": "Launch vehicle",
    *       "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
    *       "image_portrait": "seed/image-launch-vehicle-portrait.jpg",
    *       "image_landscape": "seed/image-launch-vehicle-landscape.jpg",
    *       "created_at": "2025-05-01T15:50:39.000000Z",
    *       "updated_at": "2025-05-01T15:50:39.000000Z"
    *  },
    */
    public function show($id) {
        $technology = Technology::findOrFail($id);
        return $technology;
    }
}
