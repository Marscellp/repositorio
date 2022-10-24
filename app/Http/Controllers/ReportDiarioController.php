<?php

namespace App\Http\Controllers;

use App\Models\Diario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportDiarioController extends Controller
{
    //
    public function reportPDF($id)
    {
        $data = Diario::where('id', '=', $id)->orderBy('id', 'desc')->get();
        // foreach ($data as $info) {
        //     dd($info->personals->user->name);
        // }
        $pdf = Pdf::loadView('pdf.reportUser', compact('data'));
        return $pdf->download('Diario.pdf');
    }
}
