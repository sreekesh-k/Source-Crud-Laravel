<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sourcemembers;

class MemberController extends Controller
{
    public function member(){
        $sourcemembers = sourcemembers::get();

        return view('members.memberRead',['members'=>$sourcemembers]);
    }
    public function mcreate(){
        return view('members.create');
    }
    public function mstore(Request $request){

        $request->validate([
            'name'=>'required'
            ,'image'=>'required|mimes:jpeg,gif,png,jpg|max:10000'
            ,'phone'=>'required'
            ,'email'=>'required'
        ]);

        $imagename= time().'.'.$request->image->extension();
        $request->image->move(public_path('members',$imagename));

        $sourcemembers = new sourcemembers;

        $sourcemembers->name=$request->name;
        $sourcemembers->image =$imagename;
        $sourcemembers->phone=$request->phone;
        $sourcemembers->email=$request->email;
        
        $sourcemembers->save();
        return back()->withSuccess('Member Added!!');
    }
    public function medit($id){
        $sourcemembers = sourcemembers::where('id',$id)->first();
        return view('members.memberEdit',['members'=>$sourcemembers]);
    }
}
