<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{

    // public function index(Request $request){

    //     return view('welcome');
    // }

    public function allUser(Request $request,$type)
    {
        $users = User::where('type',$type)->paginate(20);

        return view('all_data', compact('users','type'));

    }

    public function store(Request $request)
    {
        try {

            $user = Auth::user(); // Get the authenticated user

            $dataValidated = $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric|regex:/^[0-9]{11}$/',
                'type'=> 'required'
            ]);
            
            $User = User::where('mobile', $request->mobile)->first();
            if ($User) {
                return response()->json([
                    'message' => 'You are already registered. ','image'=>asset("images/close.svg")
                ], 400);
            }
    
            User::create($dataValidated);
    
            return response()->json([
                'message' => 'Registration Successful'
            ], 200); // Success status code|
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500); // Internal server error
        }
    }

    public function addScore(Request $request){
        try {
                $user = User::where('mobile',$request->mobile)->first();
                if($user){

                    $user->update([
                        'score'=>$request->score
                    ]);

                    return response()->json([
                        'message' => 'score add  Successful'
                    ], 200); // Success status code|
                }
                return response()->json([
                    'message' => 'user not found'
                ], 500);
            }
        catch (\Exception $e) {
                return response()->json([
                    'message' => 'Something went wrong: ' . $e->getMessage()
                ], 500); // Internal server error
        }
    }


    public function export($type)
    {
        $user = Auth::user();
    
        // Customize file name based on the type
        $fileName = 'users_' . strtolower($type) . '.xlsx';
    
        return Excel::download(new DataExport($type), $fileName);
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
    
        try {
            Excel::import(new UsersImport, $request->file('file'));
            // return response()->json([
            //     'message' => 'Users imported successfully'
            // ], 200); 
            return back()->with('success', 'Users imported successfully.');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500); 
        
        }
    }
    

}
