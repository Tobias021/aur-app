<td class="px-6 py-4">{{ $doklad->cislo_opravneho_dokladu }}</td>
<td class="px-6 py-4">{{ $doklad->cislo_dokladu }}</td>
<td class="px-6 py-4">{{ $doklad->datum_platby }}</td>
<td class="px-6 py-4">{{ $doklad->zakaznik->jmeno }}</td>
<td class="px-6 py-4">{{ $doklad->zakaznik->dic }}</td>
<td class="px-6 py-4">{{ number_format($doklad->castka_celkem, 2, ",", " ")." ".$menaSymbol }}</td>
<td class="px-6 py-4">{{ $doklad->cislo_zalohove_faktury }}</td>
<td class="px-6 py-4">
    <button class="font-medium text-blue-600 hover:underline">Upravit</button>
    <button class="font-medium text-red-600 hover:underline ml-3">Smazat</button>
    <a href="/pdf/{{$doklad->cislo_opravneho_dokladu}}" target="_blank" wire:click.stop  class="font-medium text-red-600 hover:underline ml-3">Stáhnout</button>
</td>
