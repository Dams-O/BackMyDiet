<?php


namespace App\Http\Controllers;



use App\Models\Recipe;
use Illuminate\Http\Request;

class PdfController
{
    public function pdfView(Request $request)
    {
        // get Data
        /*$recipe = Recipe::findOrFail(1);
        $title = 'Recette_' . $recipe->title . '.pdf';*/
        if($request->has('download')) {
            // pass view file with data
            /*$pdf = \PDF::loadView('pdf.recette', [
                'recipe'    => $recipe,
                'title'     => $title
            ]);*/
            // pass view without data
            $pdf = \PDF::loadView('pdf.recette');
            // download pdf
            return $pdf->inline('recette.pdf');
        }
        return view('listeRecette');
    }
}
