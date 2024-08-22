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


class LeadController extends Controller
{


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
    
    public function leads_detail($id = ""){
    
        try {
        
            $get_lead_by_id = Lead::where('uuid', $id)->first();
            // dd($get_lead_by_id);
            
            return view('admin_dashboard.leads_detail', compact('get_lead_by_id'));
        
        }catch(\Exception $e) { 

            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function update_leads_detail($id = "", $status = ""){
    
        try {
        
            $get_lead = Lead::find($id);
            $get_lead->status = $status;     
            $get_lead->save();

            return redirect()->route('leads');
        
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

        // $formattedDate = Carbon::parse($lead['created_at'])->format('Y-m-d h:i A');
        // $lead['created_at'] = $formattedDate;
        
        return response()->json($leads);
    }


}
