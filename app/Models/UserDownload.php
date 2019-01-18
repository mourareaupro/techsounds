<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDownload extends Model
{
    protected $table = 'user_download';

    protected $fillable = ['user_id', 'product_id'];
}
