<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name','vat','custom_header','custom_footer','address_info','contact_info',
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
    public function users()
    {
        return $this->hasMany('App\User', 'account_id', 'account_id');
    }
}
