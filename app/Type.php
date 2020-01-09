<?php

namespace App;
use App\Post as PostEloquent;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
		'name'
	];

    public $timestamps = false;

	public function posts(){
		return $this->hasMany(PostEloquent::class, 'type');
	}
}
