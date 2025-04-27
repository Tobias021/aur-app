<div class="relative lg:container lg:mx-auto p-5" >
    @if($message)
    <div class="flex bg-green-300 w-fit p-5 rounded mt-5 ml-auto fixed bottom-12 right-8 z-10"
        x-data="{showMessage: true}"
        x-show="showMessage"
        x-init="setTimeout(()=> showMessage = false, 5000)"
        x-transition
        @click="showMessage = false">
        <p class="font-bold">{{$message}}</p>
        <span class="text-lg font-mono font-extrabold ml-5 mr-3">X</span>
    </div>
    @endif
    <!-- Pagination -->
    <div class="my-5">
        {{ $doklady->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm  text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-50 uppercase bg-red-600">
                <tr>
                    <livewire:table-sort-header wire:key="header_cislo" title="Číslo opravného dokladu" sorterFor="cislo_opravneho_dokladu" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo2" title="Číslo dokladu" sorterFor="cislo_dokladu" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo3" title="Datum platby" sorterFor="datum_platby" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo4" title="Odběratel" sorterFor="jmeno" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo5" title="DIČ" sorterFor="dic" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo6" title="Částka celkem" sorterFor="castka_celkem" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header wire:key="header_cislo7" title="Číslo zálohové faktury" sorterFor="cislo_zalohove_faktury" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <th scope="col" class="px-6 py-3">Akce</th>
                </tr>
            </thead>
            <tbody wire:key="{{$rand}}">
                @foreach($doklady as $doklad)

                @if($doklad->cislo_opravneho_dokladu != $this->expandedRow)
                     <tr class="bg-white border-b hover:bg-gray-50" wire:click="expandRow('{{$doklad->cislo_opravneho_dokladu}}')">
                 @else
                     <tr class="{{$rowColor}} hover:bg-red-100 shadow-md shadow-red-100" wire:click="expandRow('{{$doklad->cislo_opravneho_dokladu}}')" >
                 @endif
                    <x-table-row :doklad="$doklad" :expanded-row="$expandedRow" :editable="false" :rand="$rand"/>
                @if($expandedRow == $doklad->cislo_opravneho_dokladu)

                    <livewire:edit-form wire:key="dropdown-{{$rand}}" :doklad="$doklad"/>

                @endif
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>

      <!-- Pagination -->
    <div class="mt-4">
        {{ $doklady->links() }}
    </div>

    <button type="button"  class="max-sm:visible md:hidden fixed right-5 bottom-5 rounded-full w-16 h-16 size-6/12 bg-red-500 hover:bg-red-600 p-4 text-white font-bold text-xl">
        +
    </button>
    <div id="color-compiler" class="bg-yellow-200 bg-red-500 bg-red-200 w-0 h-0 invisible"></div>
</div>
