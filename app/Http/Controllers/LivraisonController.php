<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    //

    public function create($request)
    {
        if($request == null){
            return null;
        }else{

        $livraison = Livraison::create([
            'adresse' => $request,
        ]);

        return $livraison->id;
    }

    }

    public function livraisonAvant($request)
    {
        if($request == null){
            return null;
        }else{
            return $request ;
        }
    }

    public function update(Request $request, $livraison_id)
    {
        $livraison = Livraison::find($livraison_id);
        $livraison->update([
            'adresse' => $request->adresse_livraison,
        ]);
    }

}









        // if(isset($request['adresse_livraison'])){
        //     $livraisons = $request['adresse_livraison'];
        //     $livraisonCount = count($livraisons);
        //     $id = [];
        //     // dd($livraisonCount);
        //     for($i = 0; $i < $livraisonCount ; $i++){
        //         if(!$request['adresse_livraison'][$i]['adresse_livraison'] == null){

        //             $livraison = Livraison::create([
        //                 'adresse' => $request['adresse_livraison'][$i]['adresse_livraison'],
        //             ]);
        //             $id[] = $livraison->id;
        //         }
        //     }
