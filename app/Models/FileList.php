<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileList extends Model
{
    
    protected $table = 'file_list';

    protected $fillable = [
        'user_id', 'file_name',
    ];

}
