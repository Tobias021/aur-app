<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPdfs;
use App\Models\DokladModel;
use App\Traits\DokladCurrencySymbols;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\LaravelPdf\PdfBuilder;

class PdfController extends Controller
{
    use DokladCurrencySymbols;

    public function previewDokladPdf(Request $request, $id)
    {
        return $this->createDokladPdf($id);

        // $request
        //     ->session()
        //     ->flash(
        //         "message",
        //         "Doklad $id.pdf vytvořen."
        //     );
        // return redirect("/odd");
    }

    public function createBulkPdf()
    {
        $testDoklady = DokladModel::where("castka_celkem", ">", 24000)->get();

        // $doklady = DokladModel::find([]);
        ProcessPdfs::dispatchSync($testDoklady);
    }

    static function saveDokladPdf($id, $folderName = "")
    {
        if (!$folderName) {
            $folderName = "$folderName/";
        }
        $this->createDokladPdf($id)
            ->disk("local")
            ->save("tmp/$folderName$id.pdf");
    }

    private function createDokladPdf($id): PdfBuilder
    {
        $doklad = DokladModel::find($id);
        return Pdf::view("doklad", [
            "logoPath" => public_path("aurinet.png"),
            "doklad" => $doklad,
            "menaSymbol" => $this->currencyToSymbol($doklad),
        ])
            ->name("$doklad->cislo_opravneho_dokladu.pdf")

            ->withBrowsershot(function ($browsershot) {
                $browsershot
                    ->setChromePath(
                        "/home/sail/.cache/puppeteer/chrome/linux-135.0.7049.95/chrome-linux64/chrome"
                    )
                    ->noSandbox();
            });
    }
}
