<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileProduct extends Model
{
    protected $table = 'file_product';

    protected $fillable = ['product_id', 'path', 'file_name'];
}
