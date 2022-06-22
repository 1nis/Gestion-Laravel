<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Mail\SendMail;

class EmployeController extends Controller
{
    //
    function show()
    {
        $data= Employe::paginate(5);
        return view('employe/employe',['user'=>$data]);
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

    public function mailsend($id)
    {
        $data=Employe::find($id);
        response()->json([
            'employe'=>$data, 
        ]);
        return view('emails.sendmail');
    //     $details = [
    //         'title' => 'Title: Mail from Real Programmer',
    //         'body' => 'Body : This is for real testing email using smtp'
    //     ];

    //     \Mail::to('kherrafanis13@gmail.com')->send(new SendMail($details));
    //     return redirect('employe');
    }

}
