<?php

namespace App\Http\Livewire\Rh;

use App\Models\Agent;
use App\Models\Statut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Contracts\RemovesTeamMembers;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Fiche extends Component
{
    public $agent;
    public $search;
    public $statut = 1;
    public $statuts;
    public $permissions = [];
    public $permissionGoup = [];

    /**
     * The team instance.
     *
     * @var mixed
     */
    public $team;

    /**
     * Indicates if the application is confirming if a user wishes to leave the current team.
     *
     * @var bool
     */
    public $confirmingLeavingTeam = false;

    /**
     * Indicates if the application is confirming if a team member should be removed.
     *
     * @var bool
     */
    public $confirmingTeamMemberRemoval = false;

    /**
     * The ID of the team member being removed.
     *
     * @var int|null
     */
    public $teamMemberIdBeingRemoved = null;

    /**
     * Mount the component.
     *
     * @param  mixed  $team
     * @return void
     */
    public function mount()
    {
        $this->team = Auth::user()->currentTeam;
    }

    public function render()
    {
        $users = $this->team->allUsers();
        $agents = $users->map(function ($user) {
            return $user->agent;
        });

        $actifAgents = $agents->where('statut_id', 1);
        $inactifAgents = $agents->where('statut_id', 2);
        $archivedAgents = $agents->where('statut_id', 3);

        $this->statuts = Statut::forCurrentTeam()->get();

        if ($this->search) {
            $actifAgents = $actifAgents->where('nom', 'like', "%{$this->search}%")->orwhere('post_nom', 'like', "%{$this->search}%")->orwhere('prenom', 'like', "%{$this->search}%");
            $inactifAgents = $inactifAgents->where('nom', 'like', "%{$this->search}%")->orwhere('post_nom', 'like', "%{$this->search}%")->orwhere('prenom', 'like', "%{$this->search}%");
            $archivedAgents = $archivedAgents->where('nom', 'like', "%{$this->search}%")->orwhere('post_nom', 'like', "%{$this->search}%")->orwhere('prenom', 'like', "%{$this->search}%");
        }

        return view('livewire.rh.fiche', [
            'actifAgents' => $actifAgents->sortBy('prenom'),
            'inactifAgents' => $inactifAgents->sortBy('prenom'),
            'archivedAgents' => $archivedAgents->sortBy('prenom'),
        ]);
    }

    public function showUser($id)
    {
        $this->agent = Agent::with('user')->where('id', $id)->first();
        $this->permissions = $this->agent->user->getPermissionsViaRoles()->pluck('name')->toArray();
        // dd($this->permissions);
    }

    public function switchStatut($value)
    {
        $this->statut = $value;
    }

    /**
     * Confirm that the given team member should be removed.
     *
     * @param  int  $userId
     * @return void
     */
    public function confirmTeamMemberRemoval($userId)
    {
        $this->confirmingTeamMemberRemoval = true;
        $this->teamMemberIdBeingRemoved = $userId;
    }

    /**
     * Remove a team member from the team.
     *
     * @param  \Laravel\Jetstream\Contracts\RemovesTeamMembers  $remover
     * @return void
     */
    public function removeTeamMember(RemovesTeamMembers $remover)
    {
        $remover->remove(
            Auth::user(),
            $this->team,
            $user = Jetstream::findUserByIdOrFail($this->teamMemberIdBeingRemoved)
        );

        $this->confirmingTeamMemberRemoval = false;
        $this->teamMemberIdBeingRemoved = null;
        $this->team = $this->team->fresh();
    }

    /**
     * Remove the currently authenticated user from the team.
     *
     * @param  \Laravel\Jetstream\Contracts\RemovesTeamMembers  $remover
     * @return void
     */
    public function leaveTeam(RemovesTeamMembers $remover)
    {
        $remover->remove(
            Auth::user(),
            $this->team,
            Auth::user()
        );

        $this->confirmingLeavingTeam = false;

        $this->team = $this->team->fresh();

        return redirect(config('fortify.home'));
    }

    public function updatePermission()
    {
        $role = $this->agent->user->roles->where('team_id', $this->team->id)->first();
        if ($this->agent->user->getPermissionsViaRoles()->count()) {
            $role->syncPermissions($this->permissions);
            $this->agent->user->syncPermissions($this->permissions);
        } else {
            $role->givePermissionTo($this->permissions);
            $this->agent->user->givePermissionTo($this->permissions);
        }
    }

}
