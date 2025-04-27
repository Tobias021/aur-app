<div class="lg:container lg:mx-auto p-5 ">


    <!-- Pagination -->
    <div class="my-5">

        {{ $zakaznici->links() }}
    </div>


    <a wire:navigate href="zakaznik/novy" class="flex w-fit bg-red-600 p-2 my-5 rounded text-white">Nový zákazník</a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm  text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-50 uppercase bg-red-600">
                <tr>
                    <livewire:table-sort-header title="id" sorterFor="id" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="Jméno" sorterFor="jmeno" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="Ulice, č.p." sorterFor="ulice" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="Město" sorterFor="mesto" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="PSČ" sorterFor="psc" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="Stát" sorterFor="stat" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <livewire:table-sort-header title="DIČ" sorterFor="dic" :beingSorted="$this->orderBy[0]" :sortOrder="$this->orderBy[1]" />
                    <th scope="col" class="px-6 py-3">Akce</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zakaznici as $zakaznik)
                    <x-zakaznik-row wire:key="row-{{$zakaznik->id}}" :zakaznik="$zakaznik"/>
                @endforeach
            </tbody>
        </table>
    </div>

      <!-- Pagination -->
    <div class="my-4">
        {{ $zakaznici->links() }}
    </div>

    <button type="button"  class="max-sm:visible md:hidden fixed right-5 bottom-5 rounded-full w-16 h-16 size-6/12 bg-red-500 hover:bg-red-600 p-4 text-white font-bold text-xl">
        +
    </button>
    <div id="color-compiler" class="bg-yellow-200 bg-red-500 bg-red-200 w-0 h-0 invisible"></div>
</div>
