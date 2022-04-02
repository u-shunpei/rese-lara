<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array(
        'id');

    protected $fillable = ['description', 'image_url', 'area_id', 'genre_id'];

    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
        'image_url' => 'required'
    );

    protected $table = "shops";


    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function Reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public static function searchShops($area_id, $genre_id, $keyword)
    {
        $query = Shop::query();

        if (!empty($area_id)) {
            $query->whereHas('area', function ($query) use ($area_id) {
                $query->where('id', $area_id);
            });
        } else {
            $query->with('area');
        }

        if (!empty($genre_id)) {
            $query->whereHas('genre', function ($query) use ($genre_id) {
                $query->where('id', $genre_id);
            });
        } else {
            $query->with('genre');
        }

        if (!empty($keyword)) {
            $query->where('name', 'like', "%$keyword%");
        }

        $shops = $query->get();

        return $shops;
    }

    public static function getShops(int $user_id)
    {
        return Shop::with('area', 'genre')->with([
            'likes' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            }
        ])->get();
    }
}
