<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValueList extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";
    protected $table = "valuelists";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'list','value',
    ];
}
