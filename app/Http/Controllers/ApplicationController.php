<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use App\User;
use App\Alumni;
use App\Work;
use App\Education;
use App\Skill;
use App\Language;

use App\Employer;

use App\Company;
use App\Job;

use App\JobCategory;
use App\JobPositionLevel;

use App\EducationLevel;
use App\EducationQualificationLevel;

use App\Proficiency;

use App\Application;

use App\LogApplication;

use Validator;
use Session;

class ApplicationController extends Controller
{
    // For Alumni
    
    public function submit($id) {
        $id = Crypt::decrypt($id);

        $job = Job::findOrFail($id);

        $application = new Application;
        $application->alumni_id = Auth::user()->alumni->id;
        $application->employer_id = $job->employer_id;
        $application->job_id = $job->id;

        if($application->save()) {
            $id = Crypt::encrypt($application->id);
            return redirect('/application/'.$id)->with('success', 'Successfully applied!');
        } else
            return redirect('/job/apply/'.Crypt::encrypt($job->id))->with('fail', 'Error! Please try again.');
    }

    public function viewall() {
        $user = Auth::user();
        if(count($user->alumni) == 1) {
            $applications = Auth::user()->alumni->applications;
            return view('candidates.viewapplication-all', compact('applications'));
        }
        else {
            return redirect('a/profile/edit')->with('fail', 'Please fill in profile information!');
        }
    }

    public function viewapplication($id) {
        $id = Crypt::decrypt($id);

        $application = Application::findOrFail($id);

        return view('candidates.viewapplication', compact('application'));
    }

    public function viewinterview() {
        $user = Auth::user();
        if(count($user->alumni) == 1) {
            $applications = Auth::user()->alumni->applications;
            return view('candidates.viewapplication-interview', compact('applications'));
        }
        else {
            return redirect('a/profile/edit')->with('fail', 'Please fill in profile information!');
        }
    }

    // For Employer
    
    public function viewalumni($id) {
    	$id = Crypt::decrypt($id);
    	$application = Application::findOrFail($id);

    	// dd($application);
    	return view('candidates.reviewalumni', compact('application'));
    }

    public function action(Request $request, $id, $action) {
    	$application_id = Crypt::decrypt($id);
    	$action = Crypt::decrypt($action);


    	$application = Application::findOrFail($application_id);

        $application->status = $action;
        // $application->a_notification = 1;

    	if(!empty($request->all())) {
	        $validator = Validator::make($request->all(), [
	            'interview_location' => 'required|string',
	            'interview_date' => 'required|string',
	            'interview_time' => 'required|string',
	            'remarks' => 'string',
	        ]);

	        if($validator->fails()) {
	            return redirect('/application/profile/'.$id)->withErrors($validator)->withInput();
	        }

	    	$application->interview_datetime = Carbon::parse($request->interview_date)->format('Y-m-d') . ' ' . Carbon::parse($request->interview_time)->format('H:i:s');
	    	$application->interview_location = $request->interview_location;
	    	$application->remarks = $request->remarks;
	    }

    	if($application->update()) {
            
            LogApplication::create([
                'application_id' => $application->id,
                'status' => $action,
            ]);

            if($action == 6) {
                $alumni = Alumni::findOrFail($application->alumni_id);

                $work = new Work;

                $work->position_title = $application->job->title;
                $work->position_level = $application->job->position_level;
                $work->job_category = $application->job->job_category;
                $work->company_name = $application->job->company->name;
                $work->start_duration = Carbon::now()->year;
                $work->salary = ( $application->job->salary_min + $application->job->salary_max ) / 2;

                if($alumni->works()->save($work))
                    return redirect('/job/overview/'.Crypt::encrypt($application->job_id))->with('success', 'Successful update!');
            }

    		return redirect('/job/overview/'.Crypt::encrypt($application->job_id))->with('success', 'Successful update!');
        }
    	else
    		return view('/application/profile/'.$id)->with('fail', 'Fail update!');
    }

}
