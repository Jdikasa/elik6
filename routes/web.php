<?php

use App\Http\Controllers\Archives\ArchiveController;
use App\Http\Controllers\Archives\DocumentController as ArchiveDocumentController;
use App\Http\Controllers\BandesFrequenceController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Documents\ClasseurController;
use App\Http\Controllers\Archives\ClasseurController as ArchivesClasseurController;
use App\Http\Controllers\BanqueController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\CotationController;
use App\Http\Controllers\Documents\DossierController;
use App\Http\Controllers\Documents\DocumentController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NormeController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsMarqueController;
use App\Http\Controllers\ProductsModelController;
use App\Http\Controllers\ProductsTypeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PuissanceController;
use App\Http\Controllers\RH\ContratController;
use App\Http\Controllers\RH\PersonnelController;
use App\Http\Controllers\RH\TypeContratController;
use App\Http\Controllers\SendFactureEmailController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\Taches\TacheController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::group(['as' => 'pm.'], function () {

        Route::get('/', HomeController::class)->name('home');

        Route::resource('projects', ProjectController::class);
        Route::post('projects/update/project/{id}/step', [ProjectController::class, 'updateStep'])->name('projects.updateStep');

        Route::resource('clients', CustomerController::class);
        Route::delete('clients/bulk/delete/{ids}', [CustomerController::class, 'bulkDestroy'])->name('clients.bulkDestroy');

        Route::get('clients/model/relation', [CustomerController::class, 'relation'])->name('clients.relation');
        // Route::get('products/model/relation', [ProductController::class, 'relation'])->name('products.relation');

        Route::resource('products', ProductController::class);
        Route::delete('products/bulk/delete/{ids}', [ProductController::class, 'bulkDestroy'])->name('products.bulkDestroy');

        Route::resource('products-types', ProductsTypeController::class)->only('store');
        Route::resource('products-marques', ProductsMarqueController::class)->only('store');
        Route::resource('products-modeles', ProductsModelController::class)->only('store');
        Route::resource('products-frequences', BandesFrequenceController::class)->only('store');

        Route::resource('puissances', PuissanceController::class)->only('store');
        Route::resource('normes', NormeController::class)->only('store');

        Route::resource('societes', SocieteController::class)->only('store');

        Route::resource('countries', CountryController::class);
        Route::delete('countries/bulk/delete/{ids}', [CountryController::class, 'bulkDestroy'])->name('countries.bulkDestroy');
        // Route::get('countries/model/relation/select', [CountryController::class, 'relationSelect'])->name('countries.relationSelect');

        Route::resource('partenaires', PartenaireController::class);
        Route::resource('documents', DocumentController::class);
        Route::resource('classeurs', ClasseurController::class);
        Route::resource('documents/classeurs.dossiers', DossierController::class);
        Route::resource('dossiers', DossierController::class);
        Route::post('documents/dossiers/access', [DossierController::class, 'access'])->name('dossiers.access');
        Route::post('documents/to/archives', [DocumentController::class, 'archive'])->name('documents.archive');
        Route::post('documents/desarchiver/from/arches', [DocumentController::class, 'desarchiver'])->name('documents.desarchiver');

        Route::resource('taches', TacheController::class);
        Route::post('/taches/objectifs', [TacheController::class, 'storeobjectif'])->name('taches.objectifs.store');
        Route::post('/taches/participants', [TacheController::class, 'storeparticipants'])->name('taches.participants.store');
        Route::get('/gestion-taches/taches/objectif/delete/{id}', [TacheController::class, 'deleteobjectif'])->name('taches.objectif.delete');
        Route::get('/gestion-taches/taches/participant/delete/{id}', [TacheController::class, 'deleteparticipants'])->name('taches.participants.delete');
        Route::post('/gestion-taches/taches/commentaire/store', [TacheController::class, 'storecommentaire'])->name('taches.commentaire.store');
        Route::post('/gestion-taches/tache/cible/check', [TacheController::class, 'updateciblechecked'])->name('taches.cible.update.checked');
        Route::post('/gestion-taches/tache/cible/uncheck', [TacheController::class, 'updatecibleunchecked'])->name('taches.cible.update.unchecked');
        Route::post('/gestion-taches/taches/fichier/store', [TacheController::class, 'storefichier'])->name('taches.commentaire.fichier.store');
        Route::get('/gestion-taches/taches/priorite/{id}/{etat_id}', [TacheController::class, 'changepriorite'])->name('taches.priorite');

        // Archivage
        Route::resource('archivages', ArchiveController::class);
        Route::resource('archive-classeurs', ArchivesClasseurController::class)->except('index');
        Route::get('archive-classeurs/list/{annee}', [ArchivesClasseurController::class,'index'])->name('archive-classeurs.index');
        Route::resource('archive-classeurs.archive-dossiers', ArchivesDossierController::class);
        Route::get('archive-documents/{document}', [ArchivesDocumentController::class, 'show'])->name('archive-documents.show');

        // Start RH
        // departements
        Route::resource('/ressources-humaines/departements', DepartementController::class);
        // Route::post('/departements/add', [DepartementController::class, 'store'])->name('departements.store');
        // Route::post('/departements/update', [DepartementController::class, 'update'])->name('departements.update');

        Route::get('/mon-profil', [ProfilController::class, 'index'])->name('profil.index');
        Route::put('/mon-profil/avatar', [ProfilController::class, 'updateAvatar'])->name('profil.updateAvatar');

        Route::post('/ressources-humaines/user/document/store', [PersonnelController::class, 'storeuserdoc'])->name('rh.user.storedoc');

        // Ressources humaines / Personnels / Planning
        Route::post('/ressources-humaines/personnels/planning/update', [PersonnelController::class, 'updateplanning'])->name('rh.user.planning.update');
        // Ressources humaines / Contrats
        Route::get('/ressources-humaines/contrat/{id}/{value}', [ContratController::class, 'contrat'])->name('rh.user.contrat');
        Route::get('/ressources-humaines/contrats', [ContratController::class, 'index'])->name('rh.contrat.index');
        Route::post('/ressources-humaines/contrat/store', [ContratController::class, 'store'])->name('rh.user.contrat.store');
        Route::post('/ressources-humaines/contrat/update', [ContratController::class, 'update'])->name('rh.user.contrat.update');
        Route::post('/ressources-humaines/contrat/document/store', [ContratController::class, 'documentstore'])->name('rh.user.document.store');
        Route::get('/ressources-humaines/contrat/delete/{id}', [ContratController::class, 'destroy'])->name('rh.contrat.destroy');
        // Ressources humaines / Types Contrats
        Route::get('/ressources-humaines/types-contrats', [TypeContratController::class, 'index'])->name('rh.typecontrat.index');
        Route::post('/ressources-humaines/types-contrat/store', [TypeContratController::class, 'store'])->name('rh.typecontrat.store');
        Route::post('/ressources-humaines/types-contrat/update', [TypeContratController::class, 'update'])->name('rh.typecontrat.update');
        Route::get('/ressources-humaines/types-contrat/delete/{id}', [TypeContratController::class, 'destroy'])->name('rh.typecontrat.destroy');
        // Ressources humaines / Congés
        Route::get('/ressources-humaines/conges', [CongeController::class, 'index'])->name('rh.conges.index');
        Route::post('/ressources-humaines/conges/store', [CongeController::class, 'store'])->name('rh.conges.store');
        Route::post('/ressources-humaines/conges/update', [CongeController::class, 'update'])->name('rh.conges.update');
        Route::get('/ressources-humaines/conge/delete/{id}', [CongeController::class, 'destroy'])->name('rh.conges.destroy');
        // Ressources humaines / Absences
        Route::get('/ressources-humaines/absences', [AbsenceController::class, 'index'])->name('rh.absences.index');
        Route::post('/ressources-humaines/absences/store', [AbsenceController::class, 'store'])->name('rh.absences.store');
        Route::post('/ressources-humaines/absences/update', [AbsenceController::class, 'update'])->name('rh.absences.update');
        Route::get('/ressources-humaines/absence/delete/{id}', [AbsenceController::class, 'destroy'])->name('rh.absences.destroy');
        // Ressources humaines / Type d'absences
        Route::post('/ressources-humaines/type-absences/store', [TypeAbsenceController::class, 'store'])->name('rh.types.absences.store');
        Route::post('/ressources-humaines/type-absences/update', [TypeAbsenceController::class, 'update'])->name('rh.types.absences.update');
        Route::get('/ressources-humaines/type-absence/delete/{id}', [TypeAbsenceController::class, 'destroy'])->name('rh.types.absences.destroy');
        // Ressources humaines / Personnels / Conges
        Route::post('/ressources-humaines/personnels/conge/store', [PivotUserCongeController::class, 'store'])->name('rh.user.conges.store');
        Route::post('/ressources-humaines/personnels/conge/update', [PivotUserCongeController::class, 'update'])->name('rh.user.conges.update');
        Route::get('/ressources-humaines/personnels/conge/delete/{id}', [PivotUserCongeController::class, 'destroy'])->name('rh.user.conges.destroy');
        // Ressources humaines / Services
        Route::get('/ressources-humaines/services', [ServiceController::class, 'index'])->name('rh.services.index');
        Route::post('/ressources-humaines/services/store', [ServiceController::class, 'store'])->name('rh.services.store');
        Route::post('/ressources-humaines/services/update', [ServiceController::class, 'update'])->name('rh.services.update');
        Route::get('/ressources-humaines/service/delete/{id}', [ServiceController::class, 'destroy'])->name('rh.services.destroy');
        // Ressources humaines / Plannings
        Route::get('/ressources-humaines/plannings', [PlanningController::class, 'index'])->name('rh.plannings.index');
        Route::post('/ressources-humaines/plannings/store', [PlanningController::class, 'store'])->name('rh.plannings.store');
        Route::post('/ressources-humaines/plannings/update', [PlanningController::class, 'update'])->name('rh.plannings.update');
        Route::get('/ressources-humaines/planning/delete/{id}', [PlanningController::class, 'destroy'])->name('rh.plannings.destroy');
        // Ressources humaines / Pointages
        Route::get('/ressources-humaines/pointages', [PointageController::class, 'index'])->name('rh.pointages.index');
        Route::post('/ressources-humaines/pointages/store', [PointageController::class, 'store'])->name('rh.pointages.store');
        Route::post('/ressources-humaines/pointages/update', [PointageController::class, 'update'])->name('rh.pointages.update');
        Route::get('/ressources-humaines/pointage/delete/{id}', [PointageController::class, 'destroy'])->name('rh.pointages.destroy');
        // Ressources humaines / Postes
        Route::get('/ressources-humaines/postes', [PosteController::class, 'index'])->name('rh.postes.index');
        Route::post('/ressources-humaines/postes/store', [PosteController::class, 'store'])->name('rh.postes.store');
        Route::post('/ressources-humaines/postes/update', [PosteController::class, 'update'])->name('rh.postes.update');
        Route::get('/ressources-humaines/poste/delete/{id}', [PosteController::class, 'destroy'])->name('rh.postes.destroy');
        // Ressources humaines / Catégories de Poste
        Route::post('/ressources-humaines/postes/categories/store', [PosteCategorieController::class, 'store'])->name('rh.poste.categories.store');
        Route::post('/ressources-humaines/postes/categories/update', [PosteCategorieController::class, 'update'])->name('rh.poste.categories.update');
        Route::get('/ressources-humaines/postes/categorie/delete/{id}', [PosteCategorieController::class, 'destroy'])->name('rh.poste.categories.destroy');
        // Ressources humaines / Classifications de Poste
        Route::post('/ressources-humaines/postes/classifications/store', [PosteClassificationController::class, 'store'])->name('rh.poste.classifications.store');
        Route::post('/ressources-humaines/postes/classifications/update', [PosteClassificationController::class, 'update'])->name('rh.poste.classifications.update');
        Route::get('/ressources-humaines/postes/classification/delete/{id}', [PosteClassificationController::class, 'destroy'])->name('rh.poste.classifications.destroy');

        // personnels
        Route::resource('/ressources-humaines/personnels', PersonnelController::class);
        Route::post('/ressources-humaines/infos-personnels/update', [PersonnelController::class, 'updateperso'])->name('rh.user.perso.update');
        Route::put('/ressources-humaines/personnels/password/update/auth', [PersonnelController::class, 'updateAuth'])->name('rh.user.update.auth');
        Route::put('/ressources-humaines/personnels/update/permissions', [PersonnelController::class, 'permissions'])->name('rh.user.permissions');
        Route::post('/ressources-humaines/personnels/password/update', [PersonnelController::class, 'updatepassword'])->name('rh.user.update.password');
        Route::get('/ressources-humaines/personnels/{agent}/suspendre/contrat', [PersonnelController::class, 'suspension'])->name('rh.contrat.suspension');
        Route::get('/ressources-humaines/personnels/{agent}/renouveler/contrat', [PersonnelController::class, 'activate'])->name('rh.contrat.activate');
        // End RH

        Route::get('partenaires/model/relation', [PartenaireController::class, 'relation'])->name('partenaires.relation');
        Route::get('ajax/projects/certificats', [ProjectController::class, 'getCertificat'])->name('certificats.getCertificat');
        Route::get('ajax/projects/partenaires/modalite', [ProjectController::class, 'getModalitePart'])->name('certificats.getModalitePart');

        Route::post('ajax/facture/create/file', [FactureController::class, 'makeFile'])->name('factures.makeFile');
        Route::post('ajax/cotations/create/file', [CotationController::class, 'makeFile'])->name('cotations.makeFile');

        Route::group(['prefix' => 'finances', 'as'=>'fin.'], function ()
        {
            Route::resource('factures', FactureController::class);
            Route::post('factures/paiements/save', [FactureController::class, 'savePaiement'])->name('finances.savePaiement');
            Route::resource('cotations', CotationController::class);
            Route::resource('banques', BanqueController::class);
            Route::resource('comptes', CompteController::class);

            Route::post('/send/factures/to/email', [SendFactureEmailController::class, 'sendEmail'])->name('facture.send');
            Route::post('/send/cotations/to/email', [SendFactureEmailController::class, 'sendEmail'])->name('cotation.send');
        });

        Route::post('/dropzone/files', [CustomerController::class, 'dropzonFile'])->name('dropzon.post');
    });
});
