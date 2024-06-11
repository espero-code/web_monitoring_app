<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCollected extends Model
{
    use HasFactory;

	public function module()
	{

		return $this->belongsTo(\App\Models\Module::class);

	}


	protected $fillable = ['measured_value', 'running_time', 'data_count', 'running_status', 'module_id'];
}
