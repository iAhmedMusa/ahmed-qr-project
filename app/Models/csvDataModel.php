<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class csvDataModel extends Model
{
    use HasFactory;

    protected $table = 'csvdata';

    protected $fillable = [
        'fileName',
        'status'
    ];
}
