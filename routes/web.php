<?php

use App\Livewire\Counter;
use App\Livewire\DataList;
use App\Livewire\DataForm;
use App\Livewire\ZakaznikPage;
use App\Livewire\ZakaznikList;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormSubmitController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return redirect("/odd");
});

Route::get("/odd", DataList::class);

Route::get("/odd/{id}", DataForm::class);

Route::patch("/odd/{id}", [FormSubmitController::class, "update"]);

Route::get("/pdf", [PdfController::class, "downloadPdf"]);

Route::get("/pdf/{id}", [PdfController::class, "previewDokladPdf"]);

Route::get("/zakaznik/novy", ZakaznikPage::class);

Route::get("/zakaznik/{id}", ZakaznikPage::class);

Route::get("/zakaznik", ZakaznikList::class);
