<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class EtatAdminController extends Controller
{

    public function index()
    {
        $users = User::all()->whereNotIn('role', [1]);
        $stops = Stop::all();
        return view('admin.etat.client', [
            'users' => $users,
            'stops' => $stops,
        ]);
    }
    public function show($id)
    {



        try {
            //code...

            $courses = Course::all()->reject(function ($data) use ($id) {
                return $data->stop->user_id !== (int)$id ;
            })->map(function ($course) {
                return $course;
            })->whereNotIn('etat', [0, 1, 2, 4]);

            if ($courses->isEmpty()) {
                return redirect()->back()->with('error', 'Aucun cours pour ce client');
            }
            return view('admin.etat.client_show', [
                'courses' => collect($courses)->paginate(7),
                'id' => $id,
            ]);
        } catch (\Throwable $th) {
            //
            return redirect()->back()->with('error', 'Aucun cours pour ce client');

        }


    }
}
