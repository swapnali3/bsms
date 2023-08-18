$("#profileUpdate").validate({
    rules: {
        address1: { required: true, },
        contact_person: { required: true, },
        contact_mobiles: { required: true, },
        contact_email: { required: true, email: true, },
        contact_department: { required: true, },
        contact_designation: { required: true, },
    },
    messages: {
        address1: { required: "Please enter an address", },
        contact_person: { required: "Please enter a contact person", },
        contact_mobiles: { required: "Please enter a contact mobile", },
        contact_email: { required: "Please enter a contact email", email: "Please enter a valid email address", },
        contact_department: { required: "Please enter a contact department", },
        contact_designation: { required: "Please enter a contact designation", },
    },
    errorElement: "span",
    errorPlacement: function (error, element) { error.addClass("invalid-feedback"); element.closest(".form-group").append(error); },
    highlight: function (element, errorClass, validClass) { $(element).addClass("is-invalid"); },
    unhighlight: function (element, errorClass, validClass) { $(element).removeClass("is-invalid"); },
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#profileUpdate")[0].submit();
        return false;
    },
});

$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: vendorView + "/" + $("#vendor_id").val(),
        contentType: "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (resp) {
            if (resp.status == "1") {
                console.log(resp["message"]["name"]);
                $("#primaryDetailsName").text(resp.message[0]["name"]);
                $("#primaryDetailsMobileNo").text(resp.message[0]["mobile"]);
                $("#primaryDetailsEmailId").text(resp.message[0]["email"]);
                $("#primaryDetailsVendorCode").text(resp.message[0]["sap_vendor_code"]);
                $("#primaryDetailsStatus").text(resp.message[0]["status_name"]);
                $("#contactPersonName").text(resp.message[0]["contact_person"]);
                $("#contactPersonEmail").text(resp.message[0]["contact_email"]);
                $("#contactPersonMobile").text(resp.message[0]["contact_mobile"]);
                $("#contactPersonDepart").text(resp.message[0]["contact_department"]);
                $("#contactPersonDesig").text(resp.message[0]["contact_designation"]);
                $("#primaryDetailsAddress").text(resp.message[0]["address"]);
                $("#primaryDetailsAddress2").text(resp.message[0]["address_2"]);
                $("#primaryDetailsCity").text(resp.message[0]["city"]);
                $("#primaryDetailsState").text(resp.message[0]["state_name"]);
                $("#primaryDetailsCountry").text(resp.message[0]["country_name"]);
                $("#primaryDetailsPincode").text(resp.message[0]["pincode"]);
                $("#otherDetailsCompanyCode").text(resp.message[0]["company_code_name"]);
                $("#otherDetailsPurchaseOrga").text(resp.message[0]["purchasing_organization_name"]);
                $("#otherDetailsAccountGroup").text(resp.message[0]["account_group_name"]);
                $("#otherDetailsSchema").text(resp.message[0]["schema_group_name"]);
                $("#otherDetailsReconcili").text(resp.message[0]["reconciliation_account_name"]);
                $("#otherDetailsPaymentTemrs").text(resp.message[0]["payment_term_name"]);

                $.each(
                    resp.message[0].registered_office,
                    function (index, office) {
                        console.log(office.address);
                        $("#permanentAddress").text(office.address);
                        $("#permanentAddress1").text(office.address_2);
                        $("#permanentAddressCity").text(office.city);
                        $("#permanentAddressState").text(office.state);
                        $("#permanentAddressCountry").text(office.country);
                        $("#permanentAddressPincode").text(office.pincode);
                    }
                );

                $.each( resp.message[0].branch_office, function (index, val) {
                        var newRow = `<div class="col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <table class="table table-hover table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>Address</td>
                                                            <th>` +val.address +`</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Address 1</td>
                                                            <th>` + val.address_2 + `</th>
                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            <th>` + val.city + `</th>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <th>` +val.state_name +`</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <th>` + val.country + `</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Pincode</td>
                                                            <th>` + val.state + `</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>`;

                        $("#branchOffice").append(newRow);
                        $("#smallScaleYear").text(val.registration_year);
                        $("#smallScaleRegist").text(val.registration_no);
                        $("#smallScaleFile").attr("href",baseurl + val.registration_certificate).text(val.registration_certificate.split("/")[val.registration_certificate.split("/").length - 1]);
                    }
                );

                $.each(resp.message[0].facility, function (index, val) {
                    $("#laboratoryFile").attr("href",baseurl + val.lab_facility_file);
                    $("#isiRegistration").attr("href",baseurl + val.lab_facility_file);
                    $("#testFacility").attr("href",baseurl + val.lab_facility_file);
                    $("#facilitiesForSales").attr("href",baseurl + val.lab_facility_file);
                    $("#qualityControl").attr("href",baseurl + val.lab_facility_file);
                });

                $.each(resp.message[0].turnover, function (index, val) {
                    $("#turnover1").text(val.first_year_turnover);
                    $("#turnover2").text(val.second_year_turnover);
                    $("#turnover3").text(val.third_year_turnover);
                });

                $.each(resp.message[0].income_tax, function (index, val) {
                    $("#incomeTexCertificate").text(val.certificate_no);
                    $("#incomeTexCertificateDate").text(val.certificate_date);
                    $("#incomeTexCertificateDocu").attr("href",baseurl + val.certificate_file);
                });

                $.each(resp.message[0].factory, function (index, val) {
                    var factoryView = `<div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    Factory Code : <span id="factoryCode">` +
                                                    val.factory_code +
                                                    `</span>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <table class="table table-hover table-striped" id="commOfProduction"></table>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-hover table-striped">
                                                                        <tr>
                                                                            <td>Address</td>
                                                                            <th><span id="commAddress">` + val.address + `</span>
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Address 1</td>
                                                                            <th><span id="commAddress2">` + val.address_2 + `</span></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>City</td>
                                                                            <th><span id="commCity">` + val.city + `</span></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>State</td>
                                                                            <th><span id="commState">` + val.state_name + `</span></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Country</td>
                                                                            <th><span id="commCountry">` + val.country + `</span> </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pincode</td>
                                                                            <th><span id="commPincode">` + val.pincode + `</span> </th>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a class="btn btn-app btn-block" target="_blank" href="` + val.installed_capacity_file + `">
                                                                                <b>Installed Capcity</b><br> ` + val.installed_capacity + `
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a class="btn btn-app btn-block" target="_blank" href="` + val.power_available_file + `">
                                                                            <b>Power Available</b><br> ` + val.power_available + ` </a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a class="btn btn-app btn-block" target="_blank" href="` + val.raw_material_file + `">
                                                                                <b>Raw Material Avi. and Source</b><br>` + val.raw_material + ` </a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a class="btn btn-app btn-block" target="_blank" href="` + val.machinery_available_file + `">
                                                                                <b>Machinery Available</b><br> ` + val.machinery_available +` </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;

                    $("#factoryCodeView").append(factoryView);
                });

                var factoryMaterialList = `<thead>
                                            <tr>
                                                <th>Material</th>
                                                <th>Year Of Commencement Of Production</th>
                                                <th>` + resp.message[0].commencement[0].first_year + `</th>
                                                <th>` + resp.message[0].commencement[0].second_year + `</th>
                                                <th>` + resp.message[0].commencement[0].third_year + `</th>
                                            </tr>
                                        </thead><tbody>`;

                $.each(resp.message[0].commencement, function (index, val) {
                    factoryMaterialList += `<tr> <th>` + val.commencement_material + `</th>
                                            <td>` +val.commencement_year +`</td>
                                            <td>` +val.first_year_qty +`</td>
                                            <th>` +val.second_year_qty +`</th>
                                            <th>` +val.commencement_material +`</th>
                                            </tr>`;
                });

                $("#commOfProduction").append(factoryMaterialList + `</tbody>`);

                $.each(
                    resp.message[0].partner_address,
                    function (index, val) {
                        partenerView = `<div class="col-4">
                                            <div class="card">
                                                <div class="card-header">Partner : Jones Thayil</div>
                                                    <div class="card-body p-0">
                                                        <table class="table table-hover table-striped">
                                                            <tr>
                                                                <td>Address</td>
                                                                <th>` + val.address + `</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Address 1</td>
                                                                <th>` + val.address_2 + `</th>
                                                            </tr>
                                                            <tr>
                                                                <td>City</td>
                                                                <th>` + val.city + `</th>
                                                            </tr>
                                                            <tr>
                                                                <td>State</td>
                                                                <th>` + val.state_name + `</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Country</td>
                                                                <th>` + val.country + `</th>
                                                            </tr>
                                                            <tr>
                                                                <td>Pincode</td>
                                                                <th>` + val.pincode + `</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                        $("#contactPartner").append(partenerView);
                    }
                );

                $("#bankName").text(resp.message[0]["bank_name"]);
                $("#bankBranch").text(resp.message[0]["bank_branch"]);
                $("#bankNumber").text(resp.message[0]["bank_number"]);
                $("#bankIfsc").text(resp.message[0]["bank_ifsc"]);
                $("#bankKey").text(resp.message[0]["bank_key"]);
                $("#bankCountry").text(resp.message[0]["bank_country"]);
                $("#bankCity").text(resp.message[0]["bank_city"]);
                $("#bankCurrency").text(resp.message[0]["order_currency"]);
                $("#bankSwift").text(resp.message[0]["bank_swift"]);
                $("#bankTan").text(resp.message[0]["tan_no"]);
                $("#bankCin").text(resp.message[0]["cin_no"]);
                $("#gstNo").text(resp.message[0]["gst_no"]);
                $("#panNo").text(resp.message[0]["pan_no"]);

                $("#gstNoFile").attr( "href", baseurl + resp.message[0]["gst_file"] );
                $("#panNoFile").attr( "href", baseurl + resp.message[0]["pan_file"] );
                $("#cancelledCheque").attr( "href", baseurl + resp.message[0]["bank_file"] );
                $("#sixSigma").text( resp.message[0].other_details[0].six_sigma );
                $("#isoRegi").text(resp.message[0].other_details[0].iso);
                $("#sixSigmaFile").attr( "href", baseurl + resp.message[0].other_details[0].six_sigma_file );
                $("#isoRegiFile").attr( "href", baseurl + resp.message[0].other_details[0].iso_file );
                $("#hakaRegiFile").attr( "href", baseurl + resp.message[0].other_details[0].halal_file );
                $("#isoDecleration").attr( "href", baseurl + resp.message[0].other_details[0].declaration_file );
                $("#suppliersName").text( resp.message[0].other_details[0].suppliers_name );

                $.each( resp.message[0].questionnaire, function (index, val) {
                        otherDeatails = `<div class="col-12 mb-4">
                                            <h5 class="text-info">` + val.question + `</h5>
                                            <p><i>` + val.answer + `</i></p>
                                        </div>`;
                        $("#questionnaireAll").append(otherDeatails);
                    }
                );

                $.each(
                    resp.message[0].reputed_customer,
                    function (index, val) {
                        var reputedCustomer = `<div class="col-4">
                                                    <div class="card">
                                                        <div class="card-header">Customer ` +index +`</div>
                                                        <div class="card-body p-0">
                                                        <table class="table table-hover table-striped table-bordered">
                                                                <tr>
                                                                    <td>Customer Name</td>
                                                                    <th>` + val.customer_name + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <th>` + val.address + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pincode</td>
                                                                    <th>` + val.pincode + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>City</td>
                                                                    <th>` + val.city + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Country</td>
                                                                    <th>` + val.country + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>State</td>
                                                                    <th>` + val.state_name + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Telephone</td>
                                                                    <th>` + val.telephone + `</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Fax No.</td>
                                                                    <th>` + val.fax_no + `</th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>`;
                        $("#reputedCustomer").append(reputedCustomer);
                    }
                );
            }
        },
    });
});


