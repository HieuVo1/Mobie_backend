"use strict"
if ($("#totalrow").val() != 0) {
    for (var i = 1; i <= parseInt($("#totalrow").val()); i++) {
        var val = $("#att_type" + i).val();
        getattributevalueslist(val, i);


    }
}
$(function() {
    $("#sortable tbody").sortable({
        cursor: "move",
        placeholder: "sortable-placeholder",
        helper: function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width());
            });
            return $helper;
        }
    }).disableSelection();
});


function getsubcategory(val) {
    $('#subcategory').empty();
    $.ajax({
        url: $("#url_path").val() + "/admin/getsubcategory" + "/" + val,
        data: {},
        success: function(data) {
            var elm = document.getElementById("subcategory"),
                df = document.createDocumentFragment();
            var stringify = JSON.parse(data);
            for (var i = 0; i < stringify.length; i++) {
                var option = document.createElement('option');
                option.value = stringify[i]["id"];
                var name = stringify[i]["name"];
                option.appendChild(document.createTextNode(name));
                df.appendChild(option);
            }
            elm.appendChild(df);
            getbrand(stringify[0]["id"]);
        }
    });
}

function getbrand(val) {
    $('#brand').empty();
    $.ajax({
        url: $("#url_path").val() + "/admin/getbrandbyid" + "/" + val,
        data: {},
        success: function(data) {
            var elm = document.getElementById("brand"),
                df = document.createDocumentFragment();
            var stringify = JSON.parse(data);
            for (var i = 0; i < stringify.length; i++) {
                var option = document.createElement('option');
                option.value = stringify[i]["id"];
                var name = stringify[i]["brand_name"];
                option.appendChild(document.createTextNode(name));
                df.appendChild(option);
            }
            elm.appendChild(df);
        }
    });
}

function addrow() {
    var lastrow = $("#totalrow").val();
    var product = $("#product_id").val();
    var newrow = parseInt(lastrow) + 1;
    var ddl = $("#typedrop").html();
    $.ajax({
        url: $("#url_path").val() + "/admin/getattributedata",
        data: { product: product },
        success: function(data) {
            var stringify = JSON.parse(data);
            var ddl = '<select name="dataattribute[]" id="att_type' + newrow + '" class="form-control" onchange="getattributevalueslist(this.value,' + newrow + ')" required><option value="">' + $("#msgtype").val() + '</option>';
            for (var i = 0; i < stringify.length; i++) {
                ddl = ddl + '<optgroup label="' + stringify[i]["name"] + '">';
                var fe = stringify[i]["attributelist"];
                for (var j = 0; j < fe.length; j++) {
                    ddl = ddl + '<option value="' + fe[j]["id"] + '">' + fe[j]["name"] + '</option>';
                }
            }
            ddl = ddl + '</select>';
            var txt = '<tr id="row' + newrow + '"><td><i class="ti-layout-grid4-alt"></i></td><td id="select' + newrow + '"><div id="container' + newrow + '">' + ddl + '</div></td><td data-id="' + newrow + '" style="width: 50%"><input type="text" id="input-tags' + newrow + '" name="att_values[]" ></td><td><button onclick="removerow(' + newrow + ')" class="btn btn-danger"><i class="fa fa-trash f-s-25"></i></button></td></tr>';

            $('#lstable').append(txt);
            $("#totalrow").val(newrow);
        }
    });

}

function getattributevalueslist(val, valid) {

    var element = jQuery("#input-tags" + valid);
    $.ajax({
        url: $("#url_path").val() + "/admin/getattibutevalue" + "/" + val,
        data: {},
        success: function(data) {
            var stringify = JSON.parse(data);
            console.log(data);
            $("#input-tags" + valid).selectize()[0].selectize.destroy();
            var $select = $("#input-tags" + valid).selectize({
                plugins: ['remove_button'],
                persist: false,
                maxItems: null,
                valueField: 'id',
                labelField: 'values',
                searchField: ['values'],
                options: stringify,
                render: {
                    item: function(item, escape) {
                        return '<div>' +
                            (item.values ? '<span class="name">' + escape(item.values) + '</span>' : '') +
                            '</div>';
                    },
                    option: function(item, escape) {
                        var label = item.values || item.id;
                        return '<div>' +
                            '<span class="label">' + escape(label) + '</span>' +
                            '</div>';
                    }
                },

                createFilter: function(input) {
                    var match, regex;

                    // email@address.com
                    regex = new RegExp('^' + REGEX_EMAIL + '$', 'i');
                    match = input.match(regex);
                    if (match) return !this.options.hasOwnProperty(match[0]);

                    // name <email@address.com>
                    regex = new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i');
                    match = input.match(regex);
                    if (match) return !this.options.hasOwnProperty(match[2]);

                    return false;
                },

            });

        }
    });

    $('#select-state').selectize({
        load: function(query, callback) {
            this.clearOptions();
            //fetch the new options
        }
    });
}

function removerow(val) {
    $('#row' + val).remove();
}
$(document).ready(function() {
    $('#upload_image').on('change', function(e) {
        readURL(this, "basic_img");
    });
});

function readURL(input, field) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#' + field).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function readaddURL(input, field) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#additional_img' + field).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#add_image').on('change', function(e) {
        var add_total_img = $("#add_total_img").val();
        var txt = '<div id="imgid' + add_total_img + '" class="add-img"><img class="img-thumbnail" id="additional_img' + add_total_img + '" name="arrimg[]" style="width: 150px;height: 150px;" /><div class="add-box"><input type="button" id="removeImage1" value="x" class="btn-rmv1" onclick="removeimg(' + add_total_img + ')"/></div></div>';
        $("#additional_image").append(txt);
        readaddURL(this, add_total_img);
        var newtotal = parseInt(add_total_img) + 1;
        $("#add_total_img").val(newtotal);
    });
});


function removeimg(val) {
    $("#imgid" + val).remove();
}
$(document).ready(function() {
    var related_cat = 0;
    var product_id = $("#product_id").val();
    related_cat = $("#subcategory").val();
    if (related_cat == "") {
        related_cat = 0;
    }

    var rel_pro = $("#rel_pro").val();
    var strCopy = rel_pro.split(",");
    if (product_id != 0) {
        $("#related_product").dataTable().fnDestroy()
    }
    var example = $('#related_product').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/admin/productlist' + '/' + related_cat + '/' + product_id,
        columns: [{
            data: 'id',
            name: 'id',
        }, {
            data: 'thumbnail',
            name: 'thumbnail'
        }, {
            data: 'name',
            name: 'name'
        }, {
            data: 'price',
            name: 'price'
        }, ],
        columnDefs: [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function(data, type, full, meta) {
                    if (strCopy.indexOf(data) == 0 || strCopy.indexOf(data) == 1) {
                        return '<input type="checkbox" class="checkbox" checked name="related_id[]" value="' + $('<div/>').text(data).html() + '">';
                    } else {
                        return '<input type="checkbox" class="checkbox" name="related_id[]" value="' + $('<div/>').text(data).html() + '">';
                    }


                }
            },
            {
                targets: 1,
                render: function(data) {
                    return '<img src="' + data + '" style="height:50px">';
                }
            }
        ],
        order: [1, 'asc']
    });

});

function allselect(val) {
    if ($('#select-all').prop('checked') == true) {
        $("input[name='related_id[]']").prop('checked', true);
    } else {
        $("input[name='related_id[]']").prop('checked', false);
    }
}




$(document).ready(function() {
    $('#review_product').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/admin/reviewdatatable' + "/" + $("#product_id").val(),
        columns: [{
            data: 'id',
            name: 'id'
        }, {
            data: 'pro_name',
            name: 'pro_name'
        }, {
            data: 'rev_name',
            name: 'rev_name'
        }, {
            data: 'rating',
            name: 'rating'
        }, {
            data: 'review',
            name: 'review'
        }, {
            data: 'action',
            name: 'action'
        }],
    });
});
$(function() {

    $('#spe_pri_start, #spe_pri_to').datepicker({
        showOn: "both",
        beforeShow: customRange,
        dateFormat: "M dd,yy",
    });

});

function customRange(input) {

    if (input.id == 'spe_pri_to') {
        var minDate = new Date($('#spe_pri_start').val());
        minDate.setDate(minDate.getDate() + 1)

        return {
            minDate: minDate

        };
    }

    return {}

}
$(function() {

    $('#new_pri_start, #new_pri_to').datepicker({
        showOn: "both",
        beforeShow: customRangenew,
        dateFormat: "M dd,yy",
    });

});

function customRangenew(input) {

    if (input.id == 'new_pri_to') {
        var minDate = new Date($('#new_pri_start').val());
        minDate.setDate(minDate.getDate() + 1)

        return {
            minDate: minDate

        };
    }

    return {}

}

function Savegeneralinfo() {
    $("#overlaychk").fadeIn(300);　
    var color = $("#colorpro").val();
    var name = $("#pro_name").val();
    var description = CKEDITOR.instances['description'].getData();
    var category = $("#catelogcategory").val();
    var subcategory = $("#subcategory").val();
    var brand = $("#brand").val();
    var texable = $("#texable").val();
    var colorname = $("#colorname").val();
    var keywords = $("#metakeyword").val();
    var status = 0;
    if (document.getElementById("status").checked == true) {
        status = 1;
    }
    var product_id = $("#product_id").val();
    if (name != "" && description != "" && category != "" && subcategory != "" && brand != "" && texable != "" && colorname != "" && color != "") {
        if (product_id == 0) {
            $.ajax({
                url: $("#url_path").val() + "/admin/saveproduct",
                method: "post",
                data: { keywords: keywords, name: name, desc: description, category: category, subcategory: subcategory, brand: brand, texable: texable, status: status, color: color, colorname: colorname },
                success: function(data) {
                    console.log(data)
                    $("#product_id").val(data);
                    $("#custom-nav-general").removeClass('in show active');
                    $('a[href="#custom-nav-general"]').removeClass('active');
                    $('a[href="#custom-nav-price"]').addClass('active');
                    $("#custom-nav-price").addClass('in show active');
                }
            });
        } else {
            if (product_id != 0) {
                $.ajax({
                    url: $("#url_path").val() + "/admin/updateproduct",
                    method: "post",
                    data: { keywords: keywords, id: product_id, name: name, desc: description, category: category, subcategory: subcategory, brand: brand, texable: texable, status: status, color: color, colorname: colorname },
                    success: function(data) {
                        $("#product_id").val(data);
                        $("#custom-nav-general").removeClass('in show active');
                        $('a[href="#custom-nav-general"]').removeClass('active');
                        $('a[href="#custom-nav-price"]').addClass('active');
                        $("#custom-nav-price").addClass('in show active');

                    }
                });
            }
            $("#custom-nav-general").removeClass('in show active');
            $('a[href="#custom-nav-general"]').removeClass('active');
            $('a[href="#custom-nav-price"]').addClass('active');
            $("#custom-nav-price").addClass('in show active');
        }
    } else {
        alert($("#requiredfields").val());
    }
    $("#overlaychk").fadeOut(1000);
}

function saveproductprice() {
    $("#overlaychk").fadeIn(300);　
    var pro_price = $("#price").val();
    var special_price = $("#special_price").val();
    var spe_price_start = $("#spe_pri_start").val();
    var spe_price_to = $("#spe_pri_to").val();
    var product_id = $("#product_id").val();
    var mrp = $("#mrp").val();
    if (product_id == "" || product_id == 0) {
        alert($("#generalmsg").val());
    } else {
        if (mrp != "" && pro_price != "") {

            if (special_price != "") {
                if (spe_price_start != "" && spe_price_to != "") {

                    if (parseInt(special_price) > parseInt(mrp) && parseInt(mrp) < parseInt(pro_price)) {
                        alert($("#check_price").val());
                        $("#special_price").val("");
                    } else {
                        if (parseInt(special_price) > parseInt(pro_price)) {
                            // alert("sepical_price"+special_price+"  price "+pro_price);
                            alert($("#special_price_check").val());
                            $("#special_price").val("");
                        } else {
                            $.ajax({
                                url: $("#url_path").val() + "/admin/saveprice",
                                method: "post",
                                data: {
                                    id: product_id,
                                    mrp: mrp,
                                    price: pro_price,
                                    special_price: special_price,
                                    spe_price_start: spe_price_start,
                                    spe_price_to: spe_price_to
                                },
                                success: function(data) {
                                    console.log(data);
                                    $("#product_id").val(data);
                                    $("#custom-nav-price").removeClass('in show active');
                                    $('a[href="#custom-nav-price"]').removeClass('active');
                                    $('a[href="#custom-nav-inventory"]').addClass('active');
                                    $("#custom-nav-inventory").addClass('in show active');

                                }
                            });
                        }


                    }

                } else {

                    $("#special_price").val();
                    alert($("#sepical_price_vaildate").val());
                }
            } else {

                if (parseInt(mrp) < parseInt(pro_price)) {
                    console.log(pro_price);
                    $("#price").val("");
                    $("#mrp").val("");
                    alert($("#selling_mrp_vaildate").val());
                } else {
                    $.ajax({
                        url: $("#url_path").val() + "/admin/saveprice",
                        method: "post",
                        data: {
                            id: product_id,
                            price: pro_price,
                            mrp: mrp,
                            special_price: special_price,
                            spe_price_start: spe_price_start,
                            spe_price_to: spe_price_to
                        },
                        success: function(data) {
                            console.log(data);
                            $("#product_id").val(data);
                            $("#custom-nav-price").removeClass('in show active');
                            $('a[href="#custom-nav-price"]').removeClass('active');
                            $('a[href="#custom-nav-inventory"]').addClass('active');
                            $("#custom-nav-inventory").addClass('in show active');

                        }
                    });
                }
            }
        } else {

            alert($("#requiredfields").val());
        }
    }
    $("#overlaychk").fadeOut(1000);
}

function SaveInventory() {
    $("#overlaychk").fadeIn(300);　
    var product_id = $("#product_id").val();
    var sku = $("#sku").val();
    var inventory = $("#inventory").val();
    var stock = $("#stock").val();
    if (product_id == "" || product_id == 0) {

        alert($("#generalmsg").val());
    } else {
        $.ajax({
            url: $("#url_path").val() + "/admin/saveinventory",
            method: "post",
            data: {
                id: product_id,
                sku: sku,
                inventory: inventory,
                stock: stock
            },
            success: function(data) {
                if (data == 0) {
                    alert($("#sku_already").val());
                } else {
                    console.log(data);
                    $("#product_id").val(data);
                    $("#custom-nav-inventory").removeClass('in show active');
                    $('a[href="#custom-nav-inventory"]').removeClass('active');
                    $('a[href="#custom-nav-imgls"]').addClass('active');
                    $("#custom-nav-imgls").addClass('in show active');
                }


            }
        });
    }
    $("#overlaychk").fadeOut(1000);
}

function saveimages() {
    $("#overlaychk").fadeIn(300);　
    var product_id = $("#product_id").val();
    var basic_img = $("#basic_img").attr('src');
    var additional_img = $("#additional_image img").map(function() {
        return $(this).attr("src");
    }).get();

    var strimg = additional_img.toString("%");
    if (product_id == "" || product_id == 0) {
        alert($("#generalmsg").val());
    } else {
        $.ajax({
            url: $("#url_path").val() + "/admin/saveproductimage",
            method: "post",
            data: {
                id: product_id,
                basic_img: basic_img,
                additional_img: additional_img
            },
            success: function(data) {
                $("#custom-nav-imgls").removeClass('in show active');
                $('a[href="#custom-nav-imgls"]').removeClass('active');
                $('a[href="#custom-nav-attribute"]').addClass('active');
                $("#custom-nav-attribute").addClass('in show active');

            }
        });
    }
    $("#overlaychk").fadeOut(1000);
}


function saveattibute() {
    $("#overlaychk").fadeIn(300);　
    var product_id = $("#product_id").val();
    console.log(product_id);
    var attibute_value = $("input[name='att_values[]']").map(function() { return $(this).val(); }).get();
    var totalrow = $("#totalrow").val();
    var name = new Array();
    for (var i = 0; i <= totalrow; i++) {
        var index = parseInt(i) + 1;
        if ($('#att_type' + index).length) {
            name.push($('#att_type' + index).val());
        }
    }
    var name = name.join(",");
    var values = attibute_value.join("@");
    if (product_id == "" && product_id != 0) {
        alert($("#generalmsg").val());
    } else {
        $.ajax({
            url: $("#url_path").val() + "/admin/saveproductattibute",
            method: "post",
            data: {
                id: product_id,
                name: name,
                values: values
            },
            success: function(data) {
                $("#product_id").val(data);
                $("#custom-nav-attribute").removeClass('in show active');
                $('a[href="#custom-nav-attribute"]').removeClass('active');
                $('a[href="#custom-nav-option"]').addClass('active');
                $("#custom-nav-option").addClass('in show active');

            }
        });
    }
    $("#overlaychk").fadeOut(1000);

}

function SaveRelatedproduct() {
    var product_id = $("#product_id").val();
    if (product_id == "" || product_id == 0) {
        alert($("#generalmsg").val());
    } else {
        var optiontype = [];
        $(" input[name='related_id[]']:checked").each(function() { optiontype.push($(this).val()); });
        var type = optiontype.join(",");
        $.ajax({
            url: $("#url_path").val() + "/admin/saverelatedproduct",
            method: "post",
            data: {
                id: product_id,
                type: type
            },
            success: function(data) {
                $("#product_id").val(data);
                alert($("#data_save_success").val());
                window.location.href = $("#url_path").val() + "/admin/product";
            }
        });
    }
}


var util = UIkit.util;

util.ready(function() {

    util.on(document.body, 'start moved added removed stop', function(e, sortable, el) {
        console.log(e.type, sortable, el);
    });

});

function addnewoptionvalue(opval) {
    var lastrow = $("#total_option" + opval).val();
    var nextrow = parseInt(lastrow) + 1;
    var txt = '<div class="questions-row" id="row_' + opval + '_' + nextrow + '"><div class="uk-grid-small uk-margin-small-bottom uk-margin-small-top" uk-grid><div class="uk-width-auto"> <span class="uk-sortable-handle sort-questions uk-margin-small-right" uk-icon="icon: table"></span></div><div class="uk-width-auto"><input class="form-control" type="text" id="label_' + opval + '_' + nextrow + '" name="label' + opval + '[]" value=""/></div><div class="uk-width-auto"><input class="form-control" type="text" id="price_' + opval + '_' + nextrow + '" name="price' + opval + '[]" value=""/></div><div class="uk-width-auto"><select name="optiontype' + opval + '[]" required id="option_type_' + opval + '_' + nextrow + '" class="form-control"><option value="1">' + $("#fixed").val() + '</option><option value="2">' + $("#percentage").val() + '</option></select></div><div class="uk-width-auto"><button type="button" class="btn btn-danger" onclick="removeoptionrow(' + opval + ',' + nextrow + ')"><i class="fa fa-trash f-s-25"></i></button></div></div></div>';
    $("#total_option" + opval).val(nextrow);
    $('#option' + opval).append(txt);
}

function removeoptionrow(opval, valrow) {
    $("#row_" + opval + "_" + valrow).remove();

}

function addoptionvalue(opval) {
    document.getElementById("valuesection" + opval).innerHTML = "";
    $("#valuesection" + opval).append(txt);
    var txt = '<ul class="valul"><li class="td2"></li><li class="td6">' + $("#label").val() + '</li><li class="td6">' + $("#pricemsg").val() + '</li><li class="td5">' + $("#price_type").val() + '</li><li class="td2"></li></ul><input type="hidden" name="total_option' + opval + '" id="total_option' + opval + '" value="1"/><div class="uk-sortable " uk-sortable="handle: .sort-questions" id="option' + opval + '"><div class="questions-row" id="row_' + opval + '_1"><div class="uk-grid-small uk-margin-small-bottom uk-margin-small-top" uk-grid><div class="uk-width-auto"> <span class="uk-sortable-handle sort-questions uk-margin-small-right" uk-icon="icon: table"></span></div><div class="uk-width-auto"><input class="form-control" type="text" id="label_' + opval + '_1" name="label' + opval + '[]" value=""/></div><div class="uk-width-auto"><input class="form-control" type="text" id="price_' + opval + '_1" name="price' + opval + '[]" value=""/></div><div class="uk-width-auto"><select name="optiontype' + opval + '[]" required id="option_type_' + opval + '_1" class="form-control"><option value="1">' + $("#fixed").val() + '</option><option value="2">' + $("#percentage").val() + '</option></select></div><div class="uk-width-auto"><button type="button" class="btn btn-danger" onclick="removeoptionrow(' + opval + ',1)"><i class="fa fa-trash f-s-25"></i></button></div></div></div></div><button type="button" class="btn btn-primary" onclick="addnewoptionvalue(' + opval + ')">' + $("#add_new_row").val() + '</button>';
    $("#valuesection" + opval).append(txt);
}

function removeoption(opval) {
    $("#mainoption" + opval).remove();
}

function addglobaloption() {
    var optionid = $("#globaloptiontype").val();
    if (optionid != "") {
        $.ajax({
            url: $("#url_path").val() + "/admin/getoptionvalues" + "/" + optionid,
            data: {},
            success: function(data) {
                var str = JSON.parse(data);
                var lastoption = $("#totaloption").val();
                console.log(str);
                var nextoption = parseInt(lastoption) + 1;
                var txt = '<div class="category-wrap" data-id="' + nextoption + '" id="mainoption' + nextoption + '"><h3 class="uk-accordion-title uk-background-secondary uk-light uk-padding-small"><div class="uk-sortable-handle sort-categories uk-display-inline-block ti-layout-grid4-alt"></div>' + $("#new_option").val() + '</h3><div class="uk-accordion-content categories-content "><ul class="ulinine"><li class="ulliinine"><label for="name" class="control-label mb-1">' + $("#namedis").val() + '</label><input id="option_name_' + nextoption + '" name="optionname[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="' + str["name"] + '"></li><li class="ulliinine"><label for="name" class="control-label mb-1">' + $("#msgtype").val() + '</label><select name="optiontype[]" required id="option_type_' + nextoption + '" class="form-control" onchange="addoptionvalue(' + nextoption + ')"><option value="">' + $("#select_type").val() + '</option><option value="1">' + $("#dropdown").val() + '</option><option value="2">' + $("#checkbox").val() + '</option><option value="3">' + $("#radiobutton").val() + '</option><option value="4">' + $("#multiple_select").val() + '</option></select></li><li class="ulliinine3"><input type="checkbox" id="is_required_' + nextoption + '" name="optionrequired[]" value="1" class="form-check-input">' + $("#requireddis").val() + '</li><li class="ulliinine3"><button type="button" class="btn btn-danger" onclick="removeoption(' + nextoption + ')"><i class="fa fa-trash f-s-25"></i></button></li></ul><div id="valuesection' + nextoption + '"></div></div</div>';
                var optiondata = str["optionlist"];
                var valsec = '<ul class="valul"><li class="td2"></li><li class="td6">' + $("#label").val() + '</li><li class="td6">' + $("#pricemsg").val() + '</li><li class="td5">' + $("#price_type").val() + '</li><li class="td2"></li></ul><input type="hidden" name="total_option' + nextoption + '" id="total_option' + nextoption + '" value="' + optiondata + '"/><div class="uk-sortable " uk-sortable="handle: .sort-questions" id="option' + nextoption + '">';

                for (var i = 1; i <= optiondata.length; i++) {
                    var index = parseInt(i) - 1;
                    if (optiondata[index]["price"] == null) {
                        var price = "";
                    } else {
                        var price = optiondata[index]["price"];
                    }
                    valsec = valsec + '<div class="questions-row" id="row_' + nextoption + '_' + i + '"><div class="uk-grid-small uk-margin-small-bottom uk-margin-small-top" uk-grid><div class="uk-width-auto"> <span class="uk-sortable-handle sort-questions uk-margin-small-right" uk-icon="icon: table"></span></div><div class="uk-width-auto"><input class="form-control" type="text" id="label_' + nextoption + '_' + i + '" name="label' + nextoption + '[]" value="' + optiondata[index]["label"] + '"/></div><div class="uk-width-auto"><input class="form-control" type="text" id="price_' + nextoption + '_1" name="price' + nextoption + '[]" value="' + price + '"/></div><div class="uk-width-auto"><select name="optiontype' + nextoption + '[]" required id="option_type_' + nextoption + '_' + i + '" class="form-control"><option value="1">' + $("#fixed").val() + '</option><option value="2">' + $("#percentage").val() + '</option></select></div><div class="uk-width-auto"><button type="button" class="btn btn-danger" onclick="removeoptionrow(' + nextoption + ',' + i + ')"><i class="fa fa-trash f-s-25"></i></button></div></div></div>';
                    $("#option_type_" + nextoption + '_' + i).val(optiondata[index]["price_type"]);
                }
                valsec = valsec + '</div><div><button type="button" class="btn btn-primary" onclick="addnewoptionvalue(' + nextoption + ')">' + $("#add_new_row").val() + '</button></div>';
                $("#totaloption").val(nextoption);
                $("#optionlist").append(txt);
                $("#option_type_" + nextoption).val(str["type"]);
                if (str["is_required"] == "1") {
                    $("#is_required_" + nextoption).attr('checked', 'checked');
                }
                $("#valuesection" + nextoption).append(valsec);
            }
        });
    } else {
        alert($("#ple_sel_option").val());
    }


}

function addoption() {
    var lastoption = $("#totaloption").val();
    var nextoption = parseInt(lastoption) + 1;
    var txt = '<div class="category-wrap" data-id="' + nextoption + '" id="mainoption' + nextoption + '"><h3 class="uk-accordion-title uk-background-secondary uk-light uk-padding-small"><div class="uk-sortable-handle sort-categories uk-display-inline-block ti-layout-grid4-alt" ></div>' + $("#new_option").val() + '</h3><div class="uk-accordion-content categories-content "><ul class="ulinine"><li class="ulliinine"><label for="name" class="control-label mb-1">' + $("#namedis").val() + '</label><input id="option_name_' + nextoption + '" name="optionname[]" type="text" class="form-control" aria-required="true" aria-invalid="false"></li><li class="ulliinine"><label for="name" class="control-label mb-1">' + $("#msgtype").val() + '</label><select name="optiontype[]" required id="option_type_' + nextoption + '" class="form-control" onchange="addoptionvalue(' + nextoption + ')"><option value="">' + $("#select_type").val() + '</option><option value="1">' + $("#dropdown").val() + '</option><option value="2">' + $("#checkbox").val() + '</option><option value="3">' + $("#radiobutton").val() + '</option><option value="4">' + $("#multiple_select").val() + '</option></select></li><li class="ulliinine3"><input type="checkbox" id="is_required_' + nextoption + '" name="optionrequired[]" value="1" class="form-check-input">' + $("#requireddis").val() + '</li><li class="ulliinine3"><button type="button" class="btn btn-danger" onclick="removeoption(' + nextoption + ')"><i class="fa fa-trash f-s-25"></i></button></li></ul><div id="valuesection' + nextoption + '"></div></div</div>';
    $("#totaloption").val(nextoption);
    $("#optionlist").append(txt);
}

function saveoptions() {
    $("#overlaychk").fadeIn(300);　
    var product_id = $("#product_id").val();
    var optiontype = [];
    var required = [];
    var labells = [];
    var pricels = [];
    var pricetype = [];
    var totaloption = $("#totaloption").val();
    var optionname = $("input[name='optionname[]']").map(function() { return $(this).val(); }).get();
    $('select[name="optiontype[]"] option:selected').each(function() { optiontype.push($(this).val()); });
    for (var i = 1; i <= totaloption; i++) {
        if ($("#is_required_" + i).length) {
            if ($("#is_required_" + i).prop("checked") == true) {
                required.push(1);
            } else if ($("#is_required_" + i).prop("checked") == false) {
                required.push(0);
            }
        }

    }
    for (var i = 1; i <= totaloption; i++) {
        var type = [];
        if ($("#mainoption" + i).length) {
            var label = $("input[name='label" + i + "[]']").map(function() { return $(this).val(); }).get();
            var price = $("input[name='price" + i + "[]']").map(function() { return $(this).val(); }).get();
            $('select[name="optiontype' + i + '[]"] option:selected').each(function() { type.push($(this).val()); });
            labells.push(label);
            pricels.push(price);
            pricetype.push(type);
        }

    }
    var name = optionname.join(",");
    var type = optiontype.join(",");
    var req = required.join(",");
    var label = labells.join("#");
    var price = pricels.join("#");
    var pritype = pricetype.join("#");

    if (product_id == "" || product_id == 0) {
        alert($("#generalmsg").val());
    } else {


        $.ajax({
            url: $("#url_path").val() + "/admin/saveproductoption",
            method: "post",
            data: {
                id: product_id,
                name: name,
                type: type,
                req: req,
                label: label,
                price: price,
                pritype: pritype
            },
            success: function(data) {
                $("#custom-nav-option").removeClass('in show active');
                $('a[href="#custom-nav-option"]').removeClass('active');
                $('a[href="#custom-nav-rel_pro"]').addClass('active');
                $("#custom-nav-rel_pro").addClass('in show active');

            }
        });

    }
    $("#overlaychk").fadeOut(1000);

}

function checkrelpro() {
    var related_cat = 1;
    if ($("#subcategory").val() != "") {
        related_cat = $("#subcategory").val();
    }
    var product_id = $("#product_id").val();
    if (product_id != 0) {
        $("#related_product").dataTable().fnDestroy()
    }

    $(document).ready(function() {
        $('#related_product').DataTable({
            processing: true,
            serverSide: true,
            ajax: $("#url_path").val() + '/admin/productlist' + '/' + related_cat + "/" + product_id,
            columns: [{
                data: 'id',
                name: 'id'
            }, {
                data: 'thumbnail',
                name: 'thumbnail'
            }, {
                data: 'name',
                name: 'name'
            }, {
                data: 'price',
                name: 'price'
            }, ],
            columnDefs: [{
                    'targets': 0,
                    'searchable': false,
                    'orderable': false,
                    'className': 'dt-body-center',
                    'render': function(data, type, full, meta) {
                        return '<input type="checkbox" name="related_id[]" value="' + $('<div/>').text(data).html() + '">';
                    }
                },
                {
                    targets: 1,
                    render: function(data) {
                        return '<img src="' + data + '" style="height:50px">';
                    }
                }
            ],

            order: [1, 'asc']
        });
    });

}
$(document).ready(function() {
    var product_id = $("#product_id").val();
    if (product_id != 0) {
        $("#review_product").dataTable().fnDestroy()
    }

    $('#review_product').DataTable({
        processing: true,
        serverSide: true,
        ajax: $("#url_path").val() + '/admin/reviewdatatable' + "/" + "abc",
        columns: [{
            data: 'id',
            name: 'id'
        }, {
            data: 'pro_name',
            name: 'pro_name'
        }, {
            data: 'rev_name',
            name: 'rev_name'
        }, {
            data: 'rating',
            name: 'rating'
        }, {
            data: 'review',
            name: 'review'
        }, {
            data: 'action',
            name: 'action'
        }],
    });
});