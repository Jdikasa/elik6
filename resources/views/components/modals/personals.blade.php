
 
{{-- detail --}}
<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="detail-personnel" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="flex-direction: column;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                <h5 id="offcanvasRightLabel" class="mb-1">Détails du personnel </h5>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Créé le: </span> 22 Jav 2022</p>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Par: </span> John Doe</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="block-progress">
            <div class="card card-notification card-campaing">
                <div class="avatar-user">
                    <img src="{{asset('assets/img/team/1.jpg')}}" alt="photo de profil">
                    <span class="etat unactive">Suspendu</span>
                </div>
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nom complet
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Lieu de naissance
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Date de naissance
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Adresse
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Etat civil
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nationalite
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Téléphone
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Email
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>

            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Fonction
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Matricule
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Département
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Division
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Etat civil
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nationalite
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Téléphone
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Email
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>
        </div>

    </div>
    <div class="offcanvas-footer">
        <div class="d-flex justify-content-end">
            <button class="btn">Modifier</button>
            <button class="btn">Supprimer</button>
        </div>
    </div>

</div>
<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="detail-departement" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="flex-direction: column;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                <h5 id="offcanvasRightLabel" class="mb-1">Détails du département </h5>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Créé le: </span> 22 Jav 2022</p>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Par: </span> John Doe</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


    </div>
    <div class="offcanvas-body">

        <div class="block-progress">
            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Dénomination
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Description
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>

            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Responsable
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>
            <div class="card card-notification card-campaing">
                <div class="d-flex justify-content-between">
                    <div class="text-star">

                        <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nombre de divisions
                        </h6>
                        <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                    </div>
                    <div class="text-star">

                        <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nombre d'agents
                        </h6>
                        <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="offcanvas-footer">
        <div class="d-flex justify-content-end">
            <button class="btn">Modifier</button>
            <button class="btn">Supprimer</button>
        </div>
    </div>

</div>
<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="detail-division" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="flex-direction: column;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                <h5 id="offcanvasRightLabel" class="mb-1">Détails de divison </h5>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Créé le: </span> 22 Jav 2022</p>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Par: </span> John Doe</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


    </div>
    <div class="offcanvas-body">
        <div class="block-progress">
            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Dénomination
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Description
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>
            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Département
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Chef du département</h5>
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>


            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                    Nombre d'agents
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>

        </div>

    </div>
    <div class="offcanvas-footer">
        <div class="d-flex justify-content-end">
            <button class="btn">Modifier</button>
            <button class="btn">Supprimer</button>
        </div>
    </div>

</div>
<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="detail-fonction" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="flex-direction: column;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                <h5 id="offcanvasRightLabel" class="mb-1">Détails de divison </h5>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Créé le: </span> 22 Jav 2022</p>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Par: </span> John Doe</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


    </div>
    <div class="offcanvas-body">
        <div class="block-progress">
            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Dénomination
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Description
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>



            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                    Nombre d'agents
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>

        </div>

    </div>
    <div class="offcanvas-footer">
        <div class="d-flex justify-content-end">
            <button class="btn">Modifier</button>
            <button class="btn">Supprimer</button>
        </div>
    </div>

</div>
<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="detail-personnel" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="flex-direction: column;">
        <div class="d-flex justify-content-between w-100">
            <div class="text-star">
                <h5 id="offcanvasRightLabel" class="mb-1">Détails du personnel </h5>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Créé le: </span> 22 Jav 2022</p>
                <p class="mb-1 d-flex" style="font-size: 12px"><span style="display: inline-block" class="me-1">Par: </span> John Doe</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>


    </div>
    <div class="offcanvas-body">
        <div class="block-progress">
            <div class="card card-notification card-campaing">
                <div class="avatar-user">
                    <img src="{{asset('assets/img/team/1.jpg')}}" alt="photo de profil">
                    <span class="etat unactive">Suspendu</span>
                </div>
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nom complet
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Lieu de naissance
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Date de naissance
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Adresse
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Etat civil
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nationalite
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Téléphone
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Email
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>

            <div class="card card-notification card-campaing">
                <div class="text-star">

                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Fonction
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">20 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Matricule
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Département
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Division
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Etat civil
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Nationalite
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Téléphone
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
                <div class="text-star">
                    <h6 class="date d-flex justify-content-between align-items-center mb-0">
                        Email
                    </h6>
                    <p style="font-size: 12px;" class="mb-0">40 contacts</p>
                </div>
            </div>
        </div>

    </div>
    <div class="offcanvas-footer">
        <div class="d-flex justify-content-end">
            <button class="btn">Modifier</button>
            <button class="btn">Supprimer</button>
        </div>
    </div>

</div>
<div wire:ignore.self class="modal fade" id="modal-delete-contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <div class="content-text text-center">
                <i data-feather="trash"></i>
                <h5>Are you sure ?</h5>
                <p>This action can't be undone.</p>
            </div>
            <div class="block-btn d-flex justify-content-center mb-3">
                <button class="btn btn-cancel me-4" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                <button class="btn btn-delete">Supprimer</button>
            </div>
        </div>
    </div>
    </div>
</div>
<div wire:ignore.self class="modal fade" id="modal-suspend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            <div class="content-text text-center">
                <i data-feather="power"></i>
                <h5>Are you sure ?</h5>
                <p>This action can't be undone.</p>
            </div>
            <div class="block-btn d-flex justify-content-center mb-3">
                <button class="btn btn-cancel me-4" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                <button class="btn btn-delete">Suspendre</button>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- departement --}}
<div wire:ignore.self class="modal fade" id="modal-new-departement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
            <span>Creér un département</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group row g-4">
                <div class="col-lg-12">
                    <input wire:model="name" type="text" class="form-control" placeholder="Dénomination" name="denomination">
                </div>
                <div class="col-lg-12">
                    <input type="text" wire:model="description" class="form-control" placeholder="Déscription" name="decription">
                </div>
                
                <div class="col-lg-12">
                    <select wire:model="chef_id" class="form-control text-black"  name="chef_id" required>
                        <option value="" selected="true" >Selectionner un chef de la division</option>
                        @foreach ($personnels as $user)
                            <option value="{{ $user->id}}">{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-lg-12 text-end">
                    <button class="btn btn-add" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="storeDepartement()">Créer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- modifier --}}
<div wire:ignore.self class="modal fade" id="modal-Modifier-departement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
            <span>Modifier un département</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group row g-4">
                <div class="col-lg-12">
                    <input wire:model="name" type="text" class="form-control" value="{{ $name ?? ''}}" name="denomination">
                </div>
                <div class="col-lg-12">
                    <input type="text" wire:model="description" value="{{ $description ?? '' }}" class="form-control" name="decription">
                </div>
                
                <div class="col-lg-12">
                    <select wire:model="chef_id" class="form-control text-black"  name="chef_id">
                        <option value="">{{ $nameChef ?? 'Non renseigné'}}</option>
                        @foreach ($personnels as $user)
                            <option value="{{ $user->id}}">{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-lg-12 text-end">
                    <button class="btn btn-add" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="UpdateDepartement({{ $departement->id ?? ''}})">Modifier</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- division --}}
<div wire:ignore.self class="modal fade" id="modal-new-division" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
            <span>Creér une division</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="#" method="#">
                {{-- @csrf --}}

                <div class="form-group row g-4">
                    <div class="col-lg-12">
                        <input wire:model="name" type="text" class="form-control" placeholder="Dénomination" name="denomination" required>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" wire:model="description" class="form-control" placeholder="Déscription" name="decription">
                    </div>
                    <div class="col-lg-12">
                        <select wire:model="departement_id" name="departement_id" id="depart" class="form-control" required>
                            <option value="" selected disabled>Selectionner un département</option>
                            @foreach ($departements as $depart)
                                <option value="{{ $depart->id }}">{{ $depart->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <select wire:model="chef_id" class="form-control"  name="chef_id" required>
                            <option value="" selected >Selectionner un chef de la division ( Facutatif)</option>
                            @foreach ($personnels as $user)
                                <option value="{{ $user->id}}">{{ $user->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-lg-12 text-end">
                        <button class="btn btn-add"  data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="storeDivision()">Créer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
{{-- end division --}}
{{-- fonction --}}
<div  wire:ignore.self class="modal fade" id="modal-new-fonction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  wire:ignore.self class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
            <span>Creér une Fonction</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group row g-4">
                <div class="col-lg-12">
                    <input wire:model="name" type="text" class="form-control" placeholder="Dénomination" name="denomination">
                </div>
                <div class="col-lg-12">
                    <input type="text" wire:model="description" class="form-control" placeholder="Déscription" name="decription">
                </div>
                <div class="col-lg-12 text-end">
                    <button class="btn btn-add" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="storeFonction()">Créer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- end fonction --}}
<div wire:ignore.self  class="modal fade" id="modal-new-personnel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div  wire:ignore.self class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel">
            <span>Créer un Personnel</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group row g-4">
                <div class="col-lg-12">
                    <input wire:model="name" type="text" class="form-control" placeholder="Nom" >
                </div>
                <div class="col-lg-12">
                    <input wire:model="postnom" type="text" class="form-control" placeholder="Post-nom" >
                </div>
                <div class="col-lg-12">
                    <input wire:model="prenom" type="text" class="form-control" placeholder="Prenom" >
                </div>
                <div class="col-lg-12">
                    <input wire:model="email" type="email" class="form-control" placeholder="E-mail" >
                </div>
                <div class="col-lg-12">
                    <input wire:model="matricule" type="text" class="form-control" placeholder="matricule" >
                </div>
                <div class="col-lg-12">
                    <input wire:model="nationalite" type="text" class="form-control" placeholder="nationalité" >
                </div>
                <div class="col-lg-12">
                    <select wire:model="etat_civil"   class="form-control">
                        <option value=""  >Selectionner l'etat-civil</option>
                        <option value="1" >Marie(e)</option>
                        <option value="2" >Célibateur</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <select wire:model="sexe" name="sexe"  class="form-control">
                        <option value="" selected >Selectionner le sexe</option>
                        <option value="1" >Masculin</option>
                        <option value="2" >Feminin</option>
                    </select>
                </div>
                
                <div class="col-lg-12">
                    <select wire:model="departement_id" name="departement_id" id="depart" class="form-control">
                        <option value="" selected >Selectionner un département</option>
                        @foreach ($departements as $depart)
                            <option value="{{ $depart->id }}" > <a href="/" wire:click.prevent ="division({{ $depart->id }})">{{ $depart->nom }}</a> </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <select wire:model="division" class="form-control" >
                        <option value="" selected disabled >Selectionner la division</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id}}">{{ $division->denomination}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <select wire:model="fonction" name="fonction" id="depart" class="form-control">
                        <option value="" selected >Selectionner une fonction</option>
                        @foreach ($fonctions as $fonction)
                            <option value="{{ $fonction->id }}">{{ $fonction->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                
                <div class="col-lg-12 text-end">
                    <button class="btn btn-add" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="storePersonnel()">Créer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{-- modal --}}
<div wire:ignore.self class="modal fade" id="modal-delete-pers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
        <div class="modal-body">
            {{-- <form action="{{  }}" method="post"> --}}
                <div class="content-text text-center">
                    <i data-feather="trash"></i>
                    <h5>Are you sure ? </h5>
                    <p>This action can't be undone.</p>
                </div>
                <div class="block-btn d-flex justify-content-center mb-3">
                    <button class="btn btn-cancel me-4" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent ="empty()">Annuler</button>
                    <button class="btn btn-delete" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent ="update">Supprimer</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
    </div>
</div>
