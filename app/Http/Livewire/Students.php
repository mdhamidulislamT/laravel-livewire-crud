<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;


class Students extends Component
{
    public $students, $name, $roll, $class, $father, $mother, $mobile, $student_id;
    public $updateMode = false;
    use WithPagination;
    public $searchTerm;
    public function render()
    {   

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.students',[
            'users' => Student::where('name','like', $searchTerm)->paginate(10)
        ]);     
        // return view('livewire.students', [
        //     'users' => Student::paginate(3),
        // ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->class = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'class' => 'required',
        ]);
  
        Student::create($validatedDate);
  
        session()->flash('message', 'Student Created Successfully.');
  
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->student_id = $id;
        $this->name = $student->name;
        $this->class = $student->class;
  
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'class' => 'required',
        ]);
  
        //$student = Student::find($this->student_id);
        $student = Student::findOrFail($this->student_id);

        $student->update([
            'name' => $this->name,
            'class' => $this->class,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Student Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student Deleted Successfully.');
    }

}
