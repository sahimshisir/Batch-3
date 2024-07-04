 $(document).ready(function(){
    //Slider Data Store
    $(document).ready(function() {
    $('#add_new_slider').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $("#loder").show();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(result) {
                $('#add_new_slider')[0].reset();
                $('#addslider').modal('hide');
                $("#loder").hide();
                $("#success").show();
                $('#slidercontainer').load(location.href + ' #slidercontainer', function() {
                    $("#success").hide(2500);
                    // Reinitialize any event listeners or plugins if needed
                });
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + xhr.responseText);
                $(".loader-div").hide();
            }
        });
    });
});

// Slider Data Update

$(document).ready(function() {
    $('.updateslider').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $("#loder").show();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(result) {
                $('.updateslider')[0].reset();
                $('.modal').modal('hide');
                $("#loder").hide();
                $("#success").show();
                $('#slidercontainer').load(location.href + ' #slidercontainer', function() {
                    $("#success").hide(2500);
                    // Reinitialize any event listeners or plugins if needed
                });
            },
            error: function(xhr, status, error) {
                alert("An error occurred: " + xhr.responseText);
                $(".loader-div").hide();
            }
        });
    });
});

 });
//   Slider Delete
 function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'destroy/'+id,
                type: 'get',
               
                success: function(response) {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.success,
                        icon: "success"
                    }).then(() => {
                        $('#slidercontainer').load(location.href + ' #slidercontainer') // Reload the page to see the changes
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong.",
                        icon: "error"
                    });
                }
            });
        }
    });
}
 