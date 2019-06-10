<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
    protected $table = 'customers';
    
    public function zone(){
        return $this::belongsTo('\App\zone','zone_id');
    }

}
