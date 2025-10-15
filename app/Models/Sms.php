<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sms extends Model
{
    use SoftDeletes;
    public $table='smses';
    protected $fillable=['mobile','messageText','number','type','operator_id'];
    public function operator(){
        return $this->belongsTo(Operator::class,'operator_id');
    }
}
