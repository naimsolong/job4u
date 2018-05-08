@extends('layouts.masterpage_employer')

@section('title')
FAQS
@endsection

@section('content')
<div class="row justify-content-center">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#started-container">Start</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#post-container">Posting</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#apply-container">Applications</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#setting-container">Setting</a>
  </li>
</ul>
</div>
		
		<div id="started-container" class="row justify-content-center">
			<div class="title">Getting Started </div>
			<div class="message">Introductory steps to help get you started with Jobstore.</div>
			<div class="faq-container-left">

				<section class="faq-section">
					<input id="qstart1" type="checkbox">
					<label for="qstart1">How to create your free account?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>Creating an employer/recruiter account on Jobstore is free:</p>
					<p>1. Under the <strong>Employer</strong> section, click 'Create Account' to go to the sign up page.</p>
					<p>2. Be sure to fill up all the required fields on the page.</p>
					<p>3. Click the <strong>Continue</strong> button.</p>
					<p>Upon successfully signing up with Jobstore, you will be redirected to your dashboard.</p>
				</section>

				<section class="faq-section">
					<input id="qstart2" type="checkbox">
					<label for="qstart2">What should I expect after I post a job on Jobstore?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Once you've posted a job, it will be searchable by our entire member base. Applications will be sent to you via email and we encourage you to sign in to Jobstore to see the complete details. You will also be able to send interview invitations as well as update the status.
					</p>
					<p>In addition, your jobs will be posted to up to 20+ job sites within 24-72 hours.</p>
				</section>

				<section class="faq-section">
					<input id="qstart3" type="checkbox">
					<label for="qstart3">How does Jobstore work?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Jobstore is your primary job posting platform. Once you've posted your jobs on Jobstore, it will be automatically distributed
						to up to 20+ other job sites, classified ads websites and social networks.
					</p>
				</section>
			</div>

			<div class="faq-container-right">

				<section class="faq-section">
					<input id="qstart4" type="checkbox">
					<label for="qstart4">How many job boards will my jobs be distributed to?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Jobstore distributes jobs to <a href="https://www.jobstore.com/my/employer/job" target="_blank">up to 20+ of the most visited job boards, job sites	and social networks on the internet</a>. We are always adding more job boards and sources of jobseeker traffic to expand the audience for your job postings.
					</p>
				</section>

				<section class="faq-section">
					<input id="qstart5" type="checkbox">
					<label for="qstart5">How much do I have to pay to have my job featured?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						We currently offer 2 packages; Lite – the 5-job pack and Featured – the 10-job pack. For the 5-job package, the price is MYR 4,240 while the price for the 10-job package is MYR 8,480. These prices are inclusive of 6% Goods and Services Tax (GST).
					</p>
				</section>

				<section class="faq-section">
					<input id="qstart6" type="checkbox">
					<label for="qstart6">When will my job be activated?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>A new job posting will automatically appear on Jobstore.com</p>
					<p>
						For external job sites, it will usually take between <strong>24-72 hours</strong> for the jobs to appear.
						Furthermore, whenever you edit or update your active job post,
						it will take about 24-72 hours for your changes to be reflected on the external job boards.
						Likewise, if you terminate the job, it will also take 24-72 hours to be removed from the job boards.</p>
				</section>

			</div>
		</div>
		
		<div id="post-container" class="row" justify-content-center>

			<div class="title">Posting Jobs</div>
			<div class="message">Manage your jobs posting</div>

			<div class="faq-container-left">

				<section class="faq-section">
					<input id="qpost1" type="checkbox">
					<label for="qpost1">How many job boards will my jobs be distributed to?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Jobstore distributes jobs to <a href="https://www.jobstore.com/my/employer/job" target="_blank">up to 20+ of the most visited job boards,
						websites and social networks on the Internet</a>.
						We are always adding more job boards and sources of jobseeker traffic to expand the audience for your job postings.
					</p>
				</section>

				<section class="faq-section">
					<input id="qpost2" type="checkbox">
					<label for="qpost2">How long will it take for my job to show up on all job boards?</label>
					<br>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>A new job posting will automatically appear on Jobstore.com</p>
					<p>
						For external job sites, it will usually take up to <strong>24-72 hours</strong> for the jobs to appear.	Furthermore, when you edit or update your job post, it will take about 24-72 hours for your changes to be reflected on the external job boards.	Likewise, if you terminate the job, it will take another 24-72 hours for the job to be removed from the job boards.</p>
				</section>

				<section class="faq-section">
					<input id="qpost3" type="checkbox">
					<label for="qpost3">Do I have to pay extra fees for each job board?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						No. Once you've posted your jobs on Jobstore, you are not required to pay any extra fees to post your jobs to the majority of our job boards. We do offer optional posting to several paid job boards if you want to get even more distribution (like Monster, etc).
					</p>
				</section>

				<section class="faq-section">
					<input id="qpost4" type="checkbox">
					<label for="qpost4">Why do you recommend against including a phone number and/or email address in my job description?</label><br>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						By doing this, candidates may choose not to click our "Apply" button to submit their resume and/or interview answers. If they apply through our system you can view their resumes and interview answers online as well as collaborate on rating them with your colleagues. We will email you as soon as you get a new candidate so there is no need to include your phone or email address in the job description.
					</p>
				</section>

				<section class="faq-section">
					<input id="qpost5" type="checkbox">
					<label for="qpost5">Can I rename my job? How?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>Yes, you can rename your job. To rename a job, click the "Update" button under the job title in the Manage Jobs page and 
						then you can edit the job title.</p>
				</section>

				<section class="faq-section">
					<input id="qpost6" type="checkbox">
					<label for="qpost6">How do I terminate my job? </label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>To terminate a job, go to the "Active Jobs" section of the Manage Jobs page and then click the "Terminate" button underneath the job name.</p>
					<p>
						You will get a popup notice asking if you really want to terminate the job. This is to avoid accidental termination of any jobs as youcannot freely repost any terminated jobs.
					</p>
					<p>If you are sure you want to terminate the job post, click "OK".</p>
					<p>Your terminated post will then be removed from the "Active Jobs" page.To view or repost terminated job, please click to see the jobs in the "Terminated Jobs" tab.</p>
				</section>

				<section class="faq-section">
					<input id="qpost7" type="checkbox">
					<label for="qpost7">Is Jobstore planning on supporting any more <br>job boards?</label><br>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Yes, we are planning on adding more free job boards, as well as paid job boards. The goal is for you to manage all of your job postings in Jobstore	instead of creating and managing dozens of accounts across all of the available job sites. If you have a favourite job board you would like us to include, ,
						please <a href="https://www.jobstore.com/my/employer/contact" target="_blank">contact us</a> and let us know!</p>
				</section>

			</div>

			<div class="faq-container-right">

				<section class="faq-section">
					<input id="qpost8" type="checkbox">
					<label for="qpost8">Which social networks can Jobstore post to?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Facebook, LinkedIn, Twitter and Google+. We support posting to LinkedIn Groups and Facebook Pages in addition to profile posting.
						You can also connect your Twitter account to automatically tweet your jobs.
					</p>
				</section>

				<section class="faq-section">
					<input id="qpost10" type="checkbox">
					<label for="qpost10">What happens when I terminate a job? </label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						When you terminate a job, the job is removed from Jobstore's search result as in the job will no longer be open for candidates to apply to.	You will not lose any candidates already associated with the job and the job post will still be listed in the "Terminated Jobs" tab of your "Manage Jobs" page.	You can also reactivate or duplicate the terminated job post. Please go to your "Manage Jobs" page to learn more.
					</p>
					<p>Your terminated post will be removed from the 'Active Jobs' page. To view or repost terminated job, please click the 'Terminated Jobs' tab.</p>
				</section>

				<section class="faq-section">
					<input id="qpost11" type="checkbox">
					<label for="qpost11">Can I delete a job? </label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>No, you cannot delete a job, but you can terminate it to remove it from the search result.</p>
				</section>

				<section class="faq-section">
					<input id="qpost12" type="checkbox">
					<label for="qpost12">How do I post my ad anonymously/keep my company name private?</label> <br>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						The name of your company does not have to be displayed, you can have the company name listed as "<i>Confidential</i>".
					</p>
					<p>
						However, it is best to change the company name to something along the lines of your industry. For example <i>Software Company</i>, 
						<i>Leading Tech Company</i>, <i>IT Outsourcing Company</i> which would still explain the nature of your business, without disclosing your identity.
					</p>
					<p>
						Choosing to post as "Confidential" will also minimize the personalization of your job post; we will not display your company logo, job bannerand map of your company location in the Job Post page.
					</p>
				</section>

				<section class="faq-section">
					<input id="qpost13" type="checkbox">
					<label for="qpost13">How do I describe the job I am posting?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Think of your job description as an extensive advertisement for the position you're offering.
						Make sure that it is appealing, accurate, and detailed enough to interest the most qualified candidates.
						Here are some other suggestions:
					</p>
					<p>
					</p><ul>
						<li style="list-style-type:circle;">Use a standard title for the position to help qualified candidates find your posting during their job searches.</li>
						<li>Describe your company in a separate <em>Company Description / Benefits</em> section in the <strong>Job Description</strong> field.</li>
						<li>Include a list of key skills you would like the candidates to possess in a special <strong>Requirements</strong> section.</li>
						<li>Provide as many details as possible in all the other fields so that our matching technology can find the best candidates foryour posting.</li>
						<li>Be specific when describing the roles and responsibilities of the position.</li>
						<li>Outline any specific requirements (sometimes the best candidates may not match every single one).</li>
						<li>Provide a link to your company website. Describe your company if it's not well known.</li>
						<li>You can also list any benefits or special perks like flex time, or stock options.</li>
					</ul>
					<p></p>
				</section>

			</div>

		</div>
	
		<div id="apply-container" class="row" justify-content-center>
			<div class="title">Applications </div>
			<div class="message">Manage applications and candidates.</div>

			<div class="faq-container-left">

				<section class="faq-section">
					<input id="qapp1" type="checkbox">
					<label for="qapp1">Is there a limit on the number of candidates <br>I can receive?</label><br>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>No! Every package we offer allows an unlimited number of candidates.</p>
				</section>

				<section class="faq-section">
					<input id="qapp2" type="checkbox">
					<label for="qapp2">What if I don't get any candidates?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						It can take up to 48 hours to receive your first application. If you still haven't received any candidates after this time period,please make sure your phone number and/or email address are NOT in the job description. This is because many candidates will call	or email you directly rather than applying through the system.	We can distribute your job and provide the best advice we can bout writing quality job titles and descriptions, but we can't guarantee	you a certain number or quality of applicants.
					</p>
				</section>

				<section class="faq-section">
					<input id="qapp3" type="checkbox">
					<label for="qapp3">How are views and applications calculated?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>We track the number of visitors to your job pages hosted on Jobstore as well as the number of people who apply to your job.</p>
				</section>

			</div>


			<div class="faq-container-right">

				<section class="faq-section">
					<input id="qapp4" type="checkbox">
					<label for="qapp4">How can candidates contact me?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Candidates will not be contacting you directly unless you put your contact information in the job description.	When candidates apply to your job, we will send you a notificationemail with their information and their resume will be included as an attachment.
						All of their information will also be saved in your account for your reference
					</p>
					<p>Sign in to your Jobstore account and click on the title of your job and you will be able to see all the applicants.</p>
				</section>

				<section class="faq-section">
					<input id="qapp5" type="checkbox">
					<label for="qapp5">How do I attract more candidates?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						Your job will be listed as Featured on Jobstore. However, the performance of the job post is based on a lot of factors and varies
						depending on the industry as well as the location of the job. So please make sure you provide clear and detailed job descriptionsand titles.
					</p>
				</section>

				<section class="faq-section">
					<input id="qapp6" type="checkbox">
					<label for="qapp6">Why has my candidate flow slowed down?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						If you notice that your candidate flow has slowed down, it may be time to refresh your postings.
						Often, jobs that are 3-4 weeks old see less traffic in comparison to the first few weeks.
						We only allow you to post for 45 days, so you can refresh your postings after that.
					</p>
				</section>

				<section class="faq-section">
					<input id="qapp7" type="checkbox">
					<label for="qapp7">Can I add my own candidates?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						No, you cannot add your own candidates on Jobstore.
						<!-- But most of the Application Tracking System provide the feature, please contact your ATS provider for details.-->
					</p>
				</section>
			</div>

		</div>

		<div id="setting-container" class="row" justify-content-center>
			<div class="title">Account Setting </div>
			<div class="message">Configure settings like change password and company information.</div>

			<div class="faq-container-left">

				<section class="faq-section">
					<input id="qset1" type="checkbox">
					<label for="qset1">Why can't I sign in to my account?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						If you are having problems signing in to your account, just reset your password.
						If you still cannot sign in, or if you are facing other problems, please <a href="https://www.jobstore.com/my/employer/contact">send us a message</a> 
						and we will try to assist you as soon as possible.
					</p>
				</section>

				<section class="faq-section">
					<input id="qset2" type="checkbox">
					<label for="qset2">How do I change my credit card information?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>For safety purposes, we do not store your credit card information.
						You need to enter your credit card information every time you purchase a package.</p>
				</section>

			</div>

			<div class="faq-container-right">

				<section class="faq-section">
					<input id="qset3" type="checkbox">
					<label for="qset3">How do I change my password?</label>
					<h6>Last Reviewed: 03/08/2017</h6>
					<p>
						If you are signed in to your Jobstore account, go to the "Setting" page from your dashboard.
						Enter your new password and the password confirmation and click the save button at the bottom to submit.
					</p>
					<br>
					<p>
						If you are not signed in or if you are having problems and need to change your password, go to the "Sign In" page
						and click on the link that says "Forgot your password or can't access your account?".
					</p>
					<p>You will need to input your email address and once you submit, we will send you an email will a link to reset your password.</p>
					<p>Click on the link in the email and you will be redirected to the Reset Password page.</p>
					<p>
						Key in your <strong>new password</strong> and matching <strong>password confirmation</strong> and click the "Reset Password" button.
					</p>
					<p>
						Once successful, you will be immediately signed in to your Jobstore account. 
						Please use your new password the next time you sign in to Jobstore.
					</p>
				</section>

			</div>

		</div>

@endsection