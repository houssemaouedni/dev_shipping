<?php

namespace App\Models;

use App\Models\Stop;
use App\Models\Client;
use App\Models\Livraison;
use App\Models\Ramassage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function ramassage()
    {
        return $this->belongsTo(Ramassage::class);
    }


    public function livraison()
    {
       return $this->belongsTo(Livraison::class);
    }


    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
