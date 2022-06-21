<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pointage;
use App\Models\Employe;

class PointageController extends Controller
{
    //
    function show()
    {
        $data= Pointage::paginate(5);
        return view('employe/pointage',['user'=>$data]);
    }

    public function DataPlus(Request $req)
    {
        // $utilisateur = new Pointage;
        // $donnee=Employe::find($req->Mail);
        // $utilisateur->Nom=$donnee->Nom;
        // $utilisateur->Mail=$req->mailajouter;
        // $utilisateur->Date=Now();
        // $utilisateur->usrid=$donnee->id;
        // $utilisateur->save();
        $employee= Employe::select('Nom')->where('Mail', $req->mailajouter)->get();
        return response()->json([
            'pointage'=>$employee, 
        ]);
    } 
}
