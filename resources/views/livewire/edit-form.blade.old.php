<tr class="border-b ">
    <td class="pt-0" colspan="8">
        <div class="m-2 mt-0 w-9/12 mx-auto px-20 py-5 bg-gray-100 rounded-b-xl shadow-md shadow-red-100"
                x-data="{
                castka_nepodlehajici: '{{ $doklad->castka_ne_dph }}',
                castka_bez: '{{ $doklad->castka_bez_dph }}',
                sazba_dph: '{{$doklad->sazba_dph}}',
                dph: '{{ $doklad->dph }}',
                vypocetCelkem() {
                    let nepodlehajici = parseFloat(this.castka_nepodlehajici) || 0;
                    let bez = parseFloat(this.castka_bez) || 0;
                    let dphVal = parseFloat(this.dph) || 0;
                    return (nepodlehajici + bez + dphVal).toFixed(2);
                },
                vypocetDph() {
                    let bez = parseFloat(this.castka_bez) || 0;
                    let sazba = parseFloat(this.sazba_dph) || 0;
                    this.dph = (bez * sazba / 100).toFixed(2)
                    return this.dph;
                }
            }"
        >
            <form method="post" action="/odd/{{$doklad->cislo_opravneho_dokladu}}" class="justify-between">
                @method('PATCH')
                @csrf
                <div class="grid grid-cols-3 gap-2 gap-y-4 pb-7">
                    <label for="mena">Měna: </label>
                    <select class="rounded-md w-11 col-span-2" id="mena" name="mena">
                        @foreach($this->meny as $mena)
                        <option value="{{$mena}}" @if($mena == $doklad->mena) selected @endif >{{strtoupper($mena)}}</option>
                        @endforeach
                    </select>
                    <label for="castka_nepodlehajici">Částka nepodléhající DPH: </label>
                    <input
                        id="castka_nepodlehajici" name="castka_nepodlehajici"
                        x-model="castka_nepodlehajici"
                        wire:model="$doklad->castka_nepodlehajici"
                        @if(!$rowEditable) disabled @endif>
                    </input>

                    <label for="castka_bez" class="col-start-1">Částka bez DPH: </label>
                    <input
                        id="castka_bez" name="castka_bez"
                        x-model="castka_bez"
                        @if(!$rowEditable) disabled @endif>
                    </input>

                    <div class="col-span-1">
                        <label for="sazba_dph" class="col-start-1">Sazba DPH: </label>
                        <input
                            id="sazba_dph" name="sazba_dph"
                            x-model="sazba_dph"
                            @if(!$rowEditable) disabled @endif>
                        </input>
                    </div>

                    <label for="dph" class="px-4">DPH: </label>
                    <input readonly class="read-only:cursor-pointer"
                        id="dph" name="dph"
                        x-model="dph"
                        :value="vypocetDph()">
                    </input>
                    <label for="celkem" class="font-bold col-start-1">Doklad celkem: </label>
                    <input readonly class="read-only:cursor-pointer"
                        id="celkem" name="celkem"
                        :value="vypocetCelkem()" >
                    </input>
                    @if($this->rowEditable == false)
                    <div>
                    <button wire:click="editClicked()" type="button" class="m-auto w-fit bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Upravit</button>
                    </div>
                    @else
                    <div>
                        <button wire:click="cancelEdit()" type="button" class="bg-gray-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Zrušit</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Uložit</button>
                    </div>
                    @endif
                </div>


            </form>
        </div>
    </td>
</tr>
