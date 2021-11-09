<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';
    protected $fillable = ['jenis_project', 'quantity', 'biaya', 'keterangan'];

    public function currativeMaintenance() {
        return $this->hasMany(CurrativeMaintenance::class, 'project_id', 'project_id');
    }
}
