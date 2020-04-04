<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProduct extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'company_id', 'category_id', 'sequence', 'product_name', 'strength', 'pellet_size', 'price', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by',
	];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
