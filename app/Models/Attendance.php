<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Attendance extends Model
{

	  use SoftDeletes;
 protected $table = 'attendance';
    protected $dates = ['deleted_at'];
    

  //protected $fillable = ['id',  'datetime','datetimestart' ,'datetimeend', 'salesman_id'  ] ;

    public function user(){
        return $this->belongsTo('App\User','salesman_id');
    }


}
