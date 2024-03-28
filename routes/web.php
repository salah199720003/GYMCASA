<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qrcontroller;
use App\Http\Controllers\reservationcontroller;
use App\Http\Controllers\adminvideocontroller;
use App\Http\Controllers\videoscontroller;
use App\Http\Controllers\commentairecontroller;
use App\Http\Controllers\messagecontroller;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\detailscontroler;



Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/class',function(){
    return view('class');
})->name('class');;
Route::get('/contact',function(){
    return view('contact');
})->name('contact')->middleware('auth');
Route::get('/about',function(){
    return view('about');
})->name('about');
Route::get('/reservation',[qrcontroller::class,'index'])->name('reservation');
Route::get('/reserve',function(){
    return view('reserver');
})->name('reserver')->middleware('auth');
Auth::routes();
Route::resource('reserver', reservationcontroller::class);
Route::resource('message', messagecontroller::class);
Route::resource('adminvideo', adminvideocontroller::class);
Route::resource('commentaire', commentairecontroller::class);
Route::resource('video', videoscontroller::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('adminmiddleware');

Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
Route::get('/admin/view-reservations', [AdminController::class, 'viewReservations'])->name('admin.view-reservations');

Route::get('/admin/manage-users/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit-user');
Route::post('/admin/manage-users/update/{id}', [AdminController::class, 'update'])->name('admin.update-user');
Route::post('/admin/manage-users/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete-user');

Route::get('/admin/manage-users/add', [AdminController::class, 'addUser'])->name('admin.add-user');
Route::post('/admin/manage-users/store', [AdminController::class, 'storeUser'])->name('admin.store-user');
Route::post('/admin/export-reservations', [AdminController::class, 'exportReservations'])->name('admin.export-reservations');

Route::get('/admin/search-users', [AdminController::class, 'searchUsers'])->name('admin.search-users');
Route::delete('/adminvideo/{adminvideo}', [videoscontroller::class, 'destroy'])->name('adminvideo.destroy');

use App\Http\Controllers\AdminMessageController;

Route::get('/admin/view-messages', [AdminMessageController::class, 'viewMessages'])->name('admin.view-messages');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile');


Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// routes/web.php

Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');




Route::resource('usersdetails', detailscontroler::class);

use App\Http\Controllers\CategorieController;

// Afficher la liste des catégories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

// Afficher le formulaire d'ajout de catégorie
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');

// Ajouter une nouvelle catégorie à la base de données
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');

// Afficher le formulaire de modification de catégorie
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');

// Mettre à jour une catégorie dans la base de données
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/show', [CategorieController::class, 'show'])->name('categories.show');

// Supprimer une catégorie de la base de données
Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');
// routes/web.php

use App\Http\Controllers\ProduitController;

Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');
Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');
Route::get('/front-produits', [ProduitController::class, 'frontIndex'])->name('produits.frontIndex');

use App\Http\Controllers\FrontController;

Route::get('/sa', [FrontController::class, 'index'])->name('front.index');

use App\Http\Controllers\PanierController;

// ...

Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimerProduit'])->name('panier.supprimer');
Route::post('/panier/vider', [PanierController::class, 'viderPanier'])->name('panier.vider');
Route::post('/valider-commande', [PanierController::class,'validerCommande'])->name('panier.validerCommande');
Route::get('/remerciement', [PanierController::class, 'pageRemerciement'])->name('remerciement');

Route::get('/all-orders',[PanierController::class,'allOrders'] )->name('all.orders');
Route::get('/orders/{id}', [PanierController::class,'showOrderDetails'])->name('orders.show');


Route::group(['middleware' => 'auth'], function () {
    // Vos routes nécessitant une authentification ici...
    Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouterProduit'])->name('panier.ajouter');
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimerProduit'])->name('panier.supprimer');
Route::post('/panier/vider', [PanierController::class, 'viderPanier'])->name('panier.vider');
Route::post('/valider-commande', [PanierController::class,'validerCommande'])->name('panier.validerCommande');
Route::get('/remerciement', [PanierController::class, 'pageRemerciement'])->name('remerciement');
    
    // Autres routes...
});




