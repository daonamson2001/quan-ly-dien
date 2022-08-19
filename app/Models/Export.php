<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $table = 'exports';
    public $timestamps = false;

    protected $fillable = [
        'exp_date', 'expt_total', 'user_id', 'exp_code', 
   ];

   public function export_detailExport()
   {
       return $this->hasMany( 'App\Models\DetailExport' , 'exp_id', 'id' );
   }
}
