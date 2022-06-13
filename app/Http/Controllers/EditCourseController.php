<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\RamassageController;

class EditCourseController extends Controller
{
    //
    public function show($id){
        $course = Course::find($id);
        return view('courses.edit_course', compact('course'));
    }

    public function update(Request $request, $id, $client_id, $ramassage_id){
        try {
            //code...
            $client = new ClientController;
            $client->update($request, $client_id);
            $ramassage = new RamassageController;
            $ramassage->update($request, $ramassage_id);
            $course = Course::find($id);

                $course->update([
                    'description' => $request->description,
                    'ramassage_avant' => $request->ramassage_avant,
                    'etat' => '0',
                    'prix' => null
                ]);
            return redirect('/dashboard')->with('success', 'Course update avec succeé');
        } catch (\Throwable $th) {
            return redirect('/dashboard')->with('error', 'échec de la mise à jour');
        }

    }

    public function updates(Request $request, $id, $client_id, $livraison_id){
        try {
            //code...
            $client = new ClientController;
        $client->update($request, $client_id);

        $livraison = new LivraisonController;
        $livraison->update($request, $livraison_id);

        $course = Course::find($id);

            $course->update([
                'description' => $request->description,
                'livraison_avant' => $request->livraison_avant,
                'etat' => '0',
                'prix' => null
            ]);
        return redirect('/dashboard')->with('success', 'Course update avec succeé');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/dashboard')->with('error', 'échec de la mise à jour');

        }

    }
}
