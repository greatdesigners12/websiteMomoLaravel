<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Http\Requests\StoreannouncementRequest;
use App\Http\Requests\UpdateannouncementRequest;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    function createannouncement(Request $request){
      
        $rules = ['content' => 'required','status'=>'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            if($request->status == 1){
              announcement::query()->update(['status'=>0]);
             
            }
                announcement::create(['content' => $request->content,
                'status' => $request->status]);
                return redirect()->route("toannouncementManagementPage")->with("message", "announcement has been created");
            
           
            
        }
    }
    function updateannouncement(Request $request){
      
        $rules = ['id'=>'required','content' => 'required' ,'status'=>'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            if($request->status == 1){
                announcement::query()->update(['status'=>0]);
            }
            announcement::where('id',$validated['id'])->update(['content' => $request->content,
            'status' => $request->status]);
            return redirect()->route("toannouncementManagementPage")->with("message", "announcement has been updated");
            
        }}
        function deleteAnnouncement(Request $request){
            announcement::where('id',$request->id)->delete();
            return redirect()->back()->with("message", "Announcement deleted");
        }

    
}
