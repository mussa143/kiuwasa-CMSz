<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    
    protected $fillable = [
        'zname',
    ];

    protected $table = 'zone';
    
    public function customer(){
        return $this::hasMany('\App\Customer','customer_id');
    }
}
