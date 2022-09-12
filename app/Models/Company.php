<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'company';

    /**
    * The primary key od the table.
    *
    * @var string
    */
    protected $primaryKey = 'id';
}
