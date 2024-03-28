<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class qrcontroller extends Controller
{
   
    public function index(){
        $url = route('reserver');
        $qrCode = QrCode::size(200)->generate($url);
    
        return view('reservation', compact('qrCode','url'));
    }
}
