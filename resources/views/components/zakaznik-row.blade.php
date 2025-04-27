<tr class="bg-white border-b">
    <td class="px-6 py-4">{{ $zakaznik->id }}</td>
    <td class="px-6 py-4">{{ $zakaznik->jmeno }}</td>
    <td class="px-6 py-4">{{ $zakaznik->ulice }}</td>
    <td class="px-6 py-4">{{ $zakaznik->mesto }}</td>
    <td class="px-6 py-4">{{ $zakaznik->psc }}</td>
    <td class="px-6 py-4">{{ $zakaznik->stat}}</td>
    <td class="px-6 py-4">{{ $zakaznik->dic}}</td>
    <td class="px-6 py-4">
        <button wire:click="editZakaznik({{ $zakaznik->id }})" class="font-medium text-blue-600 hover:underline">Upravit</button>
        <button wire:click="deleteZakaznik({{ $zakaznik->id }})" class="font-medium text-red-600 hover:underline ml-3">Smazat</button>
    </td>
</tr>
