<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdminManagement extends Component
{
    use Actions;
    
    protected $model = User::class;
    public $editModal = false;
    public $curId;
    public $deleteId = '';
    public $password;
    public $password_confirm;
    protected $rules = [
        'password' => "required|min:6", 
        "password_confirm" => "required|same:password"
    ];
    protected $listeners = ["openAdminEditModal", "adminMsg"];

    public function openAdminEditModal(User $user){
        $this->editModal = true;
        $this->curId = $user->id;
    }
    public function render()
    {
        return view('livewire.admin-management');
    }
    public function processdelete($id){
        User::where("id", $id)->delete();
        $this->emit("adminMsg", "Admin has been deleted");
    }


    public function update($password)

    {

        $this->validateOnly($password);

    }

    public function updatePassword(){
        $this->validate();
        User::where("id", $this->curId)->update(["password" => $this->password]);
        $this->editModal = false;
        
        $this->emit('passwordUpdated');
        $this->openModal= false;
    }
    public function adminMsg($msg){
        session()->flash('message', "Kata sandi berhasil diganti");
    }
    
}
