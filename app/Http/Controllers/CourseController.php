<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\RamassageController;
use App\Http\Controllers\ImageUploadController;

class CourseController extends Controller
{
    public function index(){
        return view('course');
    }
    public function store(Request $request)
    {
        try {


            $stop = new StopController;
            $stopId = $stop->create();

            $client = new ClientController;
            $clientId = $client->create($request);

        $x = count($request['username']);

        for($i = 0; $i < $x; $i++){
            $ramassage = new RamassageController;
            $ramassageId = $ramassage->create($request['adresse_rammasage'][$i]['adresse_rammasage']);

            $ramassage = new RamassageController;
            $ramassageAvant = $ramassage->ramassageAvant($request['ramassage_avant'][$i]['ramassage_avant']);


            $livraison = new LivraisonController;
            $livraisonAvant = $livraison->livraisonAvant($request['livraison_avant'][$i]['livraison_avant']);

            $livraison = new LivraisonController;
            $livraisonId = $livraison->create($request['adresse_livraison'][$i]['adresse_livraison']);
            $image = new ImageUploadController;
            $imageUploader = $image->upload($request['thumbnail'][$i]['thumbnail']);



            $course = Course::create([
                'stop_id' => $stopId,
                'client_id' => $clientId[$i],
                'ramassage_id' => $ramassageId,
                'ramassage_avant' => $ramassageAvant,
                'livraison_id' => $livraisonId,
                'livraison_avant' => $livraisonAvant,
                'description' => $request['description'][$i]['description'],
                'etat' => '0',
                'thumbnail' => $imageUploader

            ]);

        }
        return redirect('/dashboard')->with('success', 'Votre course a été crée');
    } catch (\Exception $th) {
        return redirect('/dashboard')->with('error', 'Error de creation');
        }

    }
}
