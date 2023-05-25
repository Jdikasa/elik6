<?php

namespace App\Http\Livewire\Teams;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TeamInformation extends Component
{
    use WithFileUploads;

    public $team;
    public $user;
    public $addTeamMemberForm = [
        'name' => '',
        'permissions' => [],
        'description' => '',
    ];
    public $logo;
    public $addTeamnfoForm = [
        'phone' => '',
        'email' => '',
        'rccm' => '',
        'idnat' => '',
        'impot' => '',
        'adresse' => '',
    ];

    public function render()
    {
        $this->user = Auth::user();
        $this->addTeamnfoForm = [
            'phone' => $this->team->teamInfo->phone,
            'email' => $this->team->teamInfo->email,
            'rccm' => $this->team->teamInfo->rccm,
            'idnat' => $this->team->teamInfo->idnat,
            'impot' => $this->team->teamInfo->impot,
            'adresse' => $this->team->teamInfo->adresse,
        ];

        return view('teams.team-information');
    }

    public function updateTeamInfo(): void
    {
        Validator::make($this->addTeamnfoForm, [
            'phone' => ['required', 'string', 'max:25'],
            'email' => ['required', 'email', 'max:255', Rule::unique('team_infos')->ignore($this->team->id)],
            'rccm' => ['string', 'max:70'],
            'idnat' => ['string', 'max:80'],
            'impot' => ['string', 'max:80'],
            'adresse' => ['string', 'max:255'],
            'logo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        if (isset($this->logo)) {
            $this->updateLogo($this->logo);
        }

        $this->team->teamInfo->forceFill([
            'phone' => $this->addTeamnfoForm['phone'],
            'email' => $this->addTeamnfoForm['email'],
            'rccm' => $this->addTeamnfoForm['rccm'],
            'idnat' => $this->addTeamnfoForm['idnat'],
            'impot' => $this->addTeamnfoForm['impot'],
            'adresse' => $this->addTeamnfoForm['adresse'],
        ])->save();
    }

    public function updateLogo(UploadedFile $logo, $storagePath = 'team_infos')
    {
        tap($this->team->teamInfo->logo, function ($previous) use ($logo, $storagePath) {
            $this->team->teamInfo->forceFill([
                'logo' => $logo->storePublicly(
                    $storagePath, ['disk' => $this->logoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->logoDisk())->delete($previous);
            }
        });
    }

    public function addTeamRole()
    {
        $this->validateForm($this->addTeamMemberForm['name'], $this->addTeamMemberForm['description']);

        $role = Role::findOrCreate($this->addTeamMemberForm['name'], 'web');
        $role->key = $role->key ?? $this->roleKey();
        $role->description = $role->description ?? $this->addTeamMemberForm['description'];
        $role->save();

        collect($this->addTeamMemberForm['permissions'])->each(function ($permission) use ($role) {
            $permission = Permission::findOrCreate(Permission::find($permission)->name);
            $role->permissions()->save($permission);
        });
    }

    protected function roleKey()
    {
        $words = explode(' ', $this->addTeamMemberForm['name']);
        $name = trim(collect($words)->map(function ($segment) use ($words) {
            return Str::ucfirst(mb_substr($segment, 0, count($words) == 1 ? 5 : 1));
        })->join(''));

        return $name;
    }

    public function validateForm(string $name, string $description): void
    {
        Validator::make([
            'name' => $name,
            'description' => $description,
        ], $this->rules(), [
            'name.unique' => __('This role allready exists in this team.'),
        ])->validate();

    }

    public function rules(): array
    {
        return array_filter([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'description' => ['string'],
        ]);
    }

    public function logoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
