<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','vat','type','status','address_info','contact_info',
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
    public function contacts()
    {
        return $this->hasMany('App\Dynamic\Contact');
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
}
