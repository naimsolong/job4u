<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use App\User;

use App\Company;

use App\Job;

use App\Application;
use App\LogApplication;

use Validator;
use Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function viewdashboard() {
        $users = User::all();
        $companies = Company::all();
        $jobs = Job::all();
        $applications = Application::all();

        return view('admin.viewdashboard', compact(['users', 'companies', 'jobs', 'applications']));
    }

    public function viewcompany($id) {
    	$id = Crypt::decrypt($id);

    	$company = Company::findOrFail($id);

    	return view('admin.viewcompany', compact('company'));
    }

    public function viewallcompany() {
        $companies = Company::all();

        return view('admin.viewallcompany', compact('companies'));
    }

    public function listverifycompany() {
        $companies = Company::all();

        return view('admin.listverifycompany', compact('companies'));
    }

    public function verifycompany($id, $action) {
    	$id = Crypt::decrypt($id);
    	$action = Crypt::decrypt($action);

    	$company = Company::findOrFail($id);

    	$company->verification = $action;

    	if($company->update())
    		return redirect('/admin/company/all')->with('success', 'Successful update!');
    	else
    		return redirect('/admin/company/view/'.Crypt::encrypt($id))->with('fail', 'Fail to update!');
    }


    public function viewalljob() {
        $jobs = Job::all();

        return view('admin.viewalljob', compact('jobs'));
    }

    public function viewjob($id) {
        $id = Crypt::decrypt($id);

        $job = Job::findOrFail($id);

        return view('admin.viewjob', compact('job'));
    }


    public function monthlyreport() {
        return view('admin.monthlyreport');
    }

    public function yearlyreport() {
        return view('admin.yearlyreport');
    }







    public function graphoverallapplication() {


        $logs = LogApplication::all();

        $data = [
            count($logs->where('status', 1)),
            count($logs->where('status', 2)),
            count($logs->where('status', 3)),
            count($logs->where('status', 4)),
            count($logs->where('status', 5)),
            count($logs->where('status', 6)),
        ];

        return response($data);
    }

    public function graphhiredapplication() {

    	$current_year = Carbon::now()->year;

        $logs = LogApplication::whereYear('created_at', $current_year)->where('status', 6)->get();

        $data = [
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '1')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '2')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '3')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '4')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '5')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '6')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '7')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '8')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '9')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '10')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '11')->get()),
            count(LogApplication::whereYear('created_at', $current_year)->where('status', 6)->whereMonth('created_at', '12')->get()),
        ];

        return response($data);
    }
}
