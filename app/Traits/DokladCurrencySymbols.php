<?php

namespace App\Traits;

use App\Models\DokladModel;
use function Laravel\Prompts\error;

trait DokladCurrencySymbols
{
    protected function currencyToSymbol(DokladModel $doklad): string
    {
        switch ($doklad->mena) {
            case "czk":
                return "Kč";
            case "eur":
                return "€";
            default:
                return strtoupper($doklad->mena);
        }
    }
}
