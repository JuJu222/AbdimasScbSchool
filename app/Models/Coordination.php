<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    use HasFactory;

    protected $primaryKey = 'coordination_id';
    protected $fillable = ['date_time', 'tema_koordinasi', 'link_zoom', 'keterangan', 'image_path'];
}
