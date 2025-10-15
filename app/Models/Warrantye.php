<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warrantye extends Model
{
    use SoftDeletes;
    public $table='warrantyes';
     protected $fillable=['code','used','phone_used'];
}
