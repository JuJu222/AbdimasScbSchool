<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $primaryKey = 'school_id';
    protected $fillable = ['nama_sekolah'];

    public function preventiveMaintenance() {
        return $this->hasMany(PreventiveMaintenance::class, 'school_id', 'school_id');
    }

    public function currativeMaintenance() {
        return $this->hasMany(CurrativeMaintenance::class, 'school_id', 'school_id');
    }
}
