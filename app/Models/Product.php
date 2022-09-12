<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'product';

    /**
    * The primary key od the table.
    *
    * @var string
    */
    protected $primaryKey = 'id';
}
