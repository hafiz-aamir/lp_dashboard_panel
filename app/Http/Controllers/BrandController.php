<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Exception; 
use Mail;
use Auth;
use Session;
use Hash;
use DB;
use App\Models\User;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use Carbon\Carbon; 
use Illuminate\Support\Str;


class BrandController extends Controller
{
    
    public function brand_management(){
    
        try {

            $get_all_brand = Brand::where('status','1')->get();

            return view('admin_dashboard.brand_management', compact('get_all_brand'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());
          
        }


    }


    public function add_brand(){
    
        try {
            
            return view('admin_dashboard.add_brand');
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }


    }



    public function store_add_brand(Request $request){


            $validated = $request->validate([

                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required_with:password|string|min:8',
                'role_id' => 'required'

            ]);
    
            
            try {
                
                // dd($request->all());
                $ipAddress = getHostByName(getHostName());
                $auth_id = Auth::user()->uuid;

                $user = Brand::create([

                    'uuid' =>  Str::uuid(),
                    'fname' => $validated['fname'],
                    'lname' => $validated['lname'],
                    'email' => $validated['email'],
                    'phone' => 'XXXX-XXXX-XXXX',
                    'password' => bcrypt($validated['password']),
                    'role_id' => $validated['role_id'],
                    'ip' => $ipAddress,
                    'auth_id' => $auth_id
                    
                ]);


                if($user){
                
                    return redirect()->route('brand_management')->with('message', 'Record added successfull');
                    
                }


            }catch(\Exception $e) { 
               
                return back()->with('error', $e->getMessage());

            }

        
    }



    public function edit_brand($uuid){
    
        try {
        
            $get_brand = Brand::where('uuid', $uuid)->first();
            
            // dd($get_brand);  

            return view('admin_dashboard.edit_brand', compact('get_brand'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }

    }


    public function update_brand(Request $request){
    
        try {
        
            $upd_brand = Brand::find($request->id)->first();
            
            if(!$upd_brand){
                return back()->with('error', 'Record not found');
            }

            $upd_brand->fill($request->all());
            $upd_usr = $upd_brand->save();

            if($upd_usr){
                return redirect()->route('brand_management')->with('message', 'Record updated successfull');
            } 
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());
        }


    }



    public function delete_brand($uuid){
    
        try {
        
            
            
            
        
        }catch(\Exception $e) { 

            return back()->with('error', 'Something went wrong');

        }


    }

}
