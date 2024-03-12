<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chauffeur;

class ChauffeurController extends Controller
{
    public function liste_chauffeur(){

        $chauffeurs = Chauffeur::all();
        return view ('liste', compact('chauffeurs'));
    }

    public function ajouter_chauffeur(){

        return view ('ajouter');
    }

    public function ajouter_chauffeur_traitement(Request $request){

        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Experience' => 'required',
            'Num_permis' => 'required',
            'Emission' => 'required',
            'Expiration' => 'required',
            'Categorie' => 'required',
        ]);

        $chauffeur = new Chauffeur();

        $chauffeur->Nom = $request->Nom;
        $chauffeur->Prenom = $request->Prenom;
        $chauffeur->Experience = $request->Experience;
        $chauffeur->Num_permis = $request->Num_permis;
        $chauffeur->Emission = $request->Emission;
        $chauffeur->Expiration = $request->Expiration;
        $chauffeur->Categorie = $request->Categorie;

        $chauffeur->Save();

        return redirect('ajouter')->with('status', 'Le chauffeur a été bien ajouté avec succes');
    }

    public function modifier_chauffeur($id){

        $chauffeurs = Chauffeur::find($id);

        return view('modifier', compact('chauffeurs'));
    }

    public function modifierChauffeur_traitement(Request $request){

        $request->validate([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Experience' => 'required',
            'Num_permis' => 'required',
            'Emission' => 'required',
            'Expiration' => 'required',
            'Categorie' => 'required',
        ]);

        $chauffeur = Chauffeur::find($request->id);

        $chauffeur->Nom = $request->Nom;
        $chauffeur->Prenom = $request->Prenom;
        $chauffeur->Experience = $request->Experience;
        $chauffeur->Num_permis = $request->Num_permis;
        $chauffeur->Emission = $request->Emission;
        $chauffeur->Expiration = $request->Expiration;
        $chauffeur->Categorie = $request->Categorie;

        $chauffeur->update();

        return redirect('/liste')->with('status', 'Le chauffeur a été bien modifié avec succes');
    }

    public function supprimer_chauffeur($id){
        $chauffeur = Chauffeur::find($id);
        $chauffeur->delete();

        return redirect ('/liste')->with('status', 'Le chauffeur a bien été supprimé avec succes');
    }
}
