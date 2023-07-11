$.ajax({
  type: "GET",
  url: geturl,
  contentType: "application/x-www-form-urlencoded; charset=utf-8",
  dataType: "json",
  async: false,
  success: function (resp) {
    var data = resp.data;
    if (data.length > 0) {
      $("#id_vendorMaterialList").empty();
      $.each(resp.data, function (index, row) {
        $("#id_vendorMaterialList").append(`
          <tr>
          <td class="p-3">`+ row['description'] + `</td>
          <td class="p-3">`+ row['minimum_stock'] + `</td>
          <td class="p-3">`+ row['uom'] + `</td>
          <td class="p-3">`+ row['vendor_material_code'] + `</td>
          <td class="p-2"><input type="text" class="form-control form-control-sm" data-id="`+ row['id'] + `" id="id_` + row['id'] + `"></td>
          <td class="p-2"><button type="button" class="btn btn-outline-info approvemat" data-id="`+ row['id'] + `" data-toggle="tooltip" data-placement="right" title="Approve Material"><i class="fas fa-check"></i></button></td>
          </tr>
          `);
      });
    }
  },
});

$(document).on("click", ".approvemat", function () {
  var id = $(this).data('id');
  var buyerMaterialCode = $("#id_" + id).val();
  if (buyerMaterialCode != "" || buyerMaterialCode != null || buyerMaterialCode != undefined) {
    $.ajax({
      type: "GET",
      url: posturl + "/" + id + "/" + buyerMaterialCode,
      contentType: "application/x-www-form-urlencoded; charset=utf-8",
      dataType: "json",
      async: false,
      success: function (resp) {
        console.log(resp);
      },
    });
  }
});
