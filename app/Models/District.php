<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    public $timestamps = false;

    protected $fillable = [
        'dis_name',
    ];

    public function producer()
    {
        return $this->hasMany( 'App\Models\Producer' , 'dis_id', 'id' );
    }
}
