<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    use HasFactory;
    protected $table = 'supplies';

    protected $fillable = [
         'sup_name', 'sup_amount','sup_total', 'unit_id'
    ];

    public $timestamps = false;

    public function unit()
    {
        return $this->belongsTo( 'App\Models\Unit' , 'unit_id', 'id' );
    }

    public function supplies_detailImport()
    {
        return $this->hasMany( 'App\Models\DetailImport' , 'sup_id', 'id' );
    }

    public function supplies_detailExport()
    {
        return $this->hasMany( 'App\Models\DetailExport' , 'sup_id', 'id' );
    }

}
