<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Company;
use App\Job;

use App\JobCategory;

use App\CompanyType;
use App\CompanySize;

use Validator;
use Session;

class CompanyController extends Controller
{
    // For Alumni
    
    public function viewtopcompany() {
    	return view('company.viewtopcompany');
    }

    public function viewprofile($id) {
    	$id = Crypt::decrypt($id);
        
    	$company = Company::findOrFail($id);
    	$jobs = Job::all()->where('company_id', $company->id)->where('availability', 2);

    	return view('company.viewprofile', compact(['company', 'jobs']));
    }

    // For Employer

    public function view() {
		$user = Auth::user();

        if(empty($user->employer->company))
            return redirect('/company/profile/add');

		$company = $user->employer->company;
    	
        $jobs = Job::all()->where('company_id', $company->id);

    	return view('company.viewprofile', compact(['company', 'jobs']));
    }
    
    public function add() {
        $user = Auth::user();

        $jobCategories = JobCategory::all();
        $companyTypes = CompanyType::all();
        $companySizes = CompanySize::all();

        if(!empty($user->employer->company))
            return redirect('/company/profile/view');

        return view('company.addprofile', compact(['jobCategories', 'companyTypes', 'companySizes']));
    }

    public function save(Request $request) {
        $employer = Auth::user()->employer;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'ssm' => 'required|string',
            'job_category' => 'required|string',
            'company_type' => 'required|string',
            'company_size' => 'required|string',
            'about_us' => 'required|string',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal' => 'required|min:5|max:5',
            'country' => 'required|string',
            'dress_code' => 'nullable|string',
            'work_days' => 'required|string',
            'work_hours' => 'required|string',
            'website_url' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect('/company/profile/add')->withErrors($validator)->withInput();
        }

        if($employer->company()->create($request->all())) {
            return redirect('/company/profile/view')->with('success', 'Company Details is saved!');
        }
        else {
            return redirect('/company/profile/add')->withInput()->with('fail', 'Company Details is not saved!');
        }
    }

    public function edit() {
        $user = Auth::user();

        $company = $user->employer->company;
        $jobCategories = JobCategory::all();
        $companyTypes = CompanyType::all();
        $companySizes = CompanySize::all();

        if(empty($user->employer->company))
            return redirect('/company/profile/add');

        return view('company.editprofile', compact(['company', 'jobCategories', 'companyTypes', 'companySizes']));
    }

    public function update(Request $request) {
        $employer = Auth::user()->employer;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'ssm' => 'required|string',
            'job_category' => 'required|string',
            'company_type' => 'required|string',
            'company_size' => 'required|string',
            'about_us' => 'required|string',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postal' => 'required|min:5|max:5',
            'country' => 'required|string',
            'dress_code' => 'nullable|string',
            'work_days' => 'required|string',
            'work_hours' => 'required|string',
            'website_url' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect('/company/profile/edit')->withErrors($validator)->withInput();
        }

        // $company = new Company;
        // $company->name = $request->name;
        // $company->ssm = $request->ssm;
        // $company->job_category = $request->job_category;
        // $company->company_type = $request->company_type;
        // $company->company_size = $request->company_size;
        // $company->about_us = $request->about_us;
        // $company->address_1 = $request->address_1;
        // $company->address_2 = $request->address_2;
        // $company->city = $request->city;
        // $company->state = $request->state;
        // $company->postal = $request->postal;
        // $company->country = $request->country;
        // $company->dress_code = $request->dress_code;
        // $company->work_days = $request->work_days;
        // $company->work_hours = $request->work_hours;
        // $company->website_url = $request->website_url;
        // if($employer->company()->update($company)) {

        // dd($request->all());
        if($employer->company()->update($request->except(['_token', 'files']))) {
            return redirect('/company/profile/view')->with('success', 'Company Details is updated!');
        }
        else {
            return redirect('/company/profile/edit')->withInput()->with('fail', 'Company Details is not updated!');
        }
    }

}
