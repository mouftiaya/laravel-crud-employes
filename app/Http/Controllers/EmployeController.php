<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::latest()->paginate(7);
        return view('employe.index', compact('employes'));
    }

    public function create()
    {
        return view('employe.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ville'=> 'required',
            'company' => 'required',
            'salaire' => 'required'
        ]);

        $employe = new Employe();
        $employe->nom= $request->input('nom');
        $employe->prenom= $request->input('prenom');
        $employe->ville = $request->input('ville');
        $employe->company = $request->input('company');
        $employe->salaire= $request->input('salaire');
        $employe->save();

        return redirect('/employe')->with('success', 'Employer Ajouté avec succès'); 
    }

    public function show(Employe $employe)
    {
        return view('employe.show',['employe'=>$employe]); 
    }

    public function edit(Employe $employe)
    {
        return view('employe.edit', compact('employe'));
    }

    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'ville'=> 'required',
            'company' => 'required',
            'salaire' => 'required'
        ]);

        $employe->update($request->all());

        return redirect('/employe')->with('success', 'Employe Modifié avec succès');
    }

    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect('/employe')->with('success', 'Employé a été supprimé avec succès');
    }
}