<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = 'imports';
    public $timestamps = false;

    protected $fillable = [
        'imp_date', 'impt_total', 'user_id', 'imp_code', 
   ];

   public function import_detailImport()
   {
       return $this->hasMany( 'App\Models\DetailImport' , 'imp_id', 'id' );
   }

   public function import_user()
   {
       return $this->belongsTo( 'App\Models\User' , 'user_id', 'id' );
   }
}
