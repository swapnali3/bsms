$(function () {
    $("#product").change(function () {
        var productId = $(this).val();
        if (productId != "") {
            $.ajax({
                type: "get",
                url: baseUrl + "productsubcategories/getlist/" + productId,
                dataType: "json",
                beforeSend: function (xhr) {
                    $("#gif_loader").show();
                    xhr.setRequestHeader(
                        "Content-type",
                        "application/x-www-form-urlencoded"
                    );
                },
                success: function (response) {
                    if (response) {
                        $("#product_sub_category_id")
                            .find("option")
                            .remove()
                            .end()
                            .append('<option value="">Select</option>');
                        $.each(response, function (index, value) {
                            $("#product_sub_category_id").append(
                                '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name +
                                    "</option>"
                            );
                        });
                    }
                },
                error: function (e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                },
                complete: function () { $("#gif_loader").hide(); }
            });
        }
    });


    $.ajax({
        url: baseurl + "api/notification",
        method: "GET",
        dataType: "json",
        beforeSend: function () { $("#gif_loader").show(); },
        success: function (response) {
            if (response.notifications.length > 0) {
                $('.navbar-badge').text(response.notifications.length);

                $('.notification-list .notifyView').text(response.notifications.length + ' Notifications');
    
                $('.notification-lists').empty();
    
                $.each(response.notifications, function (index, notification) {
                    var notificationItem = $('<span class="dropdown-item notificationId"></span>');
    
                    var icon = $('<i class="fas fa-envelope text-info mr-2"></i>');

                    notificationItem.attr('data-id', notification.id);
                    notificationItem.append(icon);
                    var message = $('<span class="notificationTittle"></span>').text(notification.message_count + ' '+notification.notification_type);
                     message.attr('data-class', notification.notification_type);
                
                    var clearButton = $('<span class="clearNotifications float-right" style="color:#004d87">Clear</span>');
                    clearButton.attr('id', notification.id);
                    notificationItem.append(message);
                    notificationItem.append(clearButton);
        
                    var divider = $('<div class="dropdown-divider"></div>');  
                    $('.notification-lists').append(notificationItem, divider);
                });
            } else {      
                $('.navbar-badge').text('0');
                $('.notification-list').html('<span class="dropdown-header">No Notifications</span>');
                
            }
        },
        complete: function () { $("#gif_loader").hide(); },
        error: function (error) {
            console.log(error);
        }
    });
    
});


function preventEnterKey(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
    }
}
  
document.addEventListener('keydown', preventEnterKey);
  

// Always Active sidebar functionality start here

// document.addEventListener("DOMContentLoaded", function() {
//     // Check local storage for sidebar state and apply it
//     var sidebarState = localStorage.getItem("sidebarState");
//     var sidebar = document.querySelector(".main-sidebar");
    
//     if (sidebarState === "active") {
//         sidebar.classList.add("active");
//     } else {
//         sidebar.classList.remove("active");
//     }
// });


const fileInput = document.getElementById("bulk_file");
    const uploadButton = document.getElementById("OpenImgUpload");

    fileInput.addEventListener("change", function () {
        if (this.files.length > 0) {
            const fileName = this.files[0].name;
            uploadButton.innerText = `${fileName}`;
        } else {
            uploadButton.innerText = "Upload File";
            fileNameDisplay.innerText = "";
        }
});