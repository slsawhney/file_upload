<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    // Because of application we are using singular form.
    protected $table = 'sample';
    protected $fillable = ['name', 'type', 'location'];
}

