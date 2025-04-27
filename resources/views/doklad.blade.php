<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Opravný daňový doklad</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-sm size-full text-gray-800 p-8">
  <div class="max-w-4xl size-11/12 mx-auto mt-8 bg-white border-2 rounded-xl p-8">
    <!-- Header -->
    <div class="flex items-center justify-between border-b pb-4 mb-6">
      <div>
        <h1 class="text-3xl font-extrabold text-red-600">Opravný Daňový Doklad </h1>
      </div>
      <div>
          <span class="text-3xl font-normal text-red-600 ">č. {{substr($doklad->cislo_opravneho_dokladu, 3)}}</span>
      </div>

    </div>

    <!-- Info řádky -->
    <div class="grid grid-cols-2 gap-4 mb-6 text-sm">
      <div>
        <p><strong>Číslo opravného dokladu:</strong> {{$doklad->cislo_opravneho_dokladu}}</p>
        <p><strong>Číslo původního dokladu:</strong> {{$doklad->cislo_dokladu}}</p><br>
        <p><strong>Datum vystavení:</strong> {{$doklad->datum_platby}}</p>
        <p><strong>Datum zd. plnění:</strong> {{$doklad->datum_platby}}</p>
      </div>
      <div class="h-full">
          <img src="{{$logoPath}}" alt="AURINET logo" class="w-48 h-auto m-auto mt-8">
      </div>
    </div>

    <!-- Odběratel / Dodavatel -->
    <div class="grid grid-cols-2 gap-4 mb-6">
      <div>
        <h2 class="font-bold border-b mb-2">ODBĚRATEL</h2>
        <p><strong>{{$doklad->zakaznik->jmeno}}</strong></p>
        <p>{{$doklad->zakaznik->ulice}}</p>
        <p>{{$doklad->zakaznik->mesto}}, {{$doklad->zakaznik->psc}}</p>
        <p>{{$doklad->zakaznik->stat}}</p>
        @if($doklad->zakaznik->dic)
        <p><strong>DIČ:</strong> {{$doklad->zakaznik->dic}}</p>
        @endif
      </div>
      <div>
        <h2 class="font-bold border-b mb-2">DODAVATEL</h2>
        <p><strong>Aurinet s. r. o.</strong></p>
        <p>Gebauerova 1255</p>
        <p>Nová Paka, 509 01</p>
        <p>Česká republika</p>
        <p><strong>IČ:</strong> 7973977</p>
        <p><strong>DIČ:</strong> CZ07973977</p>
      </div>
    </div>

    <!-- Položky -->
    <table class="w-full text-left border border-gray-300 mb-8">
      <thead class="bg-gray-100">
        <tr>
          <th class="py-2 px-2 border-r">Popis</th>
          <th class="py-2 px-2 border-r">Sazba DPH</th>
          <th class="py-2 px-2 border-r">Částka bez DPH</th>
          <th class="py-2 px-2">Částka s DPH</th>
        </tr>
      </thead>
      <tbody>
        <!-- Opakující se řádky -->
        <tr class="border-t">
          <td class="py-2 px-2 border-r">Vrácení zálohy na předplatné</td>
          <td class="py-2 px-2 border-r">{{$doklad->sazba_dph}} %</td>
          <td class="py-2 px-2 border-r">{{$doklad->castka_bez_dph}} {{$menaSymbol}}</td>
          <td class="py-2 px-2">{{$doklad->castka_celkem}} {{$menaSymbol}}</td>
        </tr>
        <!-- Další řádky lze přidat -->
      </tbody>
    </table>

    <!-- Footer -->
    <div class="text-right">
      <p class=" font-semibold ">Celkem: <span class="text-lg text-red-600">{{$doklad->castka_celkem}} {{$menaSymbol}}</span></p>
    </div>
  </div>
</body>
</html>
