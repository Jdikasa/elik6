<div>

    @can('update team information')
        <x-section-border />

        <x-form-section submit="updateTeamInfo" class="card">
            <x-slot name="title">
                <div class="m-2 d-none position-absolute d-flex justify-content-center"
                    style="z-index: 2; height:98.5%; width:98.5%; background-color: rgba(255,255,255,0.99); left:0; top:0;"
                    wire:loading wire:target="updateTeamInfo, saved" wire:loading.class.remove="d-none">
                    <div class="m-auto text-center">
                        <div class="spinner-border" role="status" style="color: var(--primaryColor)">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
                {{ __('Profile Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Update your account\'s profile information and email address.') }}
            </x-slot>

            <x-slot name="form">

                <div x-data="{ logoName: null, logoPreview: null }" class="col-span-6 sm:col-span-4">
                    <!-- Team logo File Input -->
                    <input type="file" class="hidden" wire:model="logo" x-ref="logo"
                        x-on:change="
                            logoName = $refs.logo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                logoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.logo.files[0]);
                        " />

                    <x-label for="logo" value="{{ __('Logo') }}" />

                    <!-- Current Profile logo -->
                    <div class="mt-2" x-show="! logoPreview">
                        <img src="{{ $this->team->teamInfo->logo }}" alt="{{ $this->team->name }}"
                            class="object-cover w-20 h-20 rounded-full">
                    </div>

                    <!-- New Profile logo Preview -->
                    <div class="mt-2" x-show="logoPreview" style="display: none;">
                        <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                            x-bind:style="'background-image: url(\'' + logoPreview + '\');'">
                        </span>
                    </div>

                    <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.logo.click()">
                        {{ __('Select A New Logo') }}
                    </x-secondary-button>

                    @if ($this->team->teamInfo->logo)
                        <x-secondary-button type="button" class="mt-2" wire:click="deleteLogo">
                            {{ __('Remove Logo') }}
                        </x-secondary-button>
                    @endif

                    <x-input-error for="logo" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="phone" value="{{ __('Phone') }}" />
                    <x-input id="phone" type="text" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.phone" autocomplete="phone" />
                    <x-input-error for="phone" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.email" autocomplete="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <!-- RCCM -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="rccm" value="{{ __('RCCM') }}" />
                    <x-input id="rccm" type="text" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.rccm" autocomplete="rccm" />
                    <x-input-error for="rccm" class="mt-2" />
                </div>

                <!-- IDNAT -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="idnat" value="{{ __('IDNAT') }}" />
                    <x-input id="idnat" type="text" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.idnat" autocomplete="idnat" />
                    <x-input-error for="idnat" class="mt-2" />
                </div>

                <!-- Impot -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="impot" value="{{ __('Impot Number') }}" />
                    <x-input id="impot" type="text" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.impot" autocomplete="impot" />
                    <x-input-error for="impot" class="mt-2" />
                </div>

                <!-- Adresse -->
                <div class="col-span-6 mb-4 sm:col-span-4">
                    <x-label for="adresse" value="{{ __('Address') }}" />
                    <x-textarea id="adresse" type="text" class="mt-1 form-control-lg"
                        wire:model.defer="addTeamnfoForm.adresse" autocomplete="adresse" />
                    <x-input-error for="adresse" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled" wire:target="logo" class="btn-primary btn-md">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </x-form-section>

        <x-section-border />

        <!-- Add Team Member -->
        <x-form-section submit="addTeamRole" class="card">
            <x-slot name="title">
                <div class="m-2 d-none position-absolute d-flex justify-content-center"
                    style="z-index: 2; height:98.5%; width:98.5%; background-color: rgba(255,255,255,0.99); left:0; top:0;"
                    wire:loading wire:target="addTeamRole, saved" wire:loading.class.remove="d-none">
                    <div class="m-auto text-center">
                        <div class="spinner-border" role="status" style="color: var(--primaryColor)">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
                {{ __('Add a role') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Add a new role to your team, allowing members to collaborate with you in a specific way.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6">
                    <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Please provide the name of the role you would like to add to this team.') }}
                    </div>
                </div>

                <!-- Member Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="role_name" value="{{ __('Name') }}" />
                    <x-input id="role_name" type="text" class="block w-full mt-1"
                        wire:model.defer="addTeamMemberForm.name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="role_description" value="{{ __('Description') }}" />
                    <x-textarea id="role_description" type="text" class="block w-full mt-1"
                        wire:model.defer="addTeamMemberForm.description" />
                    <x-input-error for="description" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Added.') }}
                </x-action-message>

                <x-button class="btn-primary btn-md">
                    {{ __('Add') }}
                </x-button>
            </x-slot>
        </x-form-section>
    @endcan

</div>
