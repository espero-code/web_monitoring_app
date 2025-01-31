<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'slug', 'description', 'status', 'measured_type_id'];

	public function datacollecteds()
	{
		return $this->hasMany(\App\Models\DataCollected::class);
	}


	public function measuredType()
	{
		return $this->belongsTo(\App\Models\MeasuredType::class);
	}

}
