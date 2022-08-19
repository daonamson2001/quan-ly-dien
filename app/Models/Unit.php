<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    public $timestamps = false;

    protected $fillable = [
         'unit_name', 'unit_simplify',
    ];

    public function unit_supplies()
    {
        return $this->hasMany( 'App\Models\Supplies' , 'unit_id', 'id' );
    }
}
