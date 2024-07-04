$(document).ready(function(){
    //teacher Data Store
    $(document).ready(function() {
    $('#add_new_teacher').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $("#loder").show();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#add_new_teacher')[0].reset();
                $('#addteacher').modal('hide');
                $("#loder").hide();
                $("#success").show();
                $('#teachercontainer').load(location.href + ' #teachercontainer', function() {
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

// Teacher Data Update

$(document).ready(function() {
    $('.updateteacher').on('submit', function(e) {
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
                $('.updateteacher')[0].reset();
                $('.modal').modal('hide');
                $("#loder").hide();
                $("#success").show();
                $('#teachercontainer').load(location.href + ' #teachercontainer', function() {
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

//   Teacher Delete
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
                        $('#teachercontainer').load(location.href + ' #teachercontainer') // Reload the page to see the changes
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