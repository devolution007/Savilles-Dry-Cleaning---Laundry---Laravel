<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class,"section_tag","section_id","tag_id");
    }

    public function icon()
    {
        return $this->belongsTo(SectionIcon::class,"section_icon_id","id");
    }

    public function services()
    {
        return $this->hasMany(Service::class,"section_id","id");
    }
}
