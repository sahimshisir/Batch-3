
// $(document).ready(function () {
//     // Dashboard route
//     $("#dashboard").click(function (e) {
//         e.preventDefault();

//         var url = $(this).attr('href');

//         // Show loader
//         $(".loader-div").show();

//         // Make AJAX request
//         $.ajax({
//             url: url,
//             type: "GET",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 // Inject HTML response into #dynamic_data
//                 $("#dynamic_data").html(response);

//                 // Hide loader after content is loaded
//                 $(".loader-div").hide();

//                 // Change the URL without refreshing the page
//                 window.history.pushState(null, null, url);

//             },
//             error: function (xhr, status, error) {
//                 // Hide loader on error
//                 $(".loader-div").hide();

//                 // Log error to console
//                 console.log('AJAX error:', status, error);
//                 console.log('Response Text:', xhr.responseText);

//                 // Show alert with error message
//                 alert("An error occurred: " + xhr.statusText + " - " + xhr.responseText);
//             }
//         });
//     });

//     //    slider route
//     $("#Slider").click(function (e) {
//         e.preventDefault();

//         var url = $(this).attr('href');

//         // Show loader
//         $(".loader-div").show();

//         // Make AJAX request
//         $.ajax({
//             url: url,
//             type: "GET",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 // Inject HTML response into #dynamic_data
//                 $("#dynamic_data").html(response);
//                 // $('#Slider').load(location.href + ' #dynamic_data');
//                 $(".loader-div").hide();

//                 window.history.pushState(null, null, url);


//                 // Hide loader after content is loaded


//                 // Change the URL without refreshing the page

//             },
//             error: function (xhr, status, error) {
//                 // Hide loader on error
//                 $(".loader-div").hide();

//                 // Log error to console
//                 console.log('AJAX error:', status, error);
//                 console.log('Response Text:', xhr.responseText);

//                 // Show alert with error message
//                 alert("An error occurred: " + xhr.statusText + " - " + xhr.responseText);
//             }
//         });
//     });

//     $("#Slider2").click(function (e) {
//         e.preventDefault();

//         var url = $(this).attr('href');

//         // Show loader
//         $(".loader-div").show();

//         // Make AJAX request
//         $.ajax({
//             url: url,
//             type: "GET",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (response) {
//                 // Inject HTML response into #dynamic_data
//                 $("#dynamic_data").html(response);

//                 // Hide loader after content is loaded
//                 $(".loader-div").hide();

//                 // Change the URL without refreshing the page
//                 window.history.pushState(null, null, url);

//             },
//             error: function (xhr, status, error) {
//                 // Hide loader on error
//                 $(".loader-div").hide();

//                 // Log error to console
//                 console.log('AJAX error:', status, error);
//                 console.log('Response Text:', xhr.responseText);

//                 // Show alert with error message
//                 alert("An error occurred: " + xhr.statusText + " - " + xhr.responseText);
//             }
//         });
//     });
// });
