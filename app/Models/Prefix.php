<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prefix extends Model
{
    use SoftDeletes;
    protected $fillable=['prefix_num','operator_id','status'];
}
