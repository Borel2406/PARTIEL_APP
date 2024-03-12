<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Models\Commande;

class CommandeController extends Controller
{
    public function showCommandeForm()
    {
        // Générer un identifiant unique pour le client
        $client_id = uniqid();

        // Définir le cookie avec l'identifiant unique du client
        $cookie = cookie('client_id', $client_id, 60*24*7); // 7 jours d'expiration

        // Retourner la vue du formulaire de commande avec le cookie défini
        return response()
            ->view('commande.formulaire')
            ->cookie($cookie);
    }



        
    public function Commande(){
        
        return view('commande');
    }

    public function PasserCommandeTraitement(Request $request){

        $request->validate([
            'Sujet' => 'required',
            'LieuDepart' => 'required',
            'Destination' => 'required',
            'Date' => 'required',
        ]);

        $client_id = Cookie::get('client_id');

        $commande = new Commande();
        $commande->Sujet = $request->input('Sujet');
        $commande->LieuDepart = $request->input('LieuDepart');
        $commande->Destination = $request->input('Destination');
        $commande->Date = $request->input('Date');
        $commande->client_id = $client_id;

        $commande->save();
        
        return redirect ()->route('vuecom', $commande->id);
        
    }

    public function VoirCommande(){

        $commandes = Commande::all();
        return view('vuecom', compact('commandes'));
    }
}
