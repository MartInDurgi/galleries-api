<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    protected $with = ['photos'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public static function search($term, $skip, $take)
    {
        return self::where('title', 'LIKE', '%' . $term . '%')->skip($skip)->take($take)->get();
    }
}
