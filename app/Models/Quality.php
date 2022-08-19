<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;
    protected $table = 'qualities';
    public $timestamps = false;

    protected $fillable = [
         'qua_name',
    ];

    public function quality_detailImport()
    {
        return $this->hasMany( 'App\Models\DetailImport' , 'qua_id', 'id' );
    }
}
