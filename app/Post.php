<?php

namespace App;

use App\User as UserEloquent;
use App\Type as TypeEloquent;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'type', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserEloquent::class);
    }

    public function postType()
    {
        return $this->belongsTo(TypeEloquent::class, 'type');
    }
}
