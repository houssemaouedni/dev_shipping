<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ClientController extends Controller
{
    //

    public function create(Request $request)
    {
        $clients = $request->only('username', 'email', 'telephone');

        $x = count($clients['username']);

        $id = [];
        for($i = 0; $i < $x; $i++){
            $client = Client::create([
                'username' => $clients['username'][$i]['username'],
                'email' => $clients['email'][$i]['email'],
                'telephone' => $clients['telephone'][$i]['telephone'],

            ]);
            $id[] = $client->id;
        }

        return $id ;
    }

    public function update(Request $request, $client_id)
    {
        $client = Client::find($client_id);
        $client->update($request->only('username', 'email', 'telephone'));

    }
}
