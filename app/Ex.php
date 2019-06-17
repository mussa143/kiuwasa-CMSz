<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ex extends Model
{
    protected $table = 'exs';

    protected $fillable = [
        'exname',
    ];

    public function expenditures(){
        return $this::hasMany('\App\Expenditure','expenditures_id');
    }
}
