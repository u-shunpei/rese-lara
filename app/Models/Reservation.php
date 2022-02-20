<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $guarded = array('id', 'shop_id', 'user_id');

    public static $rules = array(
        'shop_id' => 'required',
        'num_of_users' => 'required',
        'time' => 'required',
        'date' => 'required'
    );
    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
