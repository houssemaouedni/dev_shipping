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

        $clientId = Stop::create([
            'user_id' => request()->user()->id
        ]);

        return $clientId->id;

    }


}
