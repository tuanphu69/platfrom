<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    //lấy theo migration  
    protected $fillable = [
        'title', 'content', 'category_id','featrued','slug'
    ];
    //
    protected $dates = ['delete_at'];

    public function getFeatruedAttribute($featrued)
    {
        return asset($featrued);
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
