<?php

use App\Livewire\HomePage;
use App\Livewire\RegisterScholarship;
use App\Livewire\ScholarshipResult;
use App\Livewire\ScholarshipResultsList;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);

Route::get('/register', RegisterScholarship::class);

Route::get('/results', ScholarshipResultsList::class);

Route::get('/result/{scholarship}', ScholarshipResult::class);
