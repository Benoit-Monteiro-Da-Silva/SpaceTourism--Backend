<?php

namespace App\Http\Controllers\Api;

use App\Models\CrewMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrewMemberController extends Controller
{
    /**
     * @group Crew Members
     * 
     * Fetch all Crew Members
     * 
     * @response 200 [
     * 
     *  {
     *      "id": 1,
     *      "name": "Douglas Hurley",
     *      "job": "Commander",
     *      "bio": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
     *      "image_png": "seed/image-douglas-hurley.png",
     *      "image_webp": "seed/image-douglas-hurley.webp",
     *      "created_at": "2025-05-01T15:50:39.000000Z",
     *      "updated_at": "2025-05-01T15:50:39.000000Z"
     *  },
     * 
     *  {
     *      "id": 2,
     *      "name": "Mark Shuttleworth",
     *      "job": "Mission Specialist",
     *      "bio": "Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.",
     *      "image_png": "seed/image-mark-shuttleworth.png",
     *      "image_webp": "seed/image-mark-shuttleworth.webp",
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
        $crewMembers = CrewMember::all();
        return $crewMembers;
    }
    /**
     * @group Crew Members
     * 
     * Fetch one specific Crew Member
     * 
     * @response 200 {
     *      "id": 1,
     *      "name": "Douglas Hurley",
     *      "job": "Commander",
     *      "bio": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
     *      "image_png": "seed/image-douglas-hurley.png",
     *      "image_webp": "seed/image-douglas-hurley.webp",
     *      "created_at": "2025-05-01T15:50:39.000000Z",
     *      "updated_at": "2025-05-01T15:50:39.000000Z"
     *  },
     */
    public function show($id) {
        $crewMember = CrewMember::findOrFail($id);
        return $crewMember;
    }
}
