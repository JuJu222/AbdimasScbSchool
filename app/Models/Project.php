<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property int $project_id
 * @property string $jenis_project
 * @property string|null $quantity
 * @property string|null $biaya
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CurrativeMaintenance[] $currativeMaintenance
 * @property-read int|null $currative_maintenance_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereJenisProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';
    protected $fillable = ['jenis_project', 'quantity', 'biaya', 'keterangan'];

    public function currativeMaintenance() {
        return $this->hasMany(CurrativeMaintenance::class, 'project_id', 'project_id');
    }
}
