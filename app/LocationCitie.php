<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
class LocationCitie extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
    'name', 'provinces_id',
    ];

    protected $dates = [
    'deleted_at',
    ]
}
