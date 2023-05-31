<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateCheck extends Component
{
    public $message;
    public $hasFetsh = false;

    public function render()
    {
        return view('livewire.update-check');
    }

    public function fetch()
    {
        $git = new \CzProject\GitPhp\Git;
        $repo = $git->open('/path/to/repo');
        $repo->fetch('main');

        $this->message = exec('git fetsh origin main');
        dd($this->message);
    }

    public function pull()
    {
        $this->message = exec('git pull origin main');
    }
}
