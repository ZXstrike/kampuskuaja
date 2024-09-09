<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Scholarship;
use Livewire\Attributes\Title;

class ScholarshipResult extends Component
{
    public Scholarship $scholarship;

    public function mount(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    #[Title('Scholarship Result')]
    public function render()
    {
        return view('livewire.scholarship-result');
    }
}
