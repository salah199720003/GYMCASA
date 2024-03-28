<?php
namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PanierController extends Controller
{
    public function index()
    {
        $this->middleware('auth');
        // Logique pour afficher le panier
        $user = Auth::user();
        $panierItems = Panier::with('produit')->where('user_id', $user->id)->get();
        $totalPanier = $this->calculerTotalPanier($panierItems);

        return view('panier.index', compact('panierItems', 'totalPanier'));
    }

    public function ajouterProduit($id)
    {
        // Logique pour ajouter un produit au panier
        $this->middleware('auth');
        $user = Auth::user();
        $qty = request('qty', 1);
    
        // Vérifier si le produit est déjà dans le panier de l'utilisateur
        $panierItem = Panier::where('user_id', $user->id)->where('produit_id', $id)->first();
    
        if ($panierItem) {
            $panierItem->increment('quantite', $qty);
        } else {
            Panier::create([
                'user_id' => $user->id,
                'produit_id' => $id,
                'quantite' => $qty,
            ]);
        }
    
        return redirect()->route('panier.index');
    }
    

    public function supprimerProduit($id)
    {
        // Logique pour supprimer un produit du panier
        $this->middleware('auth');
        $user = Auth::user();
        Panier::where('user_id', $user->id)->where('produit_id', $id)->delete();

        return redirect()->route('panier.index');
    }

    public function viderPanier()
    {
        // Logique pour vider le panier
        $this->middleware('auth');
        $user = Auth::user();
        Panier::where('user_id', $user->id)->delete();

        return redirect()->route('panier.index');
    }
    public function pageRemerciement()
{
    $this->middleware('auth');
    $user = Auth::user();
    $panierItems = Panier::with('produit')->where('user_id', $user->id)->get();
    $totalPanier = $this->calculerTotalPanier($panierItems);

    // Utilisez Log pour enregistrer le total dans les logs
    Log::info('Total du panier lors de la page de remerciement : ' . $totalPanier);

    return view('remerciement', compact('totalPanier'));
}


     public function validerCommande()
     {
       
         // Logique pour valider la commande
         $this->middleware('auth');
         $user = Auth::user();
     
         // Récupérer le panier de l'utilisateur depuis la base de données
         $panierItems = Panier::with('produit')->where('user_id', $user->id)->get();
     
         // Vérifier si le panier n'est pas vide avant de valider la commande
         if ($panierItems->isEmpty()) {
             Log::error('Le panier est vide lors de la validation de la commande.');
             return redirect()->route('panier.index')->with('error', 'Le panier est vide.');
         }
     
         // Calculer le montant total de la commande
         $total = 0;
         foreach ($panierItems as $item) {
            $prix = $item->produit->prix * (1 - ($item->produit->discount / 100));
            $total += $item->quantite * $prix;
         }
     
         // Créer une nouvelle commande dans la base de données
         $commande = new Commande([
             'id_client' => $user->id,
             'total' => $total,
         ]);
         $commande->save();
     
         Log::info('Nouvelle commande créée avec ID : ' . $commande->id);
     
         // Créer les lignes de commande pour chaque produit dans le panier
         foreach ($panierItems as $item) {
             $ligneCommande = new LigneCommande([
                 'id_produit' => $item->produit_id,
                 'id_commande' => $commande->id,
                 'prix' => $item->produit->prix,
                 'quantite' => $item->quantite,
                 'total' => $item->quantite * $prix,
             ]);
             $ligneCommande->save();
         }
     
         Log::info('Nombre de lignes de commande créées : ' . count($panierItems));
     
         // Effacer le panier après la validation de la commande
         $deleted = Panier::where('user_id', $user->id)->delete();
         
         if ($deleted) {
             Log::info('Panier de l\'utilisateur ' . $user->id . ' vidé avec succès.');
         } else {
             Log::error('Erreur lors de la suppression du panier de l\'utilisateur ' . $user->id);
         }
         // Dans le contrôleur
         return redirect()->route('remerciement')->with(['success' => true, 'total' => $total]);



     
     }
    
     private function calculerTotalPanier($panierItems)
     {
         $totalPanier = 0;
     
         foreach ($panierItems as $item) {
             // Appliquer le discount ici
             $prix = $item->produit->prix * (1 - ($item->produit->discount / 100));
             $totalPanier += $item->quantite * $prix;
         }
     
         return $totalPanier;
     }
     public function allOrders()
{
    
    $orders = Commande::with('lignesCommande.produit')->get();
    return view('orders.index', compact('orders'));
}
public function showOrderDetails($id)
{
    $order = Commande::with('lignesCommande.produit')->find($id);


    if (!$order) {
        abort(404); // Handle the case when the order is not found
    }

    return view('orders.show', compact('order'));
}
     
}
