<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rcategory extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    protected $table = 'rev-category';
    
    public function revenue(){
        return $this::belongsTo('\App\Revenue','revenue_id');
    }
}
