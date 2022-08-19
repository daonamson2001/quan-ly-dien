<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;
    protected $table = 'producers';
    public $timestamps = false;

    protected $fillable = [
         'pro_name', 'pro_address', 'pro_phone', 'pro_email', 'pro_employee', 'dis_id'
    ];

    public function district()
    {
        return $this->belongsTo( 'App\Models\District' , 'dis_id', 'id' );
    }

    public function producer_detailImport()
    {
        return $this->hasMany( 'App\Models\DetailImport' , 'pro_id', 'id' );
    }
}
