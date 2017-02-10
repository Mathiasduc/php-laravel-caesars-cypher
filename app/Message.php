<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	/**
	 * Mass assignable attributes
	 *
	 * @var array
	 **/
	protected $fillable = ['message'];
}
