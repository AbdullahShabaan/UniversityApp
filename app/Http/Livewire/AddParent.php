<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nationality ;
use App\Models\Religion ;
use App\Models\Blood ;

class AddParent extends Component
{

    public $current = 1 , $father_name , $password , $job , $nationalID , $father_address , $father_job , $father_nationality , $father_religion , $father_blood , $email;

    public $mother_name , $mother_nationalID , $mother_address , $mother_nationality , $mother_religion , $mother_blood ;

    public function render()
    {

        $nationality = Nationality::all();
        $religion = Religion::all();
        $blood = Blood::all();
        return view('livewire.add-parent' , compact('nationality' , 'religion' , 'blood'));
    }

    public function secondStep () {
        $this->current = 2 ;
    }

    public function firstStep () {
        $this->current = 1 ;
    }

     public function thirdStep () {
        $this->current = 3 ;
    }

    public function back() {
        $this->current-- ;
    }
}
