<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreTechnologyRequest;
use App\Http\Requests\Admin\UpdateTechnologyRequest;

class TechnologyController extends Controller
{
    private $path_file_name = 'images/technology/';

    //Sert juste à rendre disponible les méthodes du service indiqué
    public function __construct(private ImageService $imageService)
    {
        
    }


    public function index() {
        $technologies = Technology::all();
        return view('technologies.list', ['technologies' => $technologies]);
    }

    public function create() {
        return view('technologies.create');
    }

    public function store(StoreTechnologyRequest $request) {

        //On récupère l'image envoyée par le formulaire
        $image = $request->validated('image_portrait');

        // //On range l'image reçue au bon endroit, avec le bon nom
        $this->imageService->store($image, $this->path_file_name);

        $technology = Technology::create([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            //Dans la base, on enregistre une partie du chemin + le nom
            'image_portrait' => $this->path_file_name . $this->imageService->getImageFileName($image)
        ]);

        if(!$technology) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }

        return redirect()->route('list_technologies')->withStatus('success')->withMessage('New Technology created!');
    }

    public function edit($id) {
        $technology = Technology::findOrFail($id);
        return view('technologies.edit', ['technology' => $technology]);
    }

    public function update(UpdateTechnologyRequest $request, $id) {

        $technology = Technology::findOrFail($id);

        $image = $request->validated('image_portrait');
        if ($image) {
            $this->imageService->store($image, $this->path_file_name);
            //On efface l'ancienne image si on en a reçu une nouvelle, et uniquement si ce n'est pas une image de base stockée dans /storage/app/public/seed
            $this->imageService->delete($technology->image_portrait);
        }

        $isUpdated = $technology->update([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
            //On actualise le nom de l'image stocké en base suivant qu'on en ait reçu une nouvelle ou non
            'image_portrait' => $image ? $this->path_file_name . $this->imageService->getImageFileName($image) : $technology->image_portrait
        ]);

        if(!$isUpdated) {
            return back()->widhStatus('error')->withMessage('An error has occured!');
        }

        return redirect()->route('list_technologies')->withStatus('success')->withMessage('Technology updated!');
    }

    public function destroy($id) {

        $technology = Technology::findOrFail($id);

        $isDeleted = $technology->delete();
        if(!$isDeleted) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }

        $this->imageService->delete($technology->image_portrait);
        
        return back()->withStatus('success')->withMessage('Technology has been deleted!');
    }
}
