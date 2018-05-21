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
use PDF;

class AdminController extends Controller
{
    public function viewdashboard() {
        $users = User::all();
        $companies = Company::all();
        $jobs = Job::all();
        $applications = Application::all();

        return view('admin.viewdashboard', compact(['users', 'companies', 'jobs', 'applications']));
    }

    public function viewsetting() {
        $user = Auth::user();
        
        return view('admin.viewsetting', compact('user'));
    }


    // View Edit Setting View
    public function editsetting() {
        $user = Auth::user();

        return view('admin.editsetting', compact('user'));
    }

    public function updatesetting(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        if($validator->fails()) {
            return redirect('/admin/setting/edit')->withErrors($validator)->withInput();
        }
        
        if($user->update($request->all())) {
            return redirect('/admin/setting')->with('success', 'Setting updated!');
        }
        else {
            return redirect('/admin/setting/edit')->withInput()->with('fail', 'Setting is not update!');
        }
    }

    // View Edit Password
    public function editpassword() {
        return view('admin.editpassword');
    }

    // Update Password
    public function updatepassword(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);

        if($validator->fails() || !Hash::check($request->current_password, $user->password)) {
            if(!Hash::check($request->current_password, $user->password))
                return redirect('/admin/change-password')->withErrors($validator)->with('check_password', 'The current password is not same as previous password.');
            else
                return redirect('/admin/change-password')->withErrors($validator);
        }
        
        $user->password = Hash::make($request->password);

        if($user->update()) {
            Auth::login($user);
            return redirect('/admin/setting')->with('success', 'Password updated!');
        }
        else {
            return redirect('/admin/change-password')->with('fail', 'Password is not update!');
        }
    }


    public function viewcompany($id) {
    	$id = Crypt::decrypt($id);

    	$company = Company::findOrFail($id);

    	return view('admin.viewcompany', compact('company'));
    }

    public function viewallcompany() {
        $companies = Company::paginate(10);

        return view('admin.viewallcompany', compact('companies'));
    }

    public function listverifycompany() {
        $companies = Company::paginate(10);

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


    public function viewallapplication() {
        $applications = Application::paginate(15);

        return view('admin.viewallapplication', compact('applications'));
    }

    public function viewapplication($id) {
        $id = Crypt::decrypt($id);

        $application = Application::findOrFail($id);

        return view('admin.viewapplication', compact('application'));
    }


    public function viewalljob() {
        $jobs = Job::paginate(20);

        return view('admin.viewalljob', compact('jobs'));
    }

    public function viewjob($id) {
        $id = Crypt::decrypt($id);

        $job = Job::findOrFail($id);

        return view('admin.viewjob', compact('job'));
    }


    public function reportmonthly() {
        return view('admin.reportmonthly');
    }

    public function reportyearly() {
        return view('admin.reportyearly');
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

    	$year = Carbon::now()->year;

        $logs = LogApplication::whereYear('created_at', $year)->where('status', 6)->get();

        $data = [
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '1')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '2')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '3')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '4')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '5')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '6')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '7')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '8')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '9')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '10')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '11')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '12')->get()),
        ];

        return response($data);
    }

    public function printOverallReport() {

        $applications = Application::all();
        $date = Carbon::now()->format('l jS F Y h:i:s A');

        $pdf = PDF::loadView('admin.overallreport', array('applications'=>$applications, 'date'=>$date));
        return $pdf->stream('OverallReport.pdf');
        
        // return view('employer.report', compact('jobs'));
    }

    public function printHiredReport() {

        $logapplications = LogApplication::all();
        $date = Carbon::now()->format('l jS F Y h:i:s A');
        $year = Carbon::now()->format('Y');
        $data = [
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '1')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '2')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '3')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '4')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '5')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '6')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '7')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '8')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '9')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '10')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '11')->get()),
            count(LogApplication::whereYear('created_at', $year)->where('status', 6)->whereMonth('created_at', '12')->get()),
        ];
        $pdf = PDF::loadView('admin.hiredreport', array('data'=>$data, 'date'=>$date, 'year'=>$year));
        return $pdf->stream('HiredReport.pdf');
        
        // return view('employer.report', compact('jobs'));
    }
}
