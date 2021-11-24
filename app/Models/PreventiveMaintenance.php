<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PreventiveMaintenance
 *
 * @property int $preventive_maintenance_id
 * @property int $equipment_id
 * @property int $year
 * @property int $month
 * @property int $week
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Equipment $equipment
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance wherePreventiveMaintenanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreventiveMaintenance whereYear($value)
 * @mixin \Eloquent
 */
class PreventiveMaintenance extends Model
{
    use HasFactory;

    protected $primaryKey = 'preventive_maintenance_id';
    protected $fillable = ['equipment_id', 'quantity', 'biaya', 'year_plan', 'month_plan', 'week_plan', 'year_real', 'month_real', 'week_real', 'status', 'keterangan', 'image_path'];

    public function equipment() {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
    }
}
