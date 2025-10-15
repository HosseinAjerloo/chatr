<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCode extends Model
{
    use SoftDeletes;
    protected $fillable=['code','used','phone_used'];
}
