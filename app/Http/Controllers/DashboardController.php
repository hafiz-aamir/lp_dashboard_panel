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
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; 
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(){
    
        try {
        
            
            
            return view('admin_dashboard.index');
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }



    public function leads(){
    
        try {
        
            
            
            return view('admin_dashboard.leads');
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }



    public function user_management(){
    
        try {
        
            
            
            return view('admin_dashboard.user_management');
        
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


    public function edit_user(){
    
        try {
        
            
            
            return view('admin_dashboard.edit_user');
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }
    

    public function leads_detail(){
    
        try {
        
            
            
            return view('admin_dashboard.leads_detail');
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }



    
    public function getLeads(Request $request)
    {
        // Fetching all leads
        $leads = Lead::orderBy('created_at', 'asc')->get();

        // Returning leads in JSON format
        return response()->json($leads);
    }

    

    public function logout()
    {

        Auth::logout();
        
        return redirect('/login');
        
    }
    

}
