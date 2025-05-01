<?php

namespace App\Http\Controllers\Api;

use App\Models\CrewMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrewMemberController extends Controller
{
    public function index() {
        $crewMembers = CrewMember::all();
        return $crewMembers;
    }

    public function show($id) {
        $crewMember = CrewMember::findOrFail($id);
        return $crewMember;
    }
}
