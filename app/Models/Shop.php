<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array(
        'id', 'area_id', 'genre_id');

    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
        'image_url' => 'required'
    );

     protected $table ="shops";


    public function area() {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }
   public function Reservation() {
       return $this->hasMany('App\Models\Reservation');
   }
}
