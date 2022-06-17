<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    //
    function show()
    {
        $data= Employe::all();
        return view('employe/employe',['user'=>$data]);
        return view('employe/get_employe_by_id',['user'=>$data]);
    }

    public function fetchemployee()
    {
        $employee= Employe::all();
        return response()->json([
            'employe'=>$employee, 
        ]);
    }

    public function showData($id)
    {
        $data=Employe::find($id);
        return view('employe',['data'=>$data]);
    }

    public function update(Request $req)
    {
        $donnee=Employe::find($req->id);
        $donnee->Nom=$req->nommodifier;
        $donnee->Mail=$req->mailmodifier;
        $donnee->Adresse=$req->adressemodifier;
        $donnee->Telephone=$req->numeromodifier;
        $donnee->save();
        return redirect('employe');

    } 
}
