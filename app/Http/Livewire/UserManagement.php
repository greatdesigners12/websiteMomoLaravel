<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserManagement extends Component
{
    public $whatsappModal = false;
    public $title;
    public $content;
    protected $listeners = ["openWhatsappModal", "whatsappBroadcastResponse"];

    public function openWhatsappModal(){
        $this->whatsappModal = true;
    }

    public function broadcastWhatsapp(){
        $this->emit("broadcastWhatsapp",  ["title" => $this->title, "content" => $this->content]);
    }

    public function whatsappBroadcastResponse($data){
        session()->flash($data["status"], $data["message"]);
        $this->whatsappModal = false;
    }
    public function render()
    {
        return view('livewire.user-management');
    }
}
