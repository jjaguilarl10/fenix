<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Hash, Auth, Session, Redirect;
use Ramsey\Uuid\Uuid;
use App\Models\User;


class DashboardController extends Controller{
    
    function __construct(){
	
	}


    function index(Request $request){
        try {
            //code...
            return view('dashboard.index')->with([]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    
    }

}
