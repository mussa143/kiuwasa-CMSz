<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'type', 'amount', 'customer',
    ];

    protected $table = 'revenue';
    
    public function customer(){
        return $this::belongsTo('\App\Customer','customer_id');
    }
}
