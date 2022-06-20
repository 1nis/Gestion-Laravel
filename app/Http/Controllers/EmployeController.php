<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{
    //
    function show()
    {
        $data= Employe::paginate(5);
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

    public function delete($id)
    {
        $donnee=Employe::find($id);
        $donnee->delete();
        return redirect('employe');
    }

    public function DataPlus(Request $req)
    {
        $utilisateur = new Employe;
        $utilisateur->Nom=$req->nomajouter;
        $utilisateur->Mail=$req->mailajouter;
        $utilisateur->Adresse=$req->adresseajouter;
        $utilisateur->Telephone=$req->numeroajouter;
        $utilisateur->save();
        return redirect('employe');

    } 
}
