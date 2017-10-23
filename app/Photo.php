<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Photo extends Model
{
    protected $table = 'photo_company';

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/
}
