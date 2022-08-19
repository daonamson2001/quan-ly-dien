<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailImport extends Model
{
    use HasFactory;
    protected $table = 'detail_imports';
    public $timestamps = false;

    protected $fillable = [
        'di_amount', 'di_price', 'di_into_money', 'sup_id', 'imp_id', 'pro_id', 'qua_id',
   ];

   public function detailImport_Import()
   {
       return $this->belongsTo( 'App\Models\Import' , 'imp_id', 'id' );
   }

   public function detailImport_supplies()
   {
       return $this->belongsTo( 'App\Models\Supplies' , 'sup_id', 'id' );
   }

   public function detailImport_producer()
   {
       return $this->belongsTo( 'App\Models\Producer' , 'pro_id', 'id' );
   }

   public function detailImport_quality()
   {
       return $this->belongsTo( 'App\Models\Quality' , 'qua_id', 'id' );
   }
}
