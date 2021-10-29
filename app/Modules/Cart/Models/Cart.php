<?php

namespace Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cart extends Model
{
    use SoftDeletes;
    protected $fillables = [
        'product_name','product_quantity','session_id','status',
    ];

}
