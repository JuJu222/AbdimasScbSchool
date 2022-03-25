<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    use HasFactory;

    protected $primaryKey = 'coordination_id';
    protected $fillable = ['date_time', 'tema_koordinasi', 'meeting_id', 'meeting_passcode', 'link_zoom', 'keterangan', 'link_dokumen', 'image_path'];
}
