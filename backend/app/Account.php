<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','company_name','vat','connection','payment_info',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'connection', 'payment_info',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'connection' => 'json',
        'payment_info' => 'json',
    ];

    /**
     * Return users
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
