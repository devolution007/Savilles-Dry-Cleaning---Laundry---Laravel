<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;

    protected $table = 'footer_sub_catagoris';
    protected $fillable = ['main_cat_id','sub_cat_name','url'];
}
