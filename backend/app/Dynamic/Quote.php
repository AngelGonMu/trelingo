<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name','date','due_date','status','currency','tdtype','tax','discount','address_info','contact_info','customer_id','contact_id','order_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'address_info' => 'array',
        'contact_info' => 'array',
    ];

    /**
     * Relationships
     */
    public function customer()
    {
        return $this->belongsTo('App\Dynamic\Customer');
    }

    public function contact()
    {
        return $this->belongsTo('App\Dynamic\Contact');
    }

    public function order()
    {
        return $this->hasMany('App\Dynamic\Order');
    }

    public function lines()
    {
        return $this->morphMany('App\Dynamic\Line','lineable');
    }
}
