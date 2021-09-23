<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Journal extends Model
{
    protected $connection = 'mongodb';
    use HasFactory;
    protected $guarded = [];
    /**
     * @var mixed
     */
    /**
     * @var mixed|string
     */

}
