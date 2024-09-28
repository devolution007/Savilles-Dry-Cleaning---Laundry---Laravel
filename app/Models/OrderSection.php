<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSection extends Model
{
    use HasFactory;

    public function sectionName()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }
}
