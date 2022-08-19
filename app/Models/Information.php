<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'information';
    public $timestamps = false;

    protected $fillable = [
        'inf_name', 'inf_address', 'inf_phone', 'inf_email', 'inf_website',
    ];
}
