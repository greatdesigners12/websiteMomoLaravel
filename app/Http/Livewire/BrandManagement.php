<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class BrandManagement extends Component
{
    use WithFileUploads;
    use Actions;

    public $name;
    public $photo;
    public $openModal = false;
    public $curId = null;
    public $curPhotoUrl;
    public $status;
    protected $listeners = ["openBrandEditModal", "openDeleteBrandConfirmation"];

    protected $rules = [

        'name' => 'required',

    ];

    public function openDeleteBrandConfirmation($id){
        
        $this->dialog()->confirm([

            'title'       => 'Are you Sure?',

            'description' => 'Want to delete this brand ?',

            'icon'        => 'warning',

            'accept'      => [

                'label'  => 'Yes, i am sure',

                'method' => 'deleteBrand',

                'params' => $id,

            ],

            'reject' => [

                'label'  => 'No, cancel',

                'method' => 'cancel',

            ],

        ]);
    }

    public function openCreateBrandModal(){
        $this->openModal = true;
        $this->status = "create";
    }

    public function deleteBrand($id){
        Brand::where("id", $id)->delete();
        session()->flash('message', 'The Brand successfully deleted.');
        $this->emit('brandsUpdated');
    }

    public function openBrandEditModal($id){
        $this->status = "update";
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
        if($this->status == "update"){
            $imageName = $this->curPhotoUrl;
            if($this->photo != null){
                if (Storage::disk('public')->exists("img/momo_partner/" . $imageName)) {
                    
                    Storage::disk('public')->delete("img/momo_partner/" . $imageName);
                }
                
                $imageName = time().'.'.$this->photo->extension(); 
                $this->photo->storeAs('img/momo_partner/', $imageName, 'public');
            }
            
            Brand::where("id", $this->curId)->update(["name" => $this->name, "logo" => $imageName]);
            session()->flash('message', 'The Brand successfully updated.');
            $this->emit('brandsUpdated');
        }else{
            if($this->photo != null){
                $imageName = time().'.'.$this->photo->extension(); 
                $this->photo->storeAs('img/momo_partner/', $imageName, 'public');

                Brand::create(["name" => $this->name, "logo" => $imageName]);
                session()->flash('message', 'The Brand successfully created.');
                $this->emit('brandsUpdated');
            }else{
                $this->addError('photo', 'Photo is required');
            }
            
        }
       
        $this->openModal = false;
            
        
    }


    public function render()
    {
        return view('livewire.brand-management');
    }
}
