<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\User;
use App\Employer;

use App\Job;

use App\Application;

use App\EmployerType;

use Validator;
use Session;

use PDF;

class EmployerController extends Controller
{
    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Dashboard
    // ----------------------------------------------------------------------

    // View Dashboard
	public function index() {
		$user = Auth::user();

        if(empty($user->employer))
            return redirect('/e/profile/edit')->with('fail', 'Please fill in profile information!');
        
        $jobs = $user->employer->jobs;
        // $job = $user->employer->jobs->first();
        $applications = $user->employer->applications;
        
		return view('employer.viewdashboard', compact(['user', 'jobs','applications']));
	}

    public function ajaxJob(Request $request) {

        if($request->id == '')
            return response('000000000');

        $id = Crypt::decrypt($request->id);
        $job = Job::findOrFail($id);

        $jobs = [
            $job->job_view,
            count($job->applications),
            count($job->applications->where("status", 1)),
            count($job->applications->where("status", 2)),
            count($job->applications->where("status", 3)),
            count($job->applications->where("status", 4)),
            count($job->applications->where("status", 5)),
            count($job->applications->where("status", 6)),
            Crypt::encrypt($job->id),
        ];

        return response($jobs);

    }

    public function ajaxReport() {

        $applications = Auth::user()->employer->applications;

        $jobs = [
            count($applications),
            count($applications->where("status", 1)),
            count($applications->where("status", 2)),
            count($applications->where("status", 3)),
            count($applications->where("status", 4)),
            count($applications->where("status", 5)),
            count($applications->where("status", 6)),
        ];

        return response($jobs);

    }

    public function printReport() {
        // $pdf = PDF::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');

        $applications = Auth::user()->employer->applications;

        $jobs = [
            count($applications),
            count($applications->where("status", 1)),
            count($applications->where("status", 2)),
            count($applications->where("status", 3)),
            count($applications->where("status", 4)),
            count($applications->where("status", 5)),
            count($applications->where("status", 6)),
        ];

        // $data["info"] = "I is usefull!";
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream('whateveryourviewname.pdf');
        
        // return view('employer.report', compact('applications'));
    }

    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Setting
    // ----------------------------------------------------------------------

    // View Setting
	public function viewsetting() {
		$user = Auth::user();

		return view('employer.viewsetting', compact('user'));
	}

    // View Edit Setting View
    public function editsetting() {
        $user = Auth::user();

        return view('employer.editsetting', compact('user'));
    }

    // Update Setting
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
            return redirect('/e/setting/edit')->withErrors($validator)->withInput();
        }
        
        if($user->update($request->all())) {
            return redirect('/e/setting')->with('success', 'Setting updated!');
        }
        else {
            return redirect('/e/setting/edit')->withInput()->with('fail', 'Setting is not update!');
        }
    }

    // View Edit Password
    public function editpassword() {
        return view('employer.editsetting-password');
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
                return redirect('/e/setting/change-password')->withErrors($validator)->with('check_password', 'The current password is not same as previous password.');
            else
                return redirect('/e/setting/change-password')->withErrors($validator);
        }
        
        $user->password = Hash::make($request->password);

        if($user->update()) {
            Auth::login($user);
            return redirect('/e/setting')->with('success', 'Password updated!');
        }
        else {
            return redirect('/e/setting/change-password')->with('fail', 'Password is not update!');
        }
    }

    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Profile
    // ----------------------------------------------------------------------

    // ----------------------------------- General

    // View Profile
	public function viewprofile() {
		$user = Auth::user();

        if(empty($user->employer))
            return redirect('/e/profile/edit')->with('fail', 'Please fill in profile information!');

		return view('employer.viewprofile', compact('user'));
	}

    // View Edit Profile (For New Register User)
    public function editprofile() {
        $user = Auth::user();
        $employerType = EmployerType::all();

        return view('employer.editprofile', compact(['user', 'employerType']));
    }

    // View Edit Profile (For New Register User)
    public function updateprofile(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'identity_card' => 'required|string|min:12|max:12',
            'phone' => 'required|string|min:10|max:13',
            'birth_date' => 'required|before:today',
            'race'=>'required|string',
            'religion'=>'required|string',
            'current_position'=>'required|string',
            'employer_type'=>'required|string',
        ]);

        if($validator->fails())
            return redirect('/e/profile/edit')->withErrors($validator)->withInput();

        $employer = new Employer([
            'identity_card' => $request->identity_card,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'race' => $request->race,
            'religion' => $request->religion,
            'current_position' => $request->current_position,
            'employer_type' => $request->employer_type,
        ]);

        if(empty($user->employer)) {
            if($user->employer()->save($employer))
                return redirect('/e/profile')->with('success', 'Profile is updated!');
        }else{
            if($user->employer()->update([
                'identity_card' => $request->identity_card,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'race' => $request->race,
                'religion' => $request->religion,
                'current_position' => $request->current_position,
                'employer_type' => $request->employer_type,
            ]))
                return redirect('/e/profile')->with('success', 'Profile is updated!');
        }

        return redirect('/e/profile/edit')->with('error', 'Profile is not updated!');
    }
}
