<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AnnouncementForm extends Component
{   
    public $announcement;
    public $promo;


    public function mount(){
        if($this->announcement != null){
            $this->content = $this->announcement->content;
            $this->status = $this->announcement->status;
        }
    }
    public function render()
    {
        return view('livewire.announcement-form');
    }
}
