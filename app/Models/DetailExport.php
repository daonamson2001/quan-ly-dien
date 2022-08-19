<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailExport extends Model
{
    use HasFactory;
    protected $table = 'detail_exports';
    public $timestamps = false;

    protected $fillable = [
        'de_amount', 'de_price', 'de_into_money', 'sup_id', 'exp_id', 
   ];

   public function detailexport_export()
   {
       return $this->belongsTo( 'App\Models\Export' , 'exp_id', 'id' );
   }

   public function detailexport_supplies()
   {
       return $this->belongsTo( 'App\Models\Supplies' , 'sup_id', 'id' );
   }

}
