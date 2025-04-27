<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakaznikModel extends Model
{
    use HasFactory;
    protected $table = "zakaznik";

    protected $fillable = ["jmeno", "ulice", "mesto", "psc", "stat", "dic"];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            "ulice" => "encrypted",
            "mesto" => "encrypted",
            "psc" => "encrypted",
            "stat" => "encrypted",
            "dic" => "encrypted",
        ];
    }
}
