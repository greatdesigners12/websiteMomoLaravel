<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class BrandManagement extends Component
{
    use WithFileUploads;

    public $name;
    public $photo;
    public $openModal = false;
    public $curId = null;
    public $curPhotoUrl;
    protected $listeners = ["openBrandEditModal"];

    protected $rules = [

        'name' => 'required',

    ];

    

    public function openBrandEditModal($id){
        
        $this->openModal = true;
        $this->curId = $id;
        $brand = Brand::find($id);
     
        $this->name = $brand->name;
        $this->curPhotoUrl = $brand->logo;
    }

    public function updated($propertyName)

    {

        $this->validateOnly($propertyName);

    }

    public function updateBrand(){
        
        $this->validate();
        $imageName = $this->curPhotoUrl;
        if($this->photo != null){
            if (Storage::disk('public')->exists("img/momo_partner/" . $imageName)) {
                
                Storage::disk('public')->delete("img/momo_partner/" . $imageName);
            }
            
            $imageName = time().'.'.$this->photo->extension(); 
            $this->photo->storeAs('img/momo_partner/', $imageName, 'public');
        }
        
        Brand::where("id", $this->curId)->update(["name" => $this->name, "logo" => $imageName]);
        session()->flash('message', 'Post successfully updated.');
        $this->emit('brandsUpdated');
        $this->openModal = false;
            
        
    }


    public function render()
    {
        return view('livewire.brand-management');
    }
}
