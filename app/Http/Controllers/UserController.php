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
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use App\Traits\PermissionTrait;



class UserController extends Controller
{
    
    use PermissionTrait;
    
    public function user_management(){
    
        try {

            $get_all_user = User::all();

            return view('admin_dashboard.user_management', compact('get_all_user'));
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function add_user(){
    
        try {
            
            return view('admin_dashboard.add_user');
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }



    public function store_add_user(Request $request){


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

                $user = User::create([

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
                
                    return redirect()->route('user_management')->with('message', 'Record added successfull');
                    
                }


            }catch(\Exception $e) { 
               
                return back()->with('error', $e->getMessage());

            }

        
    }



    public function edit_user($uuid){
    
        try {
        
            $get_user = User::where('uuid', $uuid)->first();
            
            // dd($get_user);  

            return view('admin_dashboard.edit_user', compact('get_user'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }


    }


    public function update_user(Request $request){
    
        try {
        
            $upd_user = User::find($request->id)->first();
            
            if(!$upd_user){
                return back()->with('error', 'Record not found');
            }

            $upd_user->fill($request->all());
            $upd_usr = $upd_user->save();

            if($upd_usr){
                return redirect()->route('user_management')->with('message', 'Record updated successfull');
            } 
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());
        }


    }



    public function delete_user($uuid){
    
        try {
        
            
            
            
        
        }catch(\Exception $e) { 

            return back()->with('error', 'Something went wrong');

        }


    }
    

}
