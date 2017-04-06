/**
 * Created by LINH NGUYEN on 12/12/2016.
 */
$(document).ready(function () {
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('#fileinput_remove_a').click(function () {
        $(this).parents('.file-preview').remove();
    });
    $("body").on("click", ".btn-file", function () {
        $(this).parents(".form-group").find(".file-preview-edit").hide();
    });

    $(".click-add-item").on('click', function () {
        var data = JSON.parse($(this).attr("data-value"));
        var items = "<div class='item-mul'>";
        $.each(data, function (i, item) {
            const cus_value = item.value !== undefined ? item.value : "";
            if (item.selector == 'img') {
                items += '<div class="box-image"><a onclick="uploadMulti(this)" >';
                items += "<" + item.selector + " src='" + IMG_UPLOAD + "' name='" + item.name + "' class='img-responsive' id='show_img_mul' />";
                items += '<input type="hidden" name="' + item.name + '" value="" class="input-file hidden"></a>';
                items += '</div>';
            } else {
                items += "<" + item.selector + " type='" + item.type + "' value='" + cus_value + "'  name='" + item.name + "' class='form-control' placeholder='" + item.placeholder + "' />";
            }
        });
        items += '<a  class="remove-image remove-image-mul" onclick="removeItem(this)"><span>&nbsp;</span></a>';
        items += "</div>";
        $(this).after(items);
    });

});

function loadDataImg(object) {
    var data = JSON.parse($("#load_data_img").attr("data-value"));
    var items = "";
    if (object != "") {
        $.each(JSON.parse(object), function (key, values) {
            if (values.type == "img") {
                items += "<div class='item-mul'>";
                $.each(data, function (i, item) {
                    const cus_value = item.value !== undefined ? item.value : values.key;
                    if (item.selector == 'img') {
                        items += '<div class="box-image"><a onclick="uploadMulti(this)" >';
                        items += "<" + item.selector + " src='" + values.value + "' name='" + item.name + "' class='img-responsive' id='show_img_mul' />";
                        items += '<input type="hidden" name="' + item.name + '" value="' + values.value + '" class="input-file hidden"></a>';
                        items += '</div>';
                    } else {
                        items += "<" + item.selector + " type='" + item.type + "' value='" + cus_value + "'  name='" + item.name + "' class='form-control' placeholder='" + item.placeholder + "' />";
                    }
                });
                items += '<a  class="remove-image remove-image-mul" onclick="removeItem(this)"><span>&nbsp;</span></a>';
                items += "</div>";
            }
        });
    }
    $("#load_data_img").after(items);
}
function loadDataText(object) {
    var data = JSON.parse($("#load_data_text").attr("data-value"));
    var items = "";
    if (object != "") {
        $.each(JSON.parse(object), function (key, values) {
            if (values.type == "text") {
                items += "<div class='item-mul'>";
                $.each(data, function (i, item) {
                    const cus_value = item.value !== undefined ? item.value : values.key;
                    if (item.selector == 'img') {
                        items += '<div class="box-image"><a onclick="uploadMulti(this)" >';
                        items += "<" + item.selector + " src='" + values.value + "' name='" + item.name + "' class='img-responsive' id='show_img_mul' />";
                        items += '<input type="hidden" name="' + item.name + '" value="' + values.value + '" class="input-file hidden"></a>';
                        items += '</div>';
                    } else {
                        if (item.name == "meta_value[]") {
                            items += "<" + item.selector + " type='" + item.type + "' value='" + values.value + "'  name='" + item.name + "' class='form-control' placeholder='" + item.placeholder + "' />";
                        } else {
                            items += "<" + item.selector + " type='" + item.type + "' value='" + cus_value + "'  name='" + item.name + "' class='form-control' placeholder='" + item.placeholder + "' />";
                        }

                    }
                });
                items += '<a  class="remove-image remove-image-mul" onclick="removeItem(this)"><span>&nbsp;</span></a>';
                items += "</div>";
            }
        });
    }
    $("#load_data_text").after(items);
}
function confirmDelete(url) {
    var r = confirm("Do you want to delete this record");
    if (r == true) {
        window.location.href = url;
    }
}
function uploadMulti(_) {
    var finder = new CKFinder();
    finder.selectActionFunction = function (fileUrl) {
        $(_).find('.input-file').val(fileUrl);
        $(_).find('img').attr('src', fileUrl);
    };
    finder.popup();
}


function callAjaxGet(url) {
    $.ajax({
        type: "get",
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#box_conent_modal").html(data.html);
            $("#" + data.element).modal('show');
        }
    });
}
function removeItem(_) {
    $(_).parent().remove();
}
