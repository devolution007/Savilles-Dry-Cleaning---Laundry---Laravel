$(document).ready(function () {

    function randomNumber(min, max) {
        var rand = Math.random() * (max - min) + min;
        return rand.toFixed(0);
    }

    function slugGenerate(text) {
        return text.toLowerCase()
            .replace(/[^a-z0-9-]/gi, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '')
    }

    // Delete confirmation
    $(".deleteForm").submit(function () {
        return confirm("Are you sure you want to Delete this?");
    });

    // Slug Generate
    $(".forSlug").keyup(function (e) {
        var slug = slugGenerate($(this).val());
        $(".slugResult").val(slug);
    });

    $(document).on('click', ".addChildRow", function () {
        var target = $(this).data('target');

        if ($('.priceItem[data-step=' + target + ']').length) {
            var main = $('.priceItem[data-step=' + target + ']').find('.priceRow');
            var lastElm = main.find('.subItem').last().data('item');
            var newElm = parseFloat(lastElm) + 1;
            var element = ('<div class="subItem" data-item="' + newElm + '">' +
                '<div class="priceSubDelete elementDelete">' +
                '<i class="fa-solid fa-trash"></i>' +
                '</div>' +
                '<div class="grid grid-cols-3 gap-x-3">' +
                '<fieldset>' +
                '<input name="data[' + target + '][child][' + newElm + '][title]" class="input-field" placeholder="Sub Service Child Title" type="text" required>' +
                '</fieldset>' +
                '<fieldset>' +
                '<input name="data[' + target + '][child][' + newElm + '][desc]" class="input-field" placeholder="Sub Service Child Description" type="text" required>' +
                '</fieldset>' +
                '<fieldset>' +
                '<input name="data[' + target + '][child][' + newElm + '][price]" class="input-field" placeholder="Sub Service Child Price (ex: 42.75)" type="text" required>' +
                '</fieldset>' +
                '</div>' +
                '</div>');

            $('.priceItem[data-step=' + target + ']').find('.priceSub').append(element);
        }
    });

    $(document).on('click', '.addSubRow', function () {
        var lastElm = $('.priceList').find('.priceItem').last().data('step');
        var newElm = parseFloat(lastElm) + 1;

        var ukey = randomNumber(1000000, 9999999);

        var element = ('<div class="priceItem" data-step="' + newElm + '">' +
            '<div class="priceItemDelete elementDelete">' +
            '<i class="fa-solid fa-trash"></i>' +
            '</div>' +
            '<div class="priceRow">' +
            '<div class="priceTitle">' +
            '<fieldset>' +
            '<label>Title</label>' +
            '<input name="data[' + newElm + '][title]" class="input-field" placeholder="Sub Service Title" type="text" required>' +
            '</fieldset>' +
            '<div class="addChildRow rowButton" data-target="' + newElm + '">Add Sub Service Child</div>' +
            '</div>' +
            '<div class="priceSub">' +
            '<div class="subItem" data-item="0">' +
            '<div class="priceSubDelete elementDelete">' +
            '<i class="fa-solid fa-trash"></i>' +
            '</div>' +
            '<div class="grid grid-cols-2 gap-x-6">' +
            '<fieldset>' +
            '<input name="data[' + newElm + '][child][0][title]" class="input-field" placeholder="Sub Service Child Title" type="text" required>' +
            '</fieldset>' +
            '<fieldset>' +
            '<input name="data[' + newElm + '][child][0][price]" class="input-field" placeholder="Sub Service Child Price (ex: 42.75)" type="text" required>' +
            '</fieldset>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
        $('.priceList').append(element);
    });

    // Delete Price Item
    $(document).on('click', ".priceItemDelete", function () {
        if ($(this).parent().parent().find('.priceItem').length > 1) {
            //$(this).parent().remove();
            var BTN = $(this);
            if (confirm("Are you sure you want to Delete this row?")) {

                // delete from db
                if (BTN.data('delete')) {
                    var deleteUrl = BTN.data("delete");
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-type': 'application/json',
                        },
                        success: function (response) {
                            if (response.status == 'success') {
                                alert("Row Deleted Successfully!");
                                BTN.parent().remove();
                            } else {
                                alert("Failed to delete the Row!");
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                } else {
                    BTN.parent().remove();
                }
            }
        } else {
            alert('You have to keep one sub service atleast');
        }
    })

    // Delete Child
    $(document).on('click', ".priceSubDelete", function () {
        if ($(this).parent().parent().find('.subItem').length > 1) {
            $(this).parent().remove();
        } else {
            alert('You have to keep one sub service child atleast');
        }
    })

    // Details
    $(document).on('click', '.addDetailsRow', function () {
        var last = $(".detailsItem").last().data('step');
        var next = parseFloat(last) + 1;
        var element = ('<div class="detailsItem" data-step="' + next + '">' +
            '<fieldset>' +
            '<label>Detail Icon</label>' +
            '<input name="detail[' + next + '][icon]" class="input-field" placeholder="Service Icon" type="text" required>' +
            '</fieldset>' +
            '<fieldset>' +
            '<label>Detail Title</label>' +
            '<input name="detail[' + next + '][title]" class="input-field" placeholder="Service Title" type="text">' +
            '</fieldset>' +
            '<fieldset>' +
            '<label>Detail Description</label>' +
            '<textarea name="detail[' + next + '][content]" class="input-field" placeholder="Detail Description" type="text"></textarea>' +
            '</fieldset>' +
            '</div>');
        $(".detailsList").append(element);
    })

    // Delete Price Item
    $(document).on('click', ".detailItemDelete", function () {
        if ($(this).parent().parent().find('.detailsItem').length > 1) {
            //$(this).parent().remove();
            var BTN = $(this);
            if (confirm("Are you sure you want to Delete this row?")) {

                // delete from db
                if (BTN.data('delete')) {
                    var deleteUrl = BTN.data("delete");
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Content-type': 'application/json',
                        },
                        success: function (response) {
                            if (response.status == 'success') {
                                alert("Row Deleted Successfully!");
                                BTN.parent().remove();
                            } else {
                                alert("Failed to delete the Row!");
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                } else {
                    BTN.parent().remove();
                }
            }
        } else {
            alert('You have to keep one detail atleast');
        }
    })

})