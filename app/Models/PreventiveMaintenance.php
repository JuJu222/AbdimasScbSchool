<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreventiveMaintenance extends Model
{
    use HasFactory;

    protected $primaryKey = 'preventive_maintenance_id';
    protected $fillable = ['equipment_id', 'year', 'month', 'week', 'status'];

    public function equipment() {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
    }
}
