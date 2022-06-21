<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pointage;
use App\Models\Employe;
use Carbon\Carbon;

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
        $mytime = Carbon::now();
        $i_nom = Employe::select('Nom')->where('Mail', $req->mailajouter)->first();
        $i_id = Employe::select('ID')->where('Mail', $req->mailajouter)->first();
        $utilisateur = new Pointage;
        $donnee=Employe::find($req->Mail);
        $utilisateur->Nom = $i_nom->Nom;
        $utilisateur->Mail = $req->mailajouter;
        $utilisateur->Date= $mytime->toDateTimeString();
        $utilisateur->usrid= $i_id->ID;
        $utilisateur->save();
        return redirect('pointage');
    } 

    public function showData($id)
    {
        $data=Employe::find($id);
        return view('employe',['data'=>$data]);
    }

    public function fetchemployee()
    {
        $employee= Employe::all();
        return response()->json([
            'employe'=>$employee, 
        ]);
    }

    public function update(Request $req)
    {
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('img', $fileName);
            $datauser=Employe::find($req->id);
            $datauser->Image= $fileName;

        }        
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
}
