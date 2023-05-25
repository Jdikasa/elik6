<?php

namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\TeamInfo;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\PermissionRegistrar;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  array<string, string>  $input
     */
    public function create(User $user, array $input): Team
    {
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createTeam');

        AddingTeam::dispatch($user);

        $team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
        ]);

        setPermissionsTeamId($team->id);

        $role = \Spatie\Permission\Models\Role::create([
            'key' => 'admin',
            'name' =>
            'Administrateur',
            'guard_name' => 'web',
        ] + (PermissionRegistrar::$teams ? [PermissionRegistrar::$teamsKey => getPermissionsTeamId()] : []));
        
        $role->givePermissionTo("manage human ressources");
        $user->assignRole($role);
        $user->givePermissionTo("manage human ressources");

        TeamInfo::create([
            'team_id' => $team->id,
        ]);

        $user->switchTeam($team);

        return $team;
    }
}
