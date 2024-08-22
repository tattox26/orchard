<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
class PluginController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('settings.index', compact('setting'));
    }
    public function store(Request $request)
    {   
        try {            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'unique:users',
                'tittle' => 'required|string|max:255',
            ]);
            $data = $request->only(['name', 'email', 'tittle']);
            $verify = Setting::where('email',$request->email)->first();
            if($verify == null){
                Setting::create($data);
            }else{                
                $setting = Setting::find($verify->id);
                $setting->tittle = $request->tittle;
                $setting->name = $request->name;
                $setting->email = $request->email;
                $setting->update($data);
            }

            return redirect()->route('settings')->with('success', 'Setting save');
        } catch (\Throwable $th) {   
            dd($th);         
            return redirect()->route('settings')->withErrors(['msg' =>$th->getMessage()]);
        }
    }
    public function save(Request $request)
    {
        try {            
            $id = Auth::user()->id;            
            $new['user_id'] = $id;
            $new['product_id']=  $request->product_id;             
            Click::create($new);
            return redirect()->route('block')->with('success', 'Product save');
        } catch (\Throwable $th) {            
            return redirect()->route('storePlugin')->withErrors(['msg' =>$th->getMessage()]);
        }
       
    }
}
