<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
class Sms extends Model
{
    use SoftDeletes;
    public $table='smses';
    protected $fillable=['mobile','messageText','number','message_send','operator_id'];
    public function operator(){
        return $this->belongsTo(Operator::class,'operator_id');
    }
    public function Scopesearch(Builder $query){
        $query->when(request()->input('start_date'),function ($query){
             $start=substr(request()->input('start_date'),0,10);
             $query->whereDate("created_at",">=",date('Y-m-d',$start));
        })->when(request()->input('end_date'),function ($query){
            $start=substr(request()->input('end_date'),0,10);
            $query->whereDate("created_at","<=",date('Y-m-d',$start));
        })->when(request()->input('text'),function ($query){
            $operator=Operator::where('name',request()->input('text'))->first();
            $query->where(function ($q) use ($operator){
               $q->orWhere('mobile','like','%'.request()->input('text').'%')->orWhere('messageText','like','%'.request()->input('text').'%')
                   ->orWhere('mobile','like','%'.request()->input('text').'%')->orWhere('message_send','like','%'.request()->input('text').'%');
                if ($operator)
                    $q->orwhere('operator_id',$operator->id);
            });
          ;

        });
    }
}
