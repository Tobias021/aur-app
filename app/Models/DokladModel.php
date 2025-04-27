<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokladModel extends Model
{
    use HasFactory;

    protected $table = "doklady";
    protected $primaryKey = "cislo_opravneho_dokladu";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;

    public function zakaznik(): BelongsTo
    {
        return $this->belongsTo(ZakaznikModel::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "cislo_opravneho_dokladu",
        "datum_platby",
        "zakaznik_id",
        "dic",
        "cislo_dokladu",
        "castka_ne_dph",
        "castka_bez_dph",
        "dph",
        "sazba_dph",
        "castka_celkem",
        "doklad_suma",
        "mena",
        "cislo_zalohove_faktury",
    ];
}
