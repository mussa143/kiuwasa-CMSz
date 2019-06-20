<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Expenditure extends Model
{
  

    protected $table = 'expenditures';

    protected $fillable = [
        'type','monthy','amount','staff',
    ];
    
    public function revenue(){
        return $this::belongsTo('\App\Revenue','revenue_id');
    }

    public function exs(){
        return $this::belongsTo('\App\Ex','exs_id');
    }
}
