<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
  

    protected $table = 'expenditures';
    
    public function revenue(){
        return $this::belongsTo('\App\Revenue','revenue_id');
    }
}
