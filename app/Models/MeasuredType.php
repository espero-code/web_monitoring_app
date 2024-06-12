<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasuredType extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'description', 'min_value', 'max_value'];

	public function modules()
	{
		return $this->hasMany(\App\Models\Module::class);
	}

}
