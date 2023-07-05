$(document).ready(function () {
    setTimeout(function () {
        $('.success').fadeOut('slow');
    }, 2000); // <-- time in milliseconds
    $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": true,
        "searching": false,
        "ordering": false
    });
    $('#example1').on('click', 'tbody td', function () {
        if(redirect){
            window.location = $(this).closest('td').attr('redirect');
        }
       
    });

     function communication() {
        $.ajax({
            type: "GET",
            url: userComm,
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, row) {
                    var ndiv = '';
                    if (row['group_id'] == '1') {
                        ndiv = `<div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">` + row['fullname'] + `</span>
                                <span class="direct-chat-timestamp float-right">` + row['updateddate'] + `</span>
                            </div>
                            <img class="direct-chat-img" src="..\\img\\U.png" alt="Message User Image">
                            <div class="direct-chat-text">` + row['message'] + `</div>
                        </div>`;
                    } else {
                        ndiv = `<div class="direct-chat-msg left">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">` + row['fullname'] + `</span>
                            <span class="direct-chat-timestamp float-left">` + row['updateddate'] + `</span>
                        </div>
                        <img class="direct-chat-img" src="..\\img\\U.png" alt="Message User Image">
                        <div class="direct-chat-text">` + row['message'] + `</div>
                    </div>`;
                    }
                    $("#id_oldmsg").append(ndiv);
                });
            }
        });
    }
    communication();

        $('#add_comm').click(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formdata = new FormData($('#communiSubmit')[0]);

            var table_name = "vendor_temps";
            formdata.append('table_name', table_name);
            formdata.append('group_id', '2');


            $.ajax({
                type: "POST",
                url: userCommadd,
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == '1') {
                        $('#id_oldmsg').empty();
                        communication();

                        $('#communiSubmit')[0].reset();
                    } else {



                    }
                }
            });
        });
    // }
    // $('.row').attr('style','width:110vw;')
});