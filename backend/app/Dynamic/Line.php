<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sort','description','units','price_unit','tax','discount','product_id','lineable_id','lineable_type',
    ];

    /**
     * Relationships
     */
    public function lineable()
    {
        return $this->morphTo();
    }

    public function product()
    {
        return $this->belongsTo('App\Dynamic\Product');
    }

}
