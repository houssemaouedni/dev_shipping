<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard');

    }
    public function getDatatables(Request $request)
    {
            if(auth()->user()->role === 0){
                $data = Course::all();

            }else{
                $data = Course::all()->reject(function ($user) {
                    return $user->stop->user->id !== auth()->user()->id;
                })->map(function ($course) {
                    return $course;
                });
            }
            if ($request->ajax()) {

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->etat === 0){
                    return '<div class="flex"><a  href="/dashboard/course/'.$row->id.'" class="edit btn btn-success btn-sm m-1">envoyer</a>
                            <a  href="/course/'.$row->id.'" class="edit btn btn-warning btn-sm m-1">edit</a></div>';
                }elseif($row->etat === 1){

                    return '<span> Votre course en Coure de validation </span>
                    ';
                }elseif($row->etat === 2){
                    return '<div class="flex"><a  href="/dashboard/confirmation/'.$row->id.'" role="button" class="edit btn btn-success btn-sm m-1">confirmer</a>
                           <a  href="/dashboard/annulation/'.$row->id.'" role="button" class="edit btn btn-danger btn-sm m-1">annuler</a></div>';
                }elseif($row->etat === 3){
                    return '<span class="badge badge-info">votre course en cours de livraison</span>';
                }elseif($row->etat === 4){
                   return '<div>
                   <span class="badge badge-info">Course Annuler</span>
                   <a  href="/course/'.$row->id.'" class="edit btn btn-warning btn-sm m-1">edit</a></div>';

                }


                })->addColumn('client', function($row){
                    $client = $row->client->username ;
                    return $client;
                })
                ->addColumn('ramassage', function($row){
                    if(!isset($row->ramassage->adresse)){
                        return '<span>null</span>';
                    }else{
                        return $row->ramassage->adresse ;
                    }
                })
                ->addColumn('livraison', function($row){
                    if(!isset($row->livraison->adresse)){

                        return '<span>null</span>';
                    }else{
                        return $row->livraison->adresse ;
                    }
                })
                ->addColumn('livraison_avant', function($row){
                    if(!isset($row->livraison_avant)){

                        return '<span>null</span>';
                    }else{
                        return $row->livraison_avant ;
                    }
                })
                ->rawColumns(['action','client','ramassage','livraison','livraison_avant'])
                ->make(true);
        }
    }


}
