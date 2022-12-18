<?php

namespace App\Http\Controllers;

use App\Models\Promo;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PromoController extends Controller
{   

    function createpromo(Request $request){
      
            $rules = ['code' => 'required','percentage'=>'required','max_discount'=>'required','status'=>'required'];
            $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }else{
                Promo::create(['code' => $request->code,
                'percentage' => $request->percentage,
                'max_discount' => $request->max_discount,
                'status' => $request->status]);
                return redirect()->back()->with("message", "promo has been created");
                
            }
    
            // $rules = ['code' => 'required',"percentage" => "required","max_discount" => "required" ];
            // $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
            // $validator = Validator::make($request->all(), $rules, $messages);
            // if($validator->fails()){
            //     return redirect()->back()->withErrors($validator);
            // }else{
            //     Promo::create(['code' => $request->code,
            //     'type' => $request->type,
            //     'fixed' => $request->fixed,
            //     'percentage' => $request->percentage,
            //     'max_discount' => $request->max_discount,
            //     'status' => $request->status]);
            //     return redirect()->back()->with("message", "promo has been created");
                
            // }
       
            // $rules = ['code' => 'required', "type"=>"required"];
            // $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
            // $validator = Validator::make($request->all(), $rules, $messages);
        
      
    }
    function updatepromo(Request $request){
      
        $rules = ['id'=>'required','code' => 'required' ,'percentage'=>'required','max_discount'=>'required','status'=>'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            Promo::where('id',$validated['id'])->update(['code' => $request->code,
            'percentage' => $request->percentage,
            'max_discount' => $request->max_discount,
            'status' => $request->status]);
            return redirect()->back()->with("message", "promo has been created");
            
        }}
        function deletePromo(Request $request){
            Promo::where('id',$request->id)->delete();
            return redirect()->back()->with("message", "Promo deleted");
        }
}
