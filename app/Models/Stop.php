<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function courses()
    {
        return $this->hasMany(Course::class);
    }




}
