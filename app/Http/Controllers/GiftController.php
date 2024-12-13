<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Gift; // Ensure the Gift model is imported

class GiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protect all methods requiring authentication
    }

    public function index(Request $request){

        return view('welcome');
    }

    public function allGift(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        $gifts = Gift::paginate(20);
        return view('all_data', compact('gifts')); // Corrected compact method
    }

    public function store(Request $request)
    {
        try {

            $user = Auth::user(); // Get the authenticated user

            // Validate the incoming request data
            $dataValidated = $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric',
                'gift' => 'required',
            ]);
    
            // Check if the gift is already registered for the given mobile number
            $gift = Gift::where('mobile', $request->mobile)->first();
            if ($gift) {
                return response()->json([
                    'message' => 'You are already registered. Your Gift is ' . $gift->gift,'image'=>asset("images/close.svg")
                ], 400); // Changed status code to 400 for conflict
            }
    
            // Create a new gift record
            Gift::create($dataValidated);
    
            return response()->json([
                'message' => 'Registration Successful'
            ], 200); // Success status code
    
        } catch (\Exception $e) {
            // Handle any errors that occur during the process
            return response()->json([
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500); // Internal server error
        }
    }

    public function export()
    {
        $user = Auth::user(); // Get the authenticated user

        return Excel::download(new DataExport, 'gifts.xlsx');
    }
}
