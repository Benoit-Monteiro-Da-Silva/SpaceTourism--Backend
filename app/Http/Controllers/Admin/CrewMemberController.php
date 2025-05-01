<?php

namespace App\Http\Controllers\Admin;

use App\Models\CrewMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreCrewMemberRequest;
use App\Http\Requests\Admin\UpdateCrewMemberRequest;

class CrewMemberController extends Controller
{
    private $path_file_name = 'images/crew_member/';

    //Sert juste à rendre disponible les méthodes du service indiqué
    public function __construct(private ImageService $imageService)
    {
        
    }

    public function index() {
        $crew_members = CrewMember::all();
        return view('crew_members.list', ['crew_members' => $crew_members]);
    }

    public function create() {
        return view('crew_members.create');
    }

    public function store(StoreCrewMemberRequest $request) {

        //On récupère l'image envoyée par le formulaire
        $image = $request->validated('image_png');

        // //On range l'image reçue au bon endroit, avec le bon nom
        $this->imageService->store($image, $this->path_file_name);
        
        $crew_member = CrewMember::create([
            'name' => $request->validated('name'),
            'job' => $request->validated('job'),
            'bio' => $request->validated('bio'),
            //Dans la base, on enregistre une partie du chemin + le nom
            'image_png' => $this->path_file_name . $this->imageService->getImageFileName($image)
        ]);

        if(!$crew_member) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }

        return redirect()->route('list_crew_members')->withStatus('success')->withMessage('New CrewMember created!');
    }

    public function edit($id) {
        $crew_member = CrewMember::findOrFail($id);
        return view('crew_members.edit', ['crew_member' => $crew_member]);
    }

    public function update(UpdateCrewMemberRequest $request, $id) {

        $crew_member = CrewMember::findOrFail($id);

        $image = $request->validated('image_png');
        if ($image) {
            $this->imageService->store($image, $this->path_file_name);
            //On efface l'ancienne image si on en a reçu une nouvelle, et uniquement si ce n'est pas une image de base stockée dans /storage/app/public/seed
            $this->imageService->delete($crew_member->image_png);
        }

        $isUpdated = $crew_member->update([
            'name' => $request->validated('name'),
            'job' => $request->validated('job'),
            'bio' => $request->validated('bio'),
            //On actualise le nom de l'image stocké en base suivant qu'on en ait reçu une nouvelle ou non
            'image_png' => $image ? $this->path_file_name . $this->imageService->getImageFileName($image) : $crew_member->image_png
        ]);

        if(!$isUpdated) {
            return back()->widhStatus('error')->withMessage('An error has occured!');
        }

        return redirect()->route('list_crew_members')->withStatus('success')->withMessage('CrewMember updated!');
    }

    public function destroy($id) {

        $crew_member = CrewMember::findOrFail($id);

        $isDeleted = $crew_member->delete();
        if(!$isDeleted) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }

        $this->imageService->delete($crew_member->image_png);
        
        return back()->withStatus('success')->withMessage('CrewMember has been deleted!');
    }
}
