<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelQRCode\Facades\QRCode;

class IndividuoController extends Controller
{
    public function geraQR( Request $request){
        $data = $request->all();

        $data['code'] = $request->code;

        $codigo = QRCode::text($data['code'])
        ->setSize(8)
        ->setMargin(2)
        ->png();

        return view('qr', [
            'codigo' => $codigo
        ]);
    }
}
