<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use App\User;
use App\Alumni;
use App\Work;
use App\Education;
use App\Skill;
use App\Language;

use App\Company;
use App\Job;

use App\JobCategory;
use App\JobPositionLevel;

use App\EducationLevel;
use App\EducationQualificationLevel;

use App\Proficiency;

use Validator;
use Session;

class AlumniController extends Controller
{
    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Dashboard
    // ----------------------------------------------------------------------

    // View Dashboard
    public function index() {
        $companies = Company::where('profile_view', '>', 30)->limit(3)->get();
        $jobs = Job::where('availability', 2)->orderBy('created_at', 'asc')->paginate(10);

    	return view('alumni.viewindex', compact(['companies', 'jobs']));
    }

    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Setting
    // ----------------------------------------------------------------------

    // View Setting
    public function viewsetting() {
        $user = Auth::user();

        return view('alumni.viewsetting', compact('user'));
    }

    // View Edit Setting View
    public function editsetting() {
        $user = Auth::user();

        return view('alumni.editsetting', compact('user'));
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
            return redirect('/a/setting/edit')->withErrors($validator)->withInput();
        }
        
        if($user->update($request->all())) {
            return redirect('/a/setting')->with('success', 'Setting updated!');
        }
        else {
            return redirect('/a/setting/edit')->withInput()->with('fail', 'Setting is not update!');
        }
    }

    // View Edit Password
    public function editpassword() {
        return view('alumni.editsetting-password');
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
                return redirect('/a/setting/change-password')->withErrors($validator)->with('check_password', 'The current password is not same as previous password.');
            else
                return redirect('/a/setting/change-password')->withErrors($validator);
        }
        
        $user->password = Hash::make($request->password);

        if($user->update()) {
            Auth::login($user);
            return redirect('/a/setting')->with('success', 'Password updated!');
        }
        else {
            return redirect('/a/setting/change-password')->with('fail', 'Password is not update!');
        }
    }

    // ----------------------------------------------------------------------
    // ---------------------------------------------------------------------- Profile
    // ----------------------------------------------------------------------

    // ----------------------------------- General

    // View Profile
    public function viewprofile() {
        $user = Auth::user();

        if(empty($user->alumni))
            return redirect('a/profile/edit')->with('fail', 'Please fill in profile information!');
        
        return view('alumni.viewprofile', compact('user'));
    }

    // View Edit Profile (For New Register User)
    public function editprofile() {
        $user = Auth::user();

        $jobPositionLevel = JobPositionLevel::all();
        $jobCategory = JobCategory::all();

        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $eduLevel = EducationLevel::all();
        $eduQualificationLevel = EducationQualificationLevel::all();

        $proficiencies = Proficiency::all();

        if(!empty($user->alumni))
            return redirect('a/profile')->with('fail', 'System error!');

        return view('alumni.editprofile', compact(['user', 'jobPositionLevel', 'jobCategory', 'months', 'eduLevel', 'eduQualificationLevel', 'proficiencies']));
    }

    // Update Profile (For New Register User)
    public function updateprofile(Request $request) {
        $user = Auth::user();

        $messages = [
            'start_duration.required' => 'The year start field is required.',
            'end_duration.required' => 'The year end field is required.',
            'start_duration.max' => 'The year start field cannot be after the year end field.',
            'end_duration.min' => 'The year end field cannot before the year start field.',
            'skillName_1.required' => 'The skill name field is required.',
            'skillProficiency_1.required' => 'The skill proficiency field is required.',
            'langName_1.required' => 'The language name field is required.',
            'langProficiency_1.required' => 'The language proficiency field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'identity_card' => 'required|string|min:12|max:12',
            'birth_date' => 'required|before:today',
            'birth_state' => 'required|string',
            'race' => 'required|string',
            'religion' => 'required|string',
            'disability' => 'required',
            'marriage_status' => 'required',
            'phone' => 'required|string|min:10|max:13',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required|min:5|max:5',
            'country' => 'required',
            'about_me' => 'required|string|min:200',

            'position_title' => 'nullable|string',
            'position_level' => 'nullable|string',
            'job_category' => 'nullable|string',
            'company_name' => 'nullable|string',
            'start_duration' => 'nullable|integer|max:'.(int)$request->end_duration,
            'end_duration' => 'nullable|integer|min:'.(int)$request->start_duration,
            'salary' => 'nullable|integer',

            'major' => 'required|string',
            'education_level' => 'required|string',
            'institution' => 'required|string',
            'qualification_level' => 'required|string',
            'graduate_month' => 'required|string',
            'graduate_year' => 'required|integer',

            'skillName_1' => 'required|string',
            'skillProficiency_1' => 'required|string',

            'langName_1' => 'required|string',
            'langProficiency_1' => 'required|string',
        ], $messages);

        if($validator->fails()) {
            return redirect('/a/profile/edit')->withErrors($validator)->withInput();
        }



        // --------------------

        $alumni = new Alumni([
            'identity_card' => $request->identity_card,
            'birth_date' => $request->birth_date,
            'birth_state' => $request->birth_state,
            'race' => $request->race,
            'religion' => $request->religion,
            'disability' => $request->disability,
            'marriage_status' => $request->marriage_status,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal' => $request->postal,
            'country' => $request->country,
            'about_me' => $request->about_me,
        ]);

        $education = new Education([
            'major' => $request->major,
            'education_level' => $request->education_level,
            'institution' => $request->institution,
            'qualification_level' => $request->qualification_level,
            'graduate_month' => $request->graduate_month,
            'graduate_year' => $request->graduate_year,
        ]);

        $skill1 = new Skill([
            'name' => $request->skillName_1,
            'proficiency' => $request->skillProficiency_1,
        ]);

        $language1 = new Language([
            'name' => $request->langName_1,
            'proficiency' => $request->langProficiency_1,
        ]);

        // dd($request->all());

        if(
            $user->alumni()->save($alumni) &&
            $user->alumni->educations()->save($education) &&
            $user->alumni->skills()->save($skill1) &&
            $user->alumni->languages()->save($language1)
        ) {

            if($request->position_title != null && $request->position_level != null && $request->job_category != null && $request->company_name != null && $request->start_duration != null && $request->end_duration != null && $request->salary != null) {

                $work = new Work;
                $work->position_title = $request->position_title;
                $work->position_level = $request->position_level;
                $work->job_category = $request->job_category;
                $work->company_name = $request->company_name;
                $work->start_duration = $request->start_duration;
                $work->end_duration = $request->end_duration;
                $work->salary = $request->salary;
                


                if(!$user->alumni->works()->save($work))
                    return redirect('/a/profile')->with('fail', 'Working Experience is not update!');
            }
            if($request->skillName_2 != null && $request->skillName_2 != null) {

                $skill2 = new Skill([
                    'name' => $request->skillName_2,
                    'proficiency' => $request->skillProficiency_2,
                ]);

                if(!$user->alumni->skills()->save($skill2))
                    return redirect('/a/profile')->with('fail', '#2 Skill is not update!');
            }
            if($request->skillName_3 != null && $request->skillName_3 != null) {

                $skill3 = new Skill([
                    'name' => $request->skillName_3,
                    'proficiency' => $request->skillProficiency_3,
                ]);

                if(!$user->alumni->skills()->save($skill3))
                    return redirect('/a/profile')->with('fail', '#3 Skill is not update!');
            }
            if($request->langName_2 != null && $request->langName_2 != null) {

                $language2 = new Language([
                    'name' => $request->langName_2,
                    'proficiency' => $request->langProficiency_2,
                ]);

                if(!$user->alumni->languages()->save($language2))
                    return redirect('/a/profile')->with('fail', '#2 Language is not update!');
            }
            if($request->skillName_3 != null && $request->skillName_3 != null) {

                $language3 = new Language([
                    'name' => $request->langName_3,
                    'proficiency' => $request->langProficiency_3,
                ]);

                if(!$user->alumni->languages()->save($language3))
                    return redirect('/a/profile')->with('fail', '#3 Language is not update!');
            }

            return redirect('/a/profile')->with('success', 'Personal Information updated!');
        } else
            return redirect('/a/profile/edit')->with('fail', 'Personal Information is not update!');

    }

    // ----------------------------------- Personal Info

    // View Edit Personal Info
    public function editinfo() {
        $user = Auth::user();
        return view('alumni.editprofile-editinfo', compact('user'));
    }

    // Update Personal Info
    public function updateinfo(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'gender' => 'required',
            'identity_card' => 'required|string|min:12|max:12',
            'birth_date' => 'required|before:today',
            'birth_state' => 'required|string',
            'race' => 'required|string',
            'religion' => 'required|string',
            'disability' => 'required',
            'marriage_status' => 'required',
            'phone' => 'required|string|min:10|max:13',
            'address_1' => 'required|string',
            'address_2' => 'nullable|string',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required|min:5|max:5',
            'country' => 'required',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/personal-info')->withErrors($validator)->withInput();

        $updateUser = array([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
        ]);
        $updateAlumni = array([
            'indentity_card' => $request->indentity_card,
            'birth_date' => $request->birth_date,
            'birth_state' => $request->birth_state,
            'race' => $request->race,
            'religion' => $request->religion,
            'disability' => $request->disability,
            'marriage_status' => $request->marriage_status,
            'phone' => $request->phone,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'postal' => $request->postal,
            'country' => $request->country,
        ]);

        if($user->update($updateUser[0]) && $user->alumni->update($updateAlumni[0]))
            return redirect('/a/profile')->with('success', 'Personal Info updated!');
        else 
            return redirect('/a/profile/edit/personal-info')->with('fail', 'Personal Info is not update!');
    }

    // ----------------------------------- About Me

    // View Edit About Me
    public function editabout() {
        $user = Auth::user();
        return view('alumni.editprofile-editabout', compact('user'));
    }

    // Update About Me
    public function updateabout(Request $request) {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'about_me' => 'required|string|min:200',
        ]);

        // dd($validator->messages());
        if($validator->fails())
            return redirect('/a/profile/edit/about-me')->withErrors($validator)->withInput();

        if($user->alumni->update(['about_me' => $request->about_me]))
            return redirect()->to(route('alumniprofile.view').'#aboutme')->with('success', 'About Me updated!');
        else 
            return redirect()->to(route('alumniprofile.view').'#aboutme')->with('fail', 'About Me is not update!');
    }

    // ----------------------------------- Working Experience

    // View Work
    public function viewwork() {
        $user = Auth::user();
        if(count($user->alumni->works) > 0)
            return view('alumni.editprofile-viewwork', compact('user'));
        else
            return redirect()->to(route('alumniprofile.view').'#working')->with('fail', 'Fail to fetch working experience data.');
    }

    // View Add Work
    public function addwork() {
        $jobPositionLevel = JobPositionLevel::all();
        $jobCategory = JobCategory::all();

        return view('alumni.editprofile-addwork', compact(['jobPositionLevel', 'jobCategory']));
    }

    // Save Work
    public function savework(Request $request) {
        $alumni = Alumni::findOrFail(Auth::user()->alumni->id);
        
        $messages = [
            'start_duration.required' => 'The year start field is required.',
            'end_duration.required' => 'The year end field is required.',
            'start_duration.max' => 'The year start field cannot be after the year end field.',
            'end_duration.min' => 'The year end field cannot before the year start field.',
        ];
        
        $validator = Validator::make($request->all(), [
            'position_title' => 'required|string',
            'position_level' => 'required|string',
            'job_category' => 'required|string',
            'company_name' => 'required|string',
            'start_duration' => 'required|integer|max:'.(int)$request->end_duration,
            'end_duration' => 'required|integer|min:'.(int)$request->start_duration,
            'salary' => 'required|integer',
        ], $messages);

        if($validator->fails())
            return redirect('/a/profile/add/working-experience')->withErrors($validator)->withInput();

        $work = new Work($request->all());

        if($alumni->works()->save($work))
            return redirect('/a/profile/edit/working-experience')->with('success', 'Working Experience saved!');
        else
            return redirect('/a/profile/edit/working-experience')->with('fail', 'Working Experience is not save!');
    }

    // View Edit Work
    public function editwork($id) {
        $id = Crypt::decrypt($id);
        $work = Work::findOrFail($id);

        $jobPositionLevel = JobPositionLevel::all();
        $jobCategory = JobCategory::all();

        return view('alumni.editprofile-editwork', compact(['work', 'jobPositionLevel', 'jobCategory']));
    }

    // Update Work
    public function updatework(Request $request) {
        $id = Crypt::decrypt($request->id);
        $work = Work::findOrFail($id);
        
        $messages = [
            'start_duration.required' => 'The year start field is required.',
            'end_duration.required' => 'The year end field is required.',
            'start_duration.max' => 'The year start field cannot be after the year end field.',
            'end_duration.min' => 'The year end field cannot before the year start field.',
        ];

        $validator = Validator::make($request->all(), [
            'position_title' => 'required|string',
            'position_level' => 'required|string',
            'job_category' => 'required|string',
            'company_name' => 'required|string',
            'start_duration' => 'required|integer|max:'.(int)$request->end_duration,
            'end_duration' => 'required|integer|min:'.(int)$request->start_duration,
            'salary' => 'required|integer',
        ], $messages);

        if($validator->fails())
            return redirect('/a/profile/edit/working-experience/'.$request->id)->withErrors($validator)->withInput();

        if($work->update($request->all()))
            return redirect('/a/profile/edit/working-experience/')->with('success', 'Working Experience updated!');
        else
            return redirect('/a/profile/edit/working-experience/')->with('fail', 'Working Experience is not update!');
    }

    // Delete Work
    public function deletework($id) {
        $id = Crypt::decrypt($id);
        $work = Work::findOrFail($id);

        if($work->delete()) {
            $user = Auth::user();

            if(count($user->alumni->works) > 0)
                return redirect('/a/profile/edit/working-experience')->with('success', 'Successful delete Working Experience');
            else
                return redirect()->to(route('alumniprofile.view').'#working')->with('success', 'Successful delete Working Experience');
        }
        else
            return redirect('/a/profile/edit/working-experience')->with('fail', 'Error deleting Working Experience!');
    }

    // ----------------------------------- Education

    // View Education
    public function viewedu() {
        $user = Auth::user();

        if(count($user->alumni->educations) > 0)
            return view('alumni.editprofile-viewedu', compact('user'));
        else
            return redirect()->to(route('alumniprofile.view').'#education')->with('fail', 'Fail to fetch educations data.');
    }

    // View Add Education
    public function addedu() {
        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $eduLevel = EducationLevel::all();
        $eduQualificationLevel = EducationQualificationLevel::all();

        return view('alumni.editprofile-addedu', compact(['months', 'eduLevel', 'eduQualificationLevel']));
    }

    // Save Education
    public function saveedu(Request $request) {
        $alumni = Alumni::findOrFail(Auth::user()->alumni->id);

        $validator = Validator::make($request->all(), [
            'major' => 'required|string',
            'education_level' => 'required|string',
            'institution' => 'required|string',
            'qualification_level' => 'required|string',
            'graduate_month' => 'required|string',
            'graduate_year' => 'required|integer',
        ]);

        if($validator->fails())
            return redirect('/a/profile/add/education')->withErrors($validator)->withInput();

        $education = new Education($request->all());

        if($alumni->educations()->save($education))
            return redirect('/a/profile/edit/education')->with('success', 'Working Experience saved!');
        else
            return redirect('/a/profile/edit/education')->with('fail', 'Working Experience is not save!');
    }

    // View Edit Education
    public function editedu($id) {
        $id = Crypt::decrypt($id);
        $education = Education::findOrFail($id);

        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $eduLevel = EducationLevel::all();
        $eduQualificationLevel = EducationQualificationLevel::all();

        return view('alumni.editprofile-editedu', compact(['months', 'education', 'eduLevel', 'eduQualificationLevel']));
    }

    // Update Education
    public function updateedu(Request $request) {
        $id = Crypt::decrypt($request->id);
        $education = Education::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'major' => 'required|string',
            'education_level' => 'required|string',
            'institution' => 'required|string',
            'qualification_level' => 'required|string',
            'graduate_month' => 'required|string',
            'graduate_year' => 'required|integer',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/education/'.$request->id)->withErrors($validator)->withInput();

        if($education->update($request->all()))
            return redirect('/a/profile/edit/education')->with('success', 'Education updated!');
        else
            return redirect('/a/profile/edit/education')->with('fail', 'Education is not update!');
    }

    // Delete Education
    public function deleteedu($id) {
        $id = Crypt::decrypt($id);
        $education = Education::findOrFail($id);

        if($education->delete()) {
            $user = Auth::user();

            if(count($user->alumni->educations) > 0)
                return redirect('/a/profile/edit/education')->with('success', 'Successful delete Working Experience');
            else
                return redirect()->to(route('alumniprofile.view').'#education')->with('success', 'Successful delete Working Experience');
        }
        else
            return redirect('/a/profile/edit/education')->with('fail', 'Error deleting Working Experience!');
    }

    // ----------------------------------- Skills & Expertise

    // View Skills & Expertise
    public function viewskill() {
        $user = Auth::user();

        $proficiencies = Proficiency::all();

        if(count($user->alumni->skills) > 0)
            return view('alumni.editprofile-viewskills', compact(['user', 'proficiencies']));
        else
            return redirect()->to(route('alumniprofile.view').'#skills')->with('fail', 'Fail to fetch skills and expertise data.');
    }

    // View Add Skills & Expertise
    public function addskill() {
        $proficiencies = Proficiency::all();

        return view('alumni.editprofile-addskill', compact('proficiencies'));
    }

    // Save Skills & Expertise
    public function saveskill(Request $request) {
        $alumni = Alumni::findOrFail(Auth::user()->alumni->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/skills-and-expertise')->withErrors($validator)->withInput();

        $skill = new Skill($request->all());

        if($alumni->skills()->save($skill))
            return redirect('/a/profile/edit/skills-and-expertise')->with('success', 'Skills and Expertise saved!');
        else
            return redirect('/a/profile/edit/skills-and-expertise')->with('fail', 'Skills and Expertise is not save!');
    }

    // View Edit Skills & Expertise
    public function editskill($id) {
        $id = Crypt::decrypt($id);
        $skill = Skill::findOrFail($id);
        $proficiencies = Proficiency::all();
        return view('alumni.editprofile-editskills', compact(['skill', 'proficiencies']));
    }

    // Update Skills & Expertise
    public function updateskill(Request $request) {
        $id = Crypt::decrypt($request->id);
        $skill = Skill::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/skills-and-expertise/'.$request->id)->withErrors($validator)->withInput();

        if($skill->update($request->all()))
            return redirect('/a/profile/edit/skills-and-expertise')->with('success', 'Skills and Expertise updated!');
        else
            return redirect('/a/profile/edit/skills-and-expertise')->with('fail', 'Skills and Expertise is not update!');
    }

    // Delete Skills & Expertise
    public function deleteskill($id) {
        $id = Crypt::decrypt($id);
        $skill = Skill::findOrFail($id);

        if($skill->delete()) {
            $user = Auth::user();

            if(count($user->alumni->skills) > 0)
                return redirect('/a/profile/edit/skills-and-expertise')->with('success', 'Successful delete Skills and Expertise');
            else
                return redirect()->to(route('alumniprofile.view').'#skills')->with('success', 'Successful delete Skills and Expertise');
        }
        else
            return redirect('/a/profile/edit/skills-and-expertise')->with('fail', 'Error deleting Skills and Expertise');
    }

    // ----------------------------------- Language

    // View Language
    public function viewlang() {
        $user = Auth::user();

        $proficiencies = Proficiency::all();

        if(count($user->alumni->languages) > 0)
            return view('alumni.editprofile-viewlang', compact(['user', 'proficiencies']));
        else
            return redirect()->to(route('alumniprofile.view').'#language')->with('fail', 'Fail to fetch languages data.');
    }

    // View Add Language
    public function addlang() {
        $proficiencies = Proficiency::all();

        return view('alumni.editprofile-addlang', compact('proficiencies'));
    }

    // Save Language
    public function savelang(Request $request) {
        $alumni = Alumni::findOrFail(Auth::user()->alumni->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/language')->withErrors($validator)->withInput();

        $language = new Language($request->all());

        if($alumni->languages()->save($language))
            return redirect('/a/profile/edit/language')->with('success', 'Language saved!');
        else
            return redirect('/a/profile/edit/language')->with('fail', 'Language is not save!');
    }

    // View Edit Language
    public function editlang($id) {
        $id = Crypt::decrypt($id);
        $language = Language::findOrFail($id);
        $proficiencies = Proficiency::all();
        return view('alumni.editprofile-editlang', compact(['language', 'proficiencies']));
    }

    // Update Language
    public function updatelang(Request $request) {
        $id = Crypt::decrypt($request->id);
        $language = Language::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'proficiency' => 'required|string',
        ]);

        if($validator->fails())
            return redirect('/a/profile/edit/language/'.$request->id)->withErrors($validator)->withInput();

        if($language->update($request->all()))
            return redirect('/a/profile/edit/language')->with('success', 'Language updated!');
        else
            return redirect('/a/profile/edit/language')->with('fail', 'Language is not update!');
    }

    // Delete Language
    public function deletelang($id) {
        $id = Crypt::decrypt($id);
        $language = Language::findOrFail($id);

        if($language->delete()) {
            $user = Auth::user();

            if(count($user->alumni->languages) > 0)
                return redirect('/a/profile/edit/language')->with('success', 'Successful delete Language');
            else
                return redirect()->to(route('alumniprofile.view').'#language')->with('success', 'Successful delete Language');
        }
        else
            return redirect('/a/profile/edit/language')->with('fail', 'Error deleting Language');
    }

}
