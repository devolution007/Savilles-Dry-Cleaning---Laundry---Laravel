<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
class OrderService extends Model
{
    use HasFactory;

    protected $table = 'order_services';

    protected $fillable = ['order_id', 'service'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
