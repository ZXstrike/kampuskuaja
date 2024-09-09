<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Scholarship;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

class RegisterScholarship extends Component
{
    use WithFileUploads;

    public Scholarship $scholarship;

    #[Validate('required', message: '*Masukan Nama Lengkap')]
    public $name;

    #[Validate('required|email', message: '*Masukan Email yang Valid')]
    public $email;

    #[Validate('required', message: '*Masukan Nomor Telepon')]
    public $phone;

    #[Validate('required', message: '*Masukan Semester')]
    public $semester;

    #[Validate('required', message: '*Masukan IPK')]
    public $gpa;

    #[Validate('required', message: '*Pilih Jenis Beasiswa')]
    public $choice;

    #[Validate('required', message: '*Upload Berkas')]
    public $file;

    public function searchUser()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $this->scholarship = Scholarship::where('email', $this->email)->first();
        if ($this->scholarship) {
            $this->name = $this->scholarship->name;
            $this->phone = $this->scholarship->phone;
            $this->semester = $this->scholarship->semester;
            $this->gpa = $this->scholarship->gpa;
        }
    }


    function submit()
    {
        $this->validate();

        $uploaded_files = '';

        if ($this->file) {
            $uploaded_files = $this->file->store(path: 'uploads');
        }

        $this->scholarship->name = $this->name;
        $this->scholarship->email = $this->email;
        $this->scholarship->phone = $this->phone;
        $this->scholarship->semester = $this->semester;
        $this->scholarship->gpa = $this->gpa;
        $this->scholarship->choice = $this->choice;
        $this->scholarship->file = $uploaded_files;
        $this->scholarship->status = 'pending';
        $this->scholarship->save();

        session()->flash('message', 'Scholarship application submitted successfully.');

        redirect()->to('/result/' . $this->scholarship->id);

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->semester = '';
        $this->gpa = '';
        $this->choice = '';
        $this->file = '';
    }

    #[Title('Register Scholarship')]
    public function render()
    {
        return view('livewire.register-scholarship');
    }
}
