<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MainCatagory extends Model
{
    use HasFactory;

    protected $table = 'footer_main_catagoris';
    protected $fillable = ['catagory_name'];

    public function subcategories()
    {
        return $this->hasMany(SubCatagory::class, 'main_cat_id', 'id');
    }
}
