<?php


namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController
{
    public function pdfView(Request $request)
    {
        if($request->has('download')) {
            // pass view file
            $pdf = \PDF::loadView('pdf.recette');
            // download pdf
            return $pdf->inline('recette.pdf');
        }
        return view('listeRecette');
    }
}
