<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Onepiece extends Model
{
    //
    protected $table = "onepieces";
    protected $fillable = [
        'name',
        'role',
        'fruit',
        'haki',
        'age',
        'bounty'
    ];
}
