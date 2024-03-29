<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monthy', 'capacity', 'source',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = "production";

    public function sources(){
        $this->hasMany('App\Sources','sources_id');
    }
}