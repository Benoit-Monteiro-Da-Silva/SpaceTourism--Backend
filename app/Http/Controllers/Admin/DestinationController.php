<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreDestinationRequest;
use App\Http\Requests\Admin\UpdateDestinationRequest;

class DestinationController extends Controller
{
    private $path_file_name = 'images/destination/';

    
    //Sert juste à rendre disponible les méthodes du service indiqué
    public function __construct(private ImageService $imageService)
    {
        
    }


    public function index() {
        $destinations = Destination::all();
        return view('destinations.list', ['destinations' => $destinations]);
    }

    public function create() {
        return view('destinations.create');
    }

    public function store(StoreDestinationRequest $request) {
        //On récupère l'image envoyée par le formulaire
        $image = $request->validated('image_png');

        // //On range l'image reçue au bon endroit, avec le bon nom
        $this->imageService->store($image, $this->path_file_name);

        $destination = Destination::create([
            'name' => $request->validated('name'),
            'distance' => $request->validated('distance'),
            'travel_time' => $request->validated('travel_time'),
            'description' => $request->validated('description'),
            //Dans la base, on enregistre une partie du chemin + le nom
            'image_png' => $this->path_file_name . $this->imageService->getImageFileName($image)
        ]);

        if(!$destination) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }
        return redirect()->route('list_destinations')->withStatus('success')->withMessage('New Destination created!');
    }

    public function edit($id) {
        $destination = Destination::findOrFail($id);
        return view('destinations.edit', ['destination' => $destination]);
    }

    public function update(UpdateDestinationRequest $request, $id) {
        $destination = Destination::findOrFail($id);

        $image = $request->validated('image_png');
        if ($image) {
            $this->imageService->store($image, $this->path_file_name);
            //On efface l'ancienne image si on en a reçu une nouvelle, et uniquement si ce n'est pas une image de base stockée dans /storage/app/public/seed
            $this->imageService->delete($destination->image_png);
        }

        $isUpdated = $destination->update([
            'name' => $request->validated('name'),
            'distance' => $request->validated('distance'),
            'travel_time' => $request->validated('travel_time'),
            'description' => $request->validated('description'),
            //On actualise le nom de l'image stocké en base suivant qu'on en ait reçu une nouvelle ou non
            'image_png' => $image ? $this->path_file_name . $this->imageService->getImageFileName($image) : $destination->image_png
        ]);

        if(!$isUpdated) {
            return back()->widhStatus('error')->withMessage('An error has occured!');
        }
        return redirect()->route('list_destinations')->withStatus('success')->withMessage('Destination updated!');
    }

    public function destroy($id) {
        $destination = Destination::findOrFail($id);
        $isDeleted = $destination->delete();
        if(!$isDeleted) {
            return back()->withStatus('error')->withMessage('An error has occured!');
        }
        $this->imageService->delete($destination->image_png);
        return back()->withStatus('success')->withMessage('Destination has been deleted!');
    }
}
