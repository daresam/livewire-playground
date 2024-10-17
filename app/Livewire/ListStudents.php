<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class ListStudents extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.list-students', [
            'students' => Student::paginate(10)
        ]);
    }
}
