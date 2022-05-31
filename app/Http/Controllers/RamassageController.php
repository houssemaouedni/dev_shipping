<?php

namespace App\Http\Controllers;

use App\Models\Ramassage;
use Illuminate\Http\Request;

class RamassageController extends Controller
{


    public function create($request)
    {
        if($request == null){
            return null;
        }else{
            $ramassage = Ramassage::create([

                'adresse' => $request,
            ]);
            return $ramassage->id;
        }

    }

    public function ramassageAvant($request)
    {
        if($request == null){
            return null;
        }else{
            return $request ;
        }
    }

    public function update(Request $request, $ramassage_id)
    {
        $ramassage = Ramassage::find($ramassage_id);
        $ramassage->update([
            'adresse' => $request->adresse_rammasage,
        ]);

    }
}



        // $livraisons = $request['adresse_rammasage'];

        // $livraisonCount = count($livraisons);

        // $id = [];
        // for($i = 0; $i < $livraisonCount ; $i++){
        //     $livraison = Ramassage::create([
        //         'adresse' => $request['adresse_rammasage'][$i]['adresse_rammasage']
        //     ]);
        //     $id[] = $livraison->id;
        // }

        // return $id ;
