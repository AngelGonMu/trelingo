<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";
    protected $appends = ["customer"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','title','workplace','contact_info','customer_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'contact_info' => 'array',
    ];

    /**
     * Relationships
     */
    public function customer()
    {
        return $this->belongsTo('App\Dynamic\Customer');
    }

    public function quotes()
    {
        return $this->hasMany('App\Dynamic\Quote');
    }

    public function orders()
    {
        return $this->hasMany('App\Dynamic\Order');
    }

    public function invoices()
    {
        return $this->hasMany('App\Dynamic\Invoice');
    }

    public function todos()
    {
        return $this->hasMany('App\Dynamic\Todo');
    }

    /**
     * Attributes to append
     */
    public function getCustomerAttribute()
    {
        return $this->customer()->get();
    }
}
