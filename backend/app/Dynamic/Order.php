<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name','date','due_date','status','currency','tdtype','tax','discount','address_info','contact_info','customer_id','contact_id','quote_id','invoice_id',
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

    public function quote()
    {
        return $this->belongsTo('App\Dynamic\Quote');
    }

    public function invoice()
    {
        return $this->hasMany('App\Dynamic\Invoice');
    }

    public function lines()
    {
        return $this->morphMany('App\Dynamic\Line','lineable');
    }
}
