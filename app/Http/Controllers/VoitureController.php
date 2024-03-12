<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Chauffeur;

class VoitureController extends Controller
{
    public function listeVoiture(){
        $voitures = Voiture::all();
        return view('voiture', compact('voitures'));
    }

    public function ajouterVoiture(){
        $chauffeurs = Chauffeur::all();
        return view('ajoutervoiture', compact('chauffeurs'));
    }

    public function ajouterVoiture_traitement(Request $request){
        
        $request->validate([
            'DateAchat' => 'required',
            'ParcoursDefaut' => 'required',
            'Matricule' => 'required',
            'Marque' => 'required',
            'Couleur' => 'required',
            'Statut' => 'required',
           'Chauffeur_id' => 'required',
        ]);

        $voiture = new Voiture();

        $voiture->DateAchat = $request->DateAchat;
        $voiture->ParcoursDefaut = $request->ParcoursDefaut;
        $voiture->Matricule = $request->Matricule;
        $voiture->Marque = $request->Marque;
        $voiture->Couleur = $request->Couleur;
        $voiture->Statut = $request->Statut;
        $voiture->chauffeur_id = $request->chauffeur_id;    

        //Plan au cas ou retour au plan A

        $chauffeur = Chauffeur::find($request->Chauffeur_id);
        
        if($chauffeur){
            $voiture->chauffeur()->associate($chauffeur); // Utilisez la méthode associate() pour associer le chauffeur à la voiture
        }

        $voiture->save();

        return redirect ('ajoutervoiture')->with('status', 'La voiture a bien été ajouté');
          
        
    }

    public function modifierVoiture($id){
        
        $voitures = Voiture::find($id);
        return view('modifiervoiture', compact('voitures'));
    }

    public function modifierVoiture_traitement(Request $request){
        $request->validate([
            'DateAchat' => 'required',
            'ParcoursDefaut' => 'required',
            'Matricule' => 'required',
            'Marque' => 'required',
            'Couleur' => 'required',
            'Statut' => 'required',
            'Chauffeur_id' => 'required',
        ]);

        $voiture = Voiture::find($request->id);

        $voiture->DateAchat = $request->DateAchat;
        $voiture->ParcoursDefaut = $request->ParcoursDefaut;
        $voiture->Matricule = $request->Matricule;
        $voiture->Marque = $request->Marque;
        $voiture->Couleur = $request->Couleur;
        $voiture->Statut = $request->Statut;
        $voiture->Chauffeur_id = $request->Chauffeur_id;

        $voiture->update();

        return redirect ('voiture')->with('status', 'La voiture a bien été modifier');
    }

    public function supprimerVoiture($id){
        $voiture = Voiture::find($id);
        $voiture->delete();

        return redirect ('/voiture')->with('status', 'La voiture a bien été supprimé avec succes');
    }
}
