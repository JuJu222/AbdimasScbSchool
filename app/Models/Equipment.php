<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';
    protected $primaryKey = 'equipment_id';
    protected $fillable = ['nama_equipment', 'quantity', 'biaya', 'keterangan'];

    public function preventiveMaintenance() {
        return $this->hasMany(PreventiveMaintenance::class, 'equipment_id', 'equipment_id');
    }
}
