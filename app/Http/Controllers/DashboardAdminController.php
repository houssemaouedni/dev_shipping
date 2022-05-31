<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Course;
use App\Models\Livraison;
use App\Models\Ramassage;
use App\Models\Stop;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardAdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');

    }
    public function getDatatables(Request $request)
        {
            /**
             * importer les donner des users
             */
            if(auth()->user()->role == 1){
                $data = Course::all()->reject(function ($data) {
                    return $data->etat === 0;
                })->map(function ($course) {
                    return $course;
                });

            }else{
                $data = Course::all()->reject(function ($user) {
                    return $user->stop->user->id !== auth()->user()->id;
                })->map(function ($course) {
                    return $course;
                });
            }
            /**
             * importer les donner
             */
            if ($request->ajax()) {
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if($row->etat == 1){
                    return '<button form="form'.$row->id.'" type="submit" class="edit btn btn-success btn-sm">envoyer</button>';
                }elseif($row->etat == 2){

                    return '<span> Votre course en Coure de confirmation </span>
                    ';
                }elseif($row->etat == 3){
                    return '<span> course confirmé </span>
                    ';
                }elseif($row->etat == 4){
                    return '<span class="badge badge-warning">'.$row->prix.'</span>
                    <button form="form'.$row->id.'" type="submit" class="edit btn btn-success btn-sm">envoyer</button>';
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

    /**
     * Envoi du course a l'administrateur
     */
    public function envoyer($id)
    {
        try {
            //code...

            Course::where('id', $id)->update(['etat'=> '1']);
            return redirect('/dashboard')->with('success', 'Votre course a été envoyer');

        } catch (\Throwable $th) {
            return redirect('/dashboard')->with('error', 'Error dans votre envoyer');
            //throw $th;

        }

    }

    /**
     * Envoi de prix a l'utilisateur
     */
    public function store(Request $request)
    {
        try {
            //code...
            Course::where('id',$request->id)->update(['prix'=>$request->prix, 'etat'=> '2']);

            return redirect('dashboard/admin')->with('success', 'Votre prix a ete envoyer');
        } catch (\Throwable $th) {
            return redirect('dashboard/admin')->with('Error', 'Probleme d\'envoyer votre prix');

        }

    }

    /**
     * la confirmation de client
     */
    public function confirmation($id)
    {
        try {
            //code...

            Course::where('id', $id)->update(['etat'=> '3']);
            return redirect('/dashboard')->with('success', 'Votre course a été confirmé');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard')->with('error', 'Error de votre confirmation');

        }

    }

    /**
     * l'annulation
     */
    public function annulation($id)
    {
        try {

            Course::where('id', $id)->update(['etat'=> '4']);
            return redirect('/dashboard')->with('success', 'Votre course a été supprimé');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard')->with('error', ' Error a votre supprime');
        }

    }

}
