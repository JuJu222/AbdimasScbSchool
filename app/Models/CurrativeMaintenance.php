<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CurrativeMaintenance
 *
 * @property int $currative_maintenance_id
 * @property int $project_id
 * @property int $year
 * @property int $month
 * @property int $week
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereCurrativeMaintenanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrativeMaintenance whereYear($value)
 * @mixin \Eloquent
 */
class CurrativeMaintenance extends Model
{
    use HasFactory;

    protected $primaryKey = 'currative_maintenance_id';
    protected $fillable = ['school_id', 'project_id', 'quantity', 'biaya', 'year_plan', 'month_plan', 'week_plan', 'year_real', 'month_real', 'week_real', 'status', 'keterangan', 'image_path'];

    public function project() {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id', 'school_id');
    }
}
