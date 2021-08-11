<?php

namespace App\Http\Controllers;

use App\Models\Myfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MyfileUploadRequest;
use File;

class MyfileController extends Controller
{
    public function myfileIndex(){
        $myfiles = Myfile::where('user_id',Auth::id())->get();
        return view('myfiles')->with('myfiles',$myfiles);
    }

    public function myfileUploadIndex(){
        $files = File::directories(public_path('storage'));
        return view('uploadfile')->with('storages',$files);
    }

    public function myfileUpload(MyfileUploadRequest $request){
        $myfile = new Myfile;
        $myfileFile = $request->file('file');
        $myfile->name = $request->name;
        $myfile->file = $request->storage.'/'.$request->name.'.'.$myfileFile->getClientOriginalExtension();
        $myfile->user_id = Auth::id();
        if($myfile->save()){
            $myfileFile->move('storage/'.$request->storage, $request->name.'.'.$myfileFile->getClientOriginalExtension());
            $request->session()->flash('msg', 'File Uploaded');
        }
        else{
            $request->session()->flash('msg', 'File Upload Failed');
        }
        return redirect()->route('uploadfile.index');
    }

    public function deleteMyfile($id){
        $myfile = Myfile::destroy($id);
        return redirect()->route('myfiles.index');
    }
}
