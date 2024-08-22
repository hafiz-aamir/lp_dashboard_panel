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

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function brand_management(){
    
        try {

            $get_all_brand = Brand::all();

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

                'brand' => 'required|string|max:255',

            ]);
    
            
            try {
                
                $auth_id = Auth::user()->uuid;
                $user = Brand::create([

                    'uuid' =>  Str::uuid(),
                    'brand' => $validated['brand'],
                    'auth_id' => $auth_id
                    
                ]);


                if($user){


                    // $data = [
            
                    //     'details'=>[
                         
                    //         'heading' => "Brand Add",
                    //         'Email'   => 'custombackend@gmail.com',
                    //         'WebsiteName'   => 'Demo Website',

                    //     ]
                    
                    // ];

                    // $senMail = Mail::send('emailtemplate/demo_template', $data, function($message) use ($data){
            
                    //     $message->from(config('app.from_email'), $data['details']['WebsiteName']); 
            
                    //     $message->to($data['details']['Email'])->subject($data['details']['heading']);
                    
                    // });

                
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

        
        $validated = $request->validate([

            'brand' => 'required|string|max:255',

        ]);

        // dd($request->all());
    
        try {
        
            $upd_brand = Brand::where('id', $request->id)->first();
            
            if(!$upd_brand){
                return back()->with('error', 'Record not found');
            }

            $request['brand'] =  $request->brand;
            $request['status'] =  $request->status;
            $upd_brand->fill($request->all());

            $upd_brandd = $upd_brand->save();

            if($upd_brandd){
                return redirect()->route('brand_management')->with('message', 'Record updated successfull');
            }else {
                return back()->with('error', 'Failed to update record');
            }
        
        }catch(\Exception $e) { 

            return back()->with('error', 'Something went wrong');
        }


    }



    public function delete_brand($uuid){
    
        try {
        
            
            
            
        
        }catch(\Exception $e) { 

            return back()->with('error', 'Something went wrong');

        }


    }

}
