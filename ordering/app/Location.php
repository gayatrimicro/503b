<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'user_id', 'address1', 'address2', 'city', 'state', 'zip', 'billing_same_as_shipping', 'billing_address1', 'billing_address2', 'billing_city', 'billing_state', 'billing_zip', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by',
	];
}
