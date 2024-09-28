<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'main_text_body', 'thumbnail'];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

}
