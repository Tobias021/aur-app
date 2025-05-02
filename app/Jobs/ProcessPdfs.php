<?php

namespace App\Jobs;

use App\Http\Controllers\PdfController;
use App\Models\DokladModel;
use App\Traits\DokladCurrencySymbols;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelPdf\Facades\Pdf;
use ZipArchive;
use function Illuminate\Log\log;
use function Laravel\Prompts\error;

class ProcessPdfs implements ShouldQueue
{
    use Queueable;
    use DokladCurrencySymbols;

    /**
     * Create a new job instance.
     */
    public function __construct(public $doklady)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $folder = "export" . time();
        $path = "tmp/$folder";
        $zip = new ZipArchive();

        if (
            $zip->open(
                public_path("/storage/$folder.zip"),
                ZipArchive::CREATE
            ) == false
        ) {
            echo "Failed to create Zip Archive";
        }

        foreach ($this->doklady as $doklad) {
            $filename = "$doklad->cislo_opravneho_dokladu.pdf";

            Pdf::view("doklad", [
                "logoPath" => public_path("aurinet.png"),
                "doklad" => $doklad,
                "menaSymbol" => $this->currencyToSymbol($doklad),
            ])
                ->name($filename)

                ->withBrowsershot(function ($browsershot) {
                    $browsershot
                        ->setChromePath(
                            "/home/sail/.cache/puppeteer/chrome/linux-135.0.7049.95/chrome-linux64/chrome"
                        )
                        ->noSandbox();
                })
                ->disk("public")
                ->save("$path/$filename");
            $zip->addFile("storage/$path/$filename", $filename);
        }
        $zip->close();
        echo public_path("storage/$path");
        foreach (Storage::allDirectories(public_path("/")) as $dir) {
            echo $dir;
        }
        Storage::deleteDirectory(public_path("storage/$path"));
    }

    // private function createZip($folderName){
    //     $fileName = $folderName;
    //     $zip = new ZipArchive();
    //     if($zip->open(public_path($folderName), ZipArchive::CREATE) == true){
    //         foreach ($this->doklady as $doklad){
    //             $zip->addFile();
    //         }
    //     }
    // }
}
