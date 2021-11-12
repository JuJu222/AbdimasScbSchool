<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Equipment
 *
 * @property int $equipment_id
 * @property string $nama_equipment
 * @property string|null $quantity
 * @property string|null $biaya
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PreventiveMaintenance[] $preventiveMaintenance
 * @property-read int|null $preventive_maintenance_count
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereNamaEquipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
