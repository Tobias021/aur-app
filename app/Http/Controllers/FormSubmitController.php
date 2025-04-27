<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokladModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class FormSubmitController extends Controller
{
    #[Session]
    public $rowEditable;
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $model = DokladModel::find($id);
        $model->mena = $input["mena"];
        $model->castka_bez_dph = $input["castka_bez"];
        $model->sazba_dph = $input["sazba_dph"];
        $model->dph = $input["dph"];
        $model->castka_celkem = $input["celkem"];
        $model->save();
        $rowEditable = false;
        $request
            ->session()
            ->flash(
                "message",
                "Doklad $model->cislo_opravneho_dokladu úspěšně upraven!"
            );
        return redirect("/odd");
    }
}
