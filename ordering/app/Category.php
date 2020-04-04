<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
		'category', 'sequence', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by',
	];

	public function products()
	{
		return $this->hasMany('App\Product')->orderby('sequence', 'ASC');
	}

	public function company_products()
	{
		return $this->hasMany('App\CompanyProduct')->orderby('sequence', 'ASC')->where('company_id', Auth::user()->id);
	}
}
