<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City_Model extends Model
{
    protected $table = 'tbl_cities';
    protected $primary_key = 'id';
    use HasFactory;


    
}
