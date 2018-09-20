<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Company;
use App\Job;

use App\JobCategory;
use App\JobPositionLevel;

use App\EducationLevel;
use App\EducationQualificationLevel;

use App\Proficiency;

use Validator;
use Session;

class JobController extends Controller
{
    // View Job

    public function viewjob($id) {
        $user = Auth::user();
        if(empty($user->alumni))
            return redirect('a/profile/edit')->with('fail', 'Please fill in profile information!');

        $id = Crypt::decrypt($id);

        $job = Job::findOrFail($id);
        $other_jobs = Job::where([['id', '!=', $id], ['company_id', $job->company_id], ['availability', 2]])->get();
        $similar_companies = Company::where([['id', '!=', $job->company->id], ['job_category', '=', $job->company->job_category]])->limit(4)->get();

        // dd($job->applications->where('alumni_id', 2));
    	return view('job.viewjob', compact(['job', 'other_jobs', 'similar_companies']));
    }

    public function applyjob($id) {
        $id = Crypt::decrypt($id);
        $job = Job::findOrFail($id);

        $user = Auth::user();

        $jobPositionLevel = JobPositionLevel::all();
        $jobCategory = JobCategory::all();

        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $eduLevel = EducationLevel::all();
        $eduQualificationLevel = EducationQualificationLevel::all();

        if(!empty($user->alumni->identity_card))
    	   return view('job.applyjob', compact(['user', 'job', 'jobPositionLevel', 'jobCategory', 'months', 'eduLevel', 'eduQualificationLevel']));
        else
            return redirect('/a/profile')->with('fail', 'First <p></p>lease fill in profile information!');
    }
    
    public function viewtopjob() {
    	return view('job.viewjob-top');
    }
    
    public function viewcategoriesjob() {
    	return view('job.viewjob-categories');
    }

    // For Employer

    // Post Job

    public function postjob() {

        $user = Auth::user();
        
        if(empty($user->employer))
            return redirect('/e/profile/edit')->with('fail', 'Please fill in profile information!');
            
        if(count($user->employer->company) == 1) {
            $jobCategories = JobCategory::all();
            $positionLevels = JobPositionLevel::all();
            return view('job.postjob', compact(['jobCategories', 'positionLevels']));  
        }
        else {
            return redirect('/company/profile/add')->with('fail', 'Add company detail first!');
        }

        
    }

    public function savejob(Request $request) {
        $user = Auth::user();
        
        $messages = [
            'salary_min.max' => 'The minimum salary field must not greater than maximum salary.',
            'salary_max.min' => 'The maximum salary field must not less than minimum salary.',
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'position_level' => 'required|string',
            'job_category' => 'required|string',
            'location_city' => 'required|string',
            'location_state' => 'required|string',
            'salary_min' => 'required|integer|max:'.(int)$request->salary_max,
            'salary_max' => 'required|integer|min:'.(int)$request->salary_min,
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'required|string',
            'descriptions' => 'required|string',
            'availability' => 'required|integer',
        ], $messages);

        if($validator->fails()) {
            return redirect('/job/post')->withErrors($validator)->withInput();
        }

        if($company_id = $user->employer->company->id) {
            if($user->employer->jobs()->create($request->all() + ['company_id'=>$company_id])) 
                return redirect('/dashboard')->with('success', 'Job Details is saved!');
            else
                return redirect('/job/post')->withInput()->with('fail', 'Job Details is not save!');
        } else
            return redirect('/company/profile/add');
    }

    public function editjob($id) {
        $id = Crypt::decrypt($id);
        $job = Job::findOrFail($id);

        $jobCategories = JobCategory::all();
        $positionLevels = JobPositionLevel::all();

        return view('job.editjob', compact(['job', 'jobCategories', 'positionLevels']));
    }

    public function updatejob(Request $request) {
        $jobId = $request->jobId;
        $id = Crypt::decrypt($jobId);
        $job = Job::findOrFail($id);
        
        $messages = [
            'salary_min.max' => 'The minimum salary field must not greater than maximum salary.',
            'salary_max.min' => 'The maximum salary field must not less than minimum salary.',
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'position_level' => 'required|string',
            'job_category' => 'required|string',
            'location_city' => 'required|string',
            'location_state' => 'required|string',
            'salary_min' => 'required|integer|max:'.(int)$request->salary_max,
            'salary_max' => 'required|integer|min:'.(int)$request->salary_min,
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'required|string',
            'descriptions' => 'required|string',
            'availability' => 'required|integer',
        ], $messages);

        if($validator->fails()) {
            return redirect('/job/edit/'.$jobId)->withErrors($validator)->withInput();
        }

        if($job->update($request->all())) {
            return redirect('/job/overview/'.$jobId)->with('success', 'Job Details is updated!');
        } else {
            return redirect('/job/edit/'.$jobId)->withInput()->with('fail', 'Job Details is not update!');
        }
    }

    // Dashboard
    
    public function overview($id) {
        $id = Crypt::decrypt($id);
        $job = Job::findOrFail($id);

        $jobCategories = JobCategory::all();
        $positionLevels = JobPositionLevel::all();


        return view('job.overviewjob', compact(['job', 'jobCategories', 'positionLevels']));
    }
}
