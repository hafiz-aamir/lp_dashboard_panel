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

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(){
    
        try {
        
            $get_pending_leads = Lead::where('status', '0')->count();
            $get_inprogress_leads = Lead::where('status', '1')->count();
            $get_completed_leads = Lead::where('status', '2')->count();
            $get_rejected_leads = Lead::where('status', '3')->count();
            
            return view('admin_dashboard.index', compact('get_pending_leads', 'get_inprogress_leads', 'get_completed_leads', 'get_rejected_leads'));
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }

    

    public function logout()
    {

        Auth::logout();
        
        return redirect('/login');
        
    }
    

}
