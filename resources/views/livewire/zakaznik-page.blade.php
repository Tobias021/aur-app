<div class="w-5/6 md:w-4/6 lg:w-3/6 p-10 m-auto overflow-x-auto">


    <div class="p-7 shadow-md shadow-gray-200 sm:rounded-lg bg-white">

        <h1 class="text-red-600 text-2xl font-bold m-4">
            @if($isNew)
            Nový zákazník
            @else
            Změna údajů zákazníka č. {{$zakaznikEditId}} <span class="font-normal">- {{$jmeno}}</span>
            @endif
        </h1>
        <hr class="my-8">
        <form
            @if($isNew) wire:submit="create"
            @else wire:submit="update"
            @endif
            class="m-auto grid grid-flow-row grid-cols-[auto_2fr] grid-cols-auto items-center w-1/2"
        >
            <label for="jmeno">Jméno:</label>
            <input class="my-3 " type="text" name="jmeno" placeholder="Jméno" wire:model="jmeno"></input>
            <label for="ulice">Ulice, č.p.:</label>
            <input class="my-3 " type="text" name="ulice" placeholder="Ulice, č.p." wire:model="ulice"></input>
            <label for="mesto">Město:</label>
            <input class="my-3 " type="text" name="mesto" placeholder="Město" wire:model="mesto"></input>
            <label for="psc">PSČ:</label>
            <input class="my-3 " type="text" name="psc" placeholder="PSČ" wire:model="psc"></input>
            <label for="stat">Stát:</label>
            <input class="my-3 " type="text" name="stat" placeholder="Stát" wire:model="stat"></input>
            <label for="dic">DIČ:</label>
            <input class="my-3 " type="text" name="dic" placeholder="DIČ" wire:model="dic"></input>
            <div class="col-span-2 flex mt-8">
                <a wire:navigate href="/zakaznik" class="bg-gray-300 mt-4 w-fit p-3 px-9 text-center rounded text-black">
                    Zpět
                </a>
                <button type="submit" class="bg-red-600 mt-4 p-3 px-7 rounded text-white w-fit ml-auto">
                    @if($isNew)
                        Vytvořit
                    @else
                        Upravit
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>
