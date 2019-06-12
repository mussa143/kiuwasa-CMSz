<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    protected $fillable = [
        'type', 'sname', 'qty',
    ];

    protected $table = 'sources';
    
    public function zone(){
        return $this::belongsTo('\App\zone','zone_id');
    }

}
