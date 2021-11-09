<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrativeMaintenance extends Model
{
    use HasFactory;

    protected $primaryKey = 'currative_maintenance_id';
    protected $fillable = ['project_id', 'year', 'month', 'week', 'status'];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }
}
