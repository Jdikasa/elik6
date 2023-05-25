<div>
    @if (Gate::check('addTeamMember', $team))
        <x-section-border />

        <!-- Add Team Member -->
        <div class="">
            <x-form-section submit="addTeamMember" class="card">
                <x-slot name="title">
                    <div class="m-2 d-none position-absolute d-flex justify-content-center"
                        style="z-index: 2; height:98.5%; width:98.5%; background-color: rgba(255,255,255,0.99); left:0; top:0;"
                        wire:loading wire:target="addTeamMember, saved" wire:loading.class.remove="d-none">
                        <div class="m-auto text-center">
                            <div class="spinner-border" role="status" style="color: var(--primaryColor)">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                    {{ __('Add Team Member') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Add a new team member to your team, allowing them to collaborate with you.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <div class="max-w-xl text-sm text-gray-600">
                            {{ __('Please provide the email address of the person you would like to add to this team.') }}
                        </div>
                    </div>

                    <!-- Member Email -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" type="email" class="form-contol-lg"
                            wire:model.defer="addTeamMemberForm.email" />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <!-- Role -->
                    @if (\Spatie\Permission\Models\Role::where('team_id', Auth::user()->currentTeam->id)->count() > 0)
                        <div class="col-span-6 lg:col-span-4" wire:poll.keep-alive>
                            <x-label for="role" value="{{ __('Role') }}" />
                            <x-input-error for="role" class="mt-2" />

                            <div
                                class="relative z-0 mt-2 border border-gray-200 rounded-lg cursor-pointer dark:border-gray-700">
                                @foreach (\Spatie\Permission\Models\Role::where('team_id', Auth::user()->currentTeam->id)->get() as $index => $role)
                                    <button type="button"
                                        class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $index > 0 ? 'border-t border-gray-200 focus:border-none rounded-t-none' : '' }} {{ !$loop->last ? 'rounded-b-none' : '' }}"
                                        wire:click="$set('addTeamMemberForm.role', '{{ $role->key }}')">
                                        <div
                                            class="{{ isset($addTeamMemberForm['role']) && $addTeamMemberForm['role'] !== $role->key ? 'opacity-50' : '' }}">
                                            <!-- Role Name -->
                                            <div class="flex items-center">
                                                <div
                                                    class="text-sm text-gray-600 {{ $addTeamMemberForm['role'] == $role->key ? 'font-semibold' : '' }}">
                                                    {{ $role->name }}
                                                </div>

                                                @if ($addTeamMemberForm['role'] == $role->key)
                                                    <svg class="w-5 h-5 ml-2 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @endif
                                            </div>

                                            <!-- Role Description -->
                                            <div class="mt-2 text-xs text-left text-gray-600">
                                                {{ $role->description }}
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </x-slot>

                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Added.') }}
                    </x-action-message>

                    <x-button class="btn-primary">
                        {{ __('Add') }}
                    </x-button>
                </x-slot>
            </x-form-section>
        </div>
    @endif

    @if ($team->teamInvitations->isNotEmpty() && Gate::check('addTeamMember', $team))
        <x-section-border />

        <!-- Team Member Invitations -->
        <div class="">
            <x-action-section class="card">
                <x-slot name="title">
                    {{ __('Pending Team Invitations') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('These people have been invited to your team and have been sent an invitation email. They may join the team by accepting the email invitation.') }}
                </x-slot>

                <x-slot name="content">
                    <div class="space-y-6">
                        @foreach ($team->teamInvitations as $invitation)
                            <div class="flex items-center justify-between">
                                <div class="text-gray-600 dark:text-gray-400">{{ $invitation->email }}</div>

                                <div class="flex items-center">
                                    @if (Gate::check('removeTeamMember', $team))
                                        <!-- Cancel Team Invitation -->
                                        <button class="ml-6 text-sm text-red-500 cursor-pointer focus:outline-none"
                                            wire:click="cancelTeamInvitation({{ $invitation->id }})">
                                            {{ __('Cancel') }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-action-section>
        </div>
    @endif

    @if ($team->users->isNotEmpty())
        <x-section-border />

        <!-- Manage Team Members -->
        {{-- <div class=""> --}}
        <x-action-section class="card">
            <x-slot name="title">
                {{ __('Team Members') }}
            </x-slot>

            <x-slot name="description">
                {{ __('All of the people that are part of this team.') }}
            </x-slot>

            <!-- Team Member List -->
            <x-slot name="content">
                <div class="card-body">
                    @foreach ($team->users->sortBy('name') as $user)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full" src="{{ $user->profile_photo_url }}"
                                    alt="{{ $user->name }}">
                                <div class="ml-4 ">{{ $user->name }}</div>
                            </div>

                            <div class="flex items-center">
                                <!-- Manage Team Member Role -->
                                @if (Gate::check('addTeamMember', $team) &&
                                        \Spatie\Permission\Models\Role::where('team_id', Auth::user()->currentTeam->id)->count())
                                    <button class="ml-2 text-sm text-gray-400 underline"
                                        wire:click="manageRole('{{ $user->id }}')">
                                        {{-- {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }} --}}
                                        {{ \Spatie\Permission\Models\Role::where('key', $user->membership->role)->first()->name }}
                                    </button>
                                @elseif (\Spatie\Permission\Models\Role::where('team_id', Auth::user()->currentTeam->id)->count())
                                    <div class="ml-2 text-sm text-gray-400">
                                        {{-- {{ Laravel\Jetstream\Jetstream::findRole($user->membership->role)->name }} --}}
                                        {{ \Spatie\Permission\Models\Role::where('key', $user->membership->role)->first()->name }}
                                    </div>
                                @endif

                                <!-- Leave Team -->
                                @if ($this->user->id === $user->id)
                                    <button class="ml-6 text-sm text-red-500 cursor-pointer"
                                        wire:click="$toggle('confirmingLeavingTeam')">
                                        {{ __('Leave') }}
                                    </button>

                                    <!-- Remove Team Member -->
                                @elseif (Gate::check('removeTeamMember', $team))
                                    <button class="ml-6 text-sm text-red-500 cursor-pointer"
                                        wire:click="confirmTeamMemberRemoval('{{ $user->id }}')">
                                        {{ __('Remove') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-slot>
        </x-action-section>
        {{-- </div> --}}
    @endif

    <!-- Role Management Modal -->
    <x-dialog-modal wire:model="currentlyManagingRole">
        <x-slot name="title">
            {{ __('Manage Role') }}
        </x-slot>

        <x-slot name="content">
            <x-label for="role" value="{{ __('Role') }}" />
            <x-input-error for="role" class="mt-2" />

            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                @foreach (\Spatie\Permission\Models\Role::where('team_id', Auth::user()->currentTeam->id)->get() as $index => $role)
                    <button type="button"
                        class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 {{ $index > 0 ? 'border-t border-gray-200 focus:border-none rounded-t-none' : '' }} {{ !$loop->last ? 'rounded-b-none' : '' }}"
                        wire:click="$set('currentRole', '{{ $role->key }}')">
                        <div class="{{ $currentRole !== $role->key ? 'opacity-50' : '' }}">
                            <!-- Role Name -->
                            <div class="flex items-center">
                                <div
                                    class="text-sm text-gray-600 {{ $currentRole == $role->key ? 'font-semibold' : '' }}">
                                    {{ $role->name }}
                                </div>

                                @if ($currentRole == $role->key)
                                    <svg class="w-5 h-5 ml-2 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </div>

                            <!-- Role Description -->
                            <div class="mt-2 text-xs text-gray-600">
                                {{ $role->description }}
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>

            <!-- Permission -->
            {{-- @if (\Spatie\Permission\Models\Permission::count() > 0)
                @php
                    $role = \Spatie\Permission\Models\Role::where('key', $currentRole)->first();
                @endphp
                <div class="col-span-6 mb-4 lg:col-span-4 mt-3">
                    <x-label for="role" value="{{ __('Permission') }}" />
                    <x-input-error for="role" class="mt-2" />

                    <div class="pt-2 row">
                        @php
                            $permissionGoupe = \Spatie\Permission\Models\Permission::select('id', 'module_id', 'name')
                                ->get()
                                ->groupBy('module_id');
                        @endphp
                        @foreach ($permissionGoupe as $module => $permissions)
                            <div class="col-span-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="edit-groupe-{{ $loop->iteration }}">
                                    <x-label class="text-lg font-bold form-check-label"
                                        for="edit-groupe-{{ $loop->iteration }}"
                                        value="{{ __(\App\Models\Module::find($module)->name) }}" />
                                </div>
                                @foreach ($permissions as $permission)
                                    <div class="ml-4 form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="edit-permission-{{ $loop->iteration }}" name="permissions[]"
                                            wire:defer.model="addTeamMemberForm.permissions"
                                            value="{{ $permission->id }}" @checked($role?->hasPermissionTo($permission->name))>
                                        <x-label class="form-check-label d-inline"
                                            for="edit-permission-{{ $loop->iteration }}"
                                            value="{{ __($permission->name) }}" />
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif --}}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="stopManagingRole" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="updateRole" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Leave Team Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingLeavingTeam">
        <x-slot name="title">
            {{ __('Leave Team') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to leave this team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingLeavingTeam')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="leaveTeam" wire:loading.attr="disabled">
                {{ __('Leave') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <!-- Remove Team Member Confirmation Modal -->
    <x-confirmation-modal wire:model="confirmingTeamMemberRemoval">
        <x-slot name="title">
            {{ __('Remove Team Member') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove this person from the team?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingTeamMemberRemoval')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="removeTeamMember" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
