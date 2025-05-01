<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageService {

    //On construit le nom de l'image (on y met la date actuelle pour être sûr qu'il soit unique)
    public function getImageFileName($image) {
        return time() . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
    } 

    //On range l'image reçue au bon endroit, avec le bon nom
    /**
     * @param $image = L'image qu'on souhaite stocker
     * @param $path_file_name = Le chemin de stockage
     * @param $disk = Le disque de stockage
     */
    public function store($image, $path_file_name, $disk='public') {
        $filename = $this->getImageFileName($image);
        $image->storeAs($path_file_name, $filename, $disk);
    }

    //On efface l'ancienne image si on en a reçu une nouvelle, et uniquement si ce n'est pas une image de base stockée dans /storage/app/public/seed
    public function delete($item, $disk='public') {
        if (!Str::of($item)->startsWith('seed/')) {
            Storage::disk($disk)->delete($item);
        }
    }

}