<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    public $timestamps = false;
    
    public function user()
    {
        return $this->hasMany( 'App\Models\User' , 'dpm_id', 'id' );
    }
}
