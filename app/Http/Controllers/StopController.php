<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StopController extends Controller
{
    //

    public function create()
    {
        $lastNumero = collect(Stop::all()->where('user_id',request()->user()->id))->last()->numero_de_stop +1;
        
        $clientId = Stop::create([
            'user_id' => request()->user()->id,
            'numero_de_stop' => $lastNumero,
        ]);

        return $clientId->id;

    }


}
