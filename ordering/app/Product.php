<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'category_id', 'product_name', 'sequence', 'strength', 'pellet_size', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by',
	];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
