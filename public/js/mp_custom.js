$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	$('#summernote').summernote({
		placeholder: 'Edit About Me',
		tabsize: 2,
		height: 200,
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol']],
		    ['help', ['help']],
	    ],
	    callbacks: {
		    onKeydown: function(e) {
				var limitCharacters = 200;
				var characters = $(".note-editable").text();
				var totalCharacters = characters.length + 1;

				//Update value
				$("#total-characters").text(totalCharacters);

				//Check and Limit Charaters
				if(totalCharacters >= limitCharacters){
					return false;
				}		      
		    }
		}
	});


	$('#summernote-requirements').summernote({
		placeholder: 'Enter Job Requirements',
		tabsize: 2,
		height: 200,
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol']],
		    ['help', ['help']],
	    ]
	});
	// $('#summernote-requirements').summernote('code', '<ul><li>Experience in respective field.</li><li>Strong knowledge of respective field.</li><li>Familiarity with project development.</li><li>Ability to document requirements and specifications.</li><li>Possess at least a Bachelor\'s Degree in relevant field.</li></ul>');
	

	$('#summernote-responsibilities').summernote({
		placeholder: 'Enter Job Responsibilities',
		tabsize: 2,
		height: 200,
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol']],
		    ['help', ['help']],
	    ]
	});
	// $('#summernote-responsibilities').summernote('code', '</p><ul><li>Execute project development.</li><li>Create required documentation.</li><li>Develop backup plans and quality assurance procedures.</li><li>Deploy programs and evaluate user feedback.</li><li>Ensure project is updated with supervisor.</li></ul>');
	

	$('#summernote-benefits').summernote({
		placeholder: 'Enter Job Benefits',
		tabsize: 2,
		height: 200,
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol']],
		    ['help', ['help']],
	    ]
	});
	// $('#summernote-benefits').summernote('code', '<ul><li>Employee equity</li><li>Commission and bonus</li><li>Allowance (travel stipends, transportation, etc.)</li><li>Nearby public transport</li><li>Free snacks / Happy hours</li><li>Fitness membership</li></ul>');
	

	$('#summernote-descriptions').summernote({
		placeholder: 'Enter Job Descriptions',
		tabsize: 2,
		height: 200,
		toolbar: [
		    // [groupName, [list of button]]
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['para', ['ul', 'ol']],
		    ['help', ['help']],
	    ]
	});
	



	$('#carousel_event').carousel({
		interval: 1000
	});
	
	// Timeout fr the dialog message at bottom right to disappear in duration 4 seconds.
	$('#mdialog').fadeOut(10000);

	$('#table_job').DataTable({
		'order':[[1, 'asc']]
	});

	$('#table_candidate').DataTable({
		'order':[]
	});

	$('#table_interview').DataTable({
		'order':[]
	});

	$('#table_applications, #table_application, #table_pending, #table_interviews').DataTable({
		'order':[]
	});

	$('[data-toggle="tooltip"]').tooltip();

	// $('#pills-tab a').on('click', function (e) {
	// 	e.preventDefault();
	// 	$(this).tab('show');
	// });
	$("#closeJobTab").click(function(){ 
		window.close();
	});

	$('#selectJob').change(function() {
		var id = $('#selectJob').val();

		$.ajax({
			url: "/ajaxJob",
			type: "post",
			data: {id:id},
			// beforeSend: function() 
			// {
			// 	console.log('inside beforeSend ajax ' + id);
			// 	$("#loadingAjax").html('<div class="row"><div class="col-12" align="center">Loading data <img src="../img/loadings.gif"></div></div>');

			// 	$('#buttonAjax').hide();
			// },
			success: function(response) 
			{
				console.log('inside success ajax');
				$("#loadingAjax").html('');
				$('#jobView').html(response[0]);
				$('#totalApplication').html(response[1]);
				$('#newApplication').html(response[2]);
				$('#shortlistedApplication').html(response[3]);
				$('#interviewsApplication').html(response[4]);
				$('#kivApplication').html(response[5]);
				$('#rejectedApplication').html(response[6]);
				$('#hiredApplication').html(response[7]);

				if(response[8] != 0) {
					$('#buttonAjax').css('visibility', 'visible');
					$('#jobLink').attr('href', '/job/overview/'+response[8]);
				} else 
				$('#buttonAjax').css('visibility', 'hidden');
			},
			fail: function()
			{
				console.log('inside fail ajax');
				$("#loadingAjax").html('<div class="row"><div class="col-12" align="center">FAIL</div></div>');
				
				$('#buttonAjax').css('visibility', 'hidden');
			},
		});
	});
	
});