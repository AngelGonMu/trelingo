<?php

namespace App\Dynamic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $connection = "dynamic";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','name','description','unit','price_unit','type','category','subcategory',
    ];

    /**
     * Relationships
     */
    public function characteristics()
    {
        return $this->hasMany('App\Dynamic\Characteristic');
    }

    public function lines()
    {
        return $this->hasMany('App\Dynamic\Line');
    }

    public function stock()
    {
        return $this->hasMany('App\Dynamic\Stock');
    }

    public function in_stock()
    {
        return $this->stock()->sum('units');
    }

    public function stock_entries()
    {
        return $this->stock()->where('type', 'Entry');
    }

    public function stock_exits()
    {
        return $this->stock()->where('type', 'Exit');
    }

}
