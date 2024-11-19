<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateStudent extends Component
{
    #[Validate('required')]
    public $name;

    #[Validate('required|email|unique:students,email')]
    public $email;

    #[Validate('required|numeric')]
    public $class_id;

    #[Validate('required|numeric')]
    public $section_id;

    public $students = [];

    public function updatedClassId($value): void
    {
        $this->students = Section::where('class_id', operator: $value)->get();
    }
    public function addStudent()
    {
        $this->validate();

        Student::create([
            'name' => $this->name,
            'email' => $this->email,
            'class_id' => $this->class_id,
            'section_id' => $this->section_id,
        ]);

        return redirect(route('students.index'));
    }
    public function render()
    {
        return view('livewire.create-student', [
            'classes' => Classes::all()
        ]);
    }
}
