$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#summernote').summernote({
        tabsize: 2,
        width: 200,
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

    // Timeout fr the dialog message at bottom right to disappear in duration 4 seconds.
    $('#mdialog').fadeOut(10000);

    $('body').ready(function() {

        $.ajax({
            url: "/admin/graphoverallapplication",
            type: "post",
            success: function(response) 
            {
                console.log('inside graphoverallapplication success ajax');
                console.log(response);
                // initCharts(response);
                
                var data = {
                    // A labels array that can contain any sort of values
                    labels: ['New', 'SortList', 'Interview', 'KIV', 'Reject', 'Hired'],
                    
                    // Our series array that contains series objects or in this case series data arrays
                    series: [
                    [response[0], response[1], response[2], response[3], response[4], response[5]]
                    ],
                };

                new Chartist.Bar('#simpleBarChart', data, {
                    // Options for X-Axis
                    axisX: {
                        // Position where labels are placed. Can be set to `start` or `end` where `start` is equivalent to left or top on vertical axis and `end` is equivalent to right or bottom on horizontal axis.
                        // position: 'end',
                        // Allows you to correct label positioning on this axis by positive or negative x and y offset.
                        labelOffset: {
                          x: 30,
                          y: 0
                        },
                    }
                });
            },
            fail: function()
            {
                console.log('inside fail ajax');
            },
        });

        $.ajax({
            url: "/admin/graphhiredapplication",
            type: "post",
            success: function(response) 
            {
                console.log('inside graphhiredapplication success ajax');
                console.log(response);
                // initCharts(response);
                
                var data = {
                    // A labels array that can contain any sort of values
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    
                    // Our series array that contains series objects or in this case series data arrays
                    series: [
                    [response[0], response[1], response[2], response[3], response[4], response[5], response[6], response[7], response[8], response[9], response[10], response[11]]
                    ],
                };

                
                new Chartist.Line('#straightLinesChart', data);
            },
            fail: function()
            {
                console.log('inside fail ajax');
            },
        });
    });

    function initCharts(response) {
        var data = {
            // A labels array that can contain any sort of values
            labels: ['New', 'SortList', 'Interview', 'KIV', 'Reject', 'Hired'],
            
            // Our series array that contains series objects or in this case series data arrays
            series: [
            [response[0], response[1], response[2], response[3], response[4], response[5]]
            ],
        };
    	var data2 = {
    		labels: ['2005', '2006', '2007', '2008'],
    		series: [{
    			name: '10000',
    			data: [1000, 200, 500, 1000]
    		}, {
    			name: '13000',
    			data: [1200, 400, 300, 2000]
    		}]
    	};

    	var data3 = {
    		series: [934000, 1004000, 1500000]
    	};

    	var options = {
    		labelInterpolationFnc: function(value) {
    			return value[0]
    		}
    	};

    	var responsiveOptions = [
    	['screen and (min-width: 640px)', {
    		chartPadding: 30,
    		labelOffset: 100,
    		labelDirection: 'explode',
    		labelInterpolationFnc: function(value) {
    			return value;
    		}
    	}],
    	['screen and (min-width: 1024px)', {
    		labelOffset: 80,
    		chartPadding: 20
    	}]
    	];

    	// Create a new line chart object where as first parameter we pass in a selector
    	// that is resolving to our chart container element. The Second parameter
    	// is the actual data object.
    	new Chartist.Line('#roundedLineChart', data, {
    		low: 0,
    		showPoint: false,
    	});
    	new Chartist.Line('#straightLinesChart', data, {
    		lineSmooth: Chartist.Interpolation.cardinal({
    			tension: 0.2
    		})
    	});

    	new Chartist.Bar('#simpleBarChart', data, {
            // Options for X-Axis
            axisX: {
                // Position where labels are placed. Can be set to `start` or `end` where `start` is equivalent to left or top on vertical axis and `end` is equivalent to right or bottom on horizontal axis.
                // position: 'end',
                // Allows you to correct label positioning on this axis by positive or negative x and y offset.
                labelOffset: {
                  x: 30,
                  y: 0
                },
            }
        });

    	new Chartist.Line('#colouredRoundedLineChart', data);

    	new Chartist.Bar('#multipleBarsChart', data2);
    	
    	new Chartist.Pie('#chartPreferences', data3, options, responsiveOptions);






        dataColouredBarsChart = {
            labels: ['\'06', '\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
            series: [
                [287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944],
                [67, 152, 143, 287, 335, 435, 437, 539, 542, 544, 647],
                [23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509]
            ]
        };

        optionsColouredBarsChart = {
            lineSmooth: Chartist.Interpolation.cardinal({
                tension: 10
            }),
            axisY: {
                showGrid: true,
                offset: 40
            },
            axisX: {
                showGrid: false,
            },
            low: 0,
            high: 1000,
            showPoint: true,
            height: '300px'
        };


        new Chartist.Line('#colouredBarsChart', dataColouredBarsChart, optionsColouredBarsChart);



            // if ($('#roundedLineChart').length != 0 && $('#straightLinesChart').length != 0 && $('#colouredRoundedLineChart').length != 0 && $('#colouredBarsChart').length != 0 && $('#simpleBarChart').length != 0 && $('#multipleBarsChart').length != 0) {
            //     /* ----------==========    Rounded Line Chart initialization    ==========---------- */

            //     dataRoundedLineChart = {
            //         labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            //         series: [
            //             [12, 17, 7, 17, 23, 18, 38]
            //         ]
            //     };

            //     optionsRoundedLineChart = {
            //         lineSmooth: Chartist.Interpolation.cardinal({
            //             tension: 10
            //         }),
            //         axisX: {
            //             showGrid: false,
            //         },
            //         low: 0,
            //         high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            //         chartPadding: {
            //             top: 0,
            //             right: 0,
            //             bottom: 0,
            //             left: 0
            //         },
            //         showPoint: false
            //     }

            //     var RoundedLineChart = new Chartist.Line('#roundedLineChart', dataRoundedLineChart, optionsRoundedLineChart);

            //     md.startAnimationForLineChart(RoundedLineChart);


            //     /*  **************** Straight Lines Chart - single line with points ******************** */

            //     dataStraightLinesChart = {
            //         labels: ['\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
            //         series: [
            //             [10, 16, 8, 13, 20, 15, 20, 34, 30]
            //         ]
            //     };

            //     optionsStraightLinesChart = {
            //         lineSmooth: Chartist.Interpolation.cardinal({
            //             tension: 0
            //         }),
            //         low: 0,
            //         high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
            //         chartPadding: {
            //             top: 0,
            //             right: 0,
            //             bottom: 0,
            //             left: 0
            //         },
            //         classNames: {
            //             point: 'ct-point ct-white',
            //             line: 'ct-line ct-white'
            //         }
            //     }

            //     var straightLinesChart = new Chartist.Line('#straightLinesChart', dataStraightLinesChart, optionsStraightLinesChart);

            //     md.startAnimationForLineChart(straightLinesChart);


            //     /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */


            //     dataColouredRoundedLineChart = {
            //         labels: ['\'06', '\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
            //         series: [
            //             [287, 480, 290, 554, 690, 690, 500, 752, 650, 900, 944]
            //         ]
            //     };

            //     optionsColouredRoundedLineChart = {
            //         lineSmooth: Chartist.Interpolation.cardinal({
            //             tension: 10
            //         }),
            //         axisY: {
            //             showGrid: true,
            //             offset: 40
            //         },
            //         axisX: {
            //             showGrid: false,
            //         },
            //         low: 0,
            //         high: 1000,
            //         showPoint: true,
            //         height: '300px'
            //     };


            //     var colouredRoundedLineChart = new Chartist.Line('#colouredRoundedLineChart', dataColouredRoundedLineChart, optionsColouredRoundedLineChart);

            //     md.startAnimationForLineChart(colouredRoundedLineChart);


            //     /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */


            //     dataColouredBarsChart = {
            //         labels: ['\'06', '\'07', '\'08', '\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
            //         series: [
            //             [287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944],
            //             [67, 152, 143, 287, 335, 435, 437, 539, 542, 544, 647],
            //             [23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509]
            //         ]
            //     };

            //     optionsColouredBarsChart = {
            //         lineSmooth: Chartist.Interpolation.cardinal({
            //             tension: 10
            //         }),
            //         axisY: {
            //             showGrid: true,
            //             offset: 40
            //         },
            //         axisX: {
            //             showGrid: false,
            //         },
            //         low: 0,
            //         high: 1000,
            //         showPoint: true,
            //         height: '300px'
            //     };


            //     var colouredBarsChart = new Chartist.Line('#colouredBarsChart', dataColouredBarsChart, optionsColouredBarsChart);

            //     md.startAnimationForLineChart(colouredBarsChart);



            //     /*  **************** Public Preferences - Pie Chart ******************** */

            //     var dataPreferences = {
            //         labels: ['62%', '32%', '6%'],
            //         series: [62, 32, 6]
            //     };

            //     var optionsPreferences = {
            //         height: '230px'
            //     };

            //     Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

            //     /*  **************** Simple Bar Chart - barchart ******************** */

            //     var dataSimpleBarChart = {
            //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            //         series: [
            //             [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
            //         ]
            //     };

            //     var optionsSimpleBarChart = {
            //         seriesBarDistance: 10,
            //         axisX: {
            //             showGrid: false
            //         }
            //     };

            //     var responsiveOptionsSimpleBarChart = [
            //         ['screen and (max-width: 640px)', {
            //             seriesBarDistance: 5,
            //             axisX: {
            //                 labelInterpolationFnc: function(value) {
            //                     return value[0];
            //                 }
            //             }
            //         }]
            //     ];

            //     var simpleBarChart = Chartist.Bar('#simpleBarChart', dataSimpleBarChart, optionsSimpleBarChart, responsiveOptionsSimpleBarChart);

            //     //start animation for the Emails Subscription Chart
            //     md.startAnimationForBarChart(simpleBarChart);


            //     var dataMultipleBarsChart = {
            //         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            //         series: [
            //             [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
            //             [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
            //         ]
            //     };

            //     var optionsMultipleBarsChart = {
            //         seriesBarDistance: 10,
            //         axisX: {
            //             showGrid: false
            //         },
            //         height: '300px'
            //     };

            //     var responsiveOptionsMultipleBarsChart = [
            //         ['screen and (max-width: 640px)', {
            //             seriesBarDistance: 5,
            //             axisX: {
            //                 labelInterpolationFnc: function(value) {
            //                     return value[0];
            //                 }
            //             }
            //         }]
            //     ];

            //     var multipleBarsChart = Chartist.Bar('#multipleBarsChart', dataMultipleBarsChart, optionsMultipleBarsChart, responsiveOptionsMultipleBarsChart);

            //     //start animation for the Emails Subscription Chart
            //     md.startAnimationForBarChart(multipleBarsChart);
            // }

    };
});