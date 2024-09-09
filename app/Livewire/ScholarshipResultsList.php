<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Scholarship;
use Livewire\Attributes\Title;

class ScholarshipResultsList extends Component
{

    #[Title('Scholarship Results List')]
    public function render()
    {
        return view('livewire.scholarship-results-list' , [
            'scholarships' => Scholarship::whereNotNull('status')->where('status', '!=', 'none')->get()
        ]);
    }
}
