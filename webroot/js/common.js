$(function () {
    $("#product").change(function () {
        var productId = $(this).val();
        if (productId != "") {
            $.ajax({
                type: "get",
                url: baseUrl + "productsubcategories/getlist/" + productId,
                dataType: "json",
                beforeSend: function (xhr) {
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
            });
        }
    });


    $.ajax({
        url: "http://localhost/bsms/api/notification",
        method: "GET",
        dataType: "json",
        success: function (response) {
           
            if (response.notifications.length > 0) {
                $('.navbar-badge').text(response.notifications.length);

                $('.notification-list .notifyView').text(response.notifications.length + ' Notifications');
    
                $('.notification-lists').empty();
    
                $.each(response.notifications, function (index, notification) {
                    var notificationItem = $('<a href="#" class="dropdown-item"></a>');
    
                    var icon = $('<i class="fas fa-envelope text-info mr-2"></i>');
                    notificationItem.append(icon);

                    if(notification.notification_type == "asn_material"){

                        var message = $('<span></span>').text(notification.message_count + ' Asn Material');
                     
                    }else if(notification.notification_type == "create_schedule"){
                        var message = $('<span></span>').text(notification.message_count + ' Create Schedule');
                    
                    }else if(notification.notification_type == "po_acknowledge"){
                        var message = $('<span></span>').text(notification.message_count + ' PO Acknowledge');
                    }
                    notificationItem.append(message);
    
                    var divider = $('<div class="dropdown-divider"></div>');
    
                    $('.notification-lists').append(notificationItem, divider);
                });
            } else {      
                $('.navbar-badge').text('0');
                $('.notification-list').html('<span class="dropdown-header">No Notifications</span>');
                
            }
        },
        error: function (error) {
          
            console.error(error);
        }
    });
    
});
