$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.action_modal', function () {
        var link = $(this).attr('link');
        var data = $(this).attr('data');
        var show = $(this).attr('show');

        $.ajax({
            url: link,
            data: {file_name: data},
            method: 'POST',
            success: function (response) {
                var data = $.parseJSON(response);
                if (typeof show == "undefined") {
                    $('#modal').remove();
                }
                $('.appendModal').after(data.modal);
                $('#modal').modal('show');
            }
        })
    });

    $('body').on('click', '.del_photo', function () {
        var link = $(this).attr('link');
        var data = $(this).attr('data');

        $.ajax({
            url: link,
            data: {file_name: data},
            method: 'POST',
            success: function (response) {
                var data = $.parseJSON(response);
                $('.appendModal').after(data.modal);
                $('#modal').modal('show');
            }
        })
    });

    $('body').on('submit', '#form_ajax_item', function (e) {
        e.preventDefault();

        var data = $(this).serialize();
        var link = $(this).attr('action');
        // var refresh_link = $(this).attr('refresh_link');

        $.ajax({
            url: link,
            method: 'POST',
            data: data,
            success: function (response) {
                var result = $.parseJSON(response);
                if (result['error'] == 0) {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#007F50",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-check\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                    $('.modal').modal('hide');
                } else {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#BD030B",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-exclamation-triangle\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                }
            }
        });
        // if (typeof refresh_link != "undefined") {
        //     $.ajax({
        //         url: refresh_link,
        //         method: 'POST',
        //         success: function (response) {
        //             var data = $.parseJSON(response);
        //             $('.photo_body').html(data.data);
        //         }
        //     });
        // }
        $('.toaster').attr('style', '');
        setTimeout(function(){$('.toaster').fadeOut()},4000);
    });

    $('body').on('submit', '#form_ajax_item_file', function (e) {
        e.preventDefault();

        var link = $(this).attr('action');
        var form_data  = new FormData();

        jQuery.each(jQuery('#image')[0].files, function(i, file) {
            form_data.append('file-'+i, file);
        });

        $.ajax({
            url: link,
            type: 'POST',
            data: form_data,
            cache: false,
            contentType : false,
            processData: false,
            dataType: 'text',
            success: function (response) {
                var result = $.parseJSON(response);
                if (result['error'] == 0) {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#007F50",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-check\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                    $('.modal').modal('hide');
                } else {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#BD030B",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-exclamation-triangle\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                }
            }
        });
        // var refreshLink = $(this).attr('refresh_link');
        //
        // $.ajax({
        //     url: refreshLink,
        //     method: 'POST',
        //     success: function (response) {
        //         var data = $.parseJSON(response);
        //         alert($('#photo_body').length);
        //         $('#photo_body').empty();
        //         $('#photo_body').append(data.data);
        //     }
        // });
        $('.toaster').attr('style', '');
        setTimeout(function(){$('.toaster').fadeOut()},4000);
    });

    $('body').on('submit', '#form_search', function (e) {
        e.preventDefault();

        var data = $(this).serialize();
        var link = $(this).attr('action');

        $.ajax({
            url: link,
            method: 'POST',
            data: data,
            success: function (response) {
                var result = $.parseJSON(response);
                    $('.table-content').html(result.data);
                    $('.table-under').html(result.under);
                }
        });
    });

    $('body').on('click', '.add_char', function () {
       let addDelBtn = $(this).attr('delbtn');
       var div = $(this).closest('div');
       let divInsert = div.clone();
       divInsert.find('input').val('');
       div.closest('div').find('.add_char').remove();
       div.after(divInsert);
    });

    $('body').on('click', '.del_char', function () {
        var div = $(this).closest('div');
        if (!div.find('.add_char').length) {
            $(this).closest('div').remove();
        }
    });
    
        $(".date_mask").mask("99.99.9999",{placeholder:"-"});

    $('body').on('click', '.set_main_img', function () {
        var link = $(this).attr('link');
        var img = $(this).attr('img');

        $.ajax({
            url: link,
            data: {file_name: img},
            method: 'POST',
            success: function (response) {
                var result = $.parseJSON(response);
                if (result['error'] == 0) {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#007F50",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-check\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                } else {
                    $('.toaster').css({
                        "display": "block",
                        "z-index": "9999999",
                        "background": "#BD030B",
                        "opacity": 1,
                        "transition": "opacity 1.2s ease-in-out"
                    });
                    $('.toaster').html("<div style='text-align: center; font-size: 1.1em; font-style: italic'><i class=\"fas fa-exclamation-triangle\" style='color: white; font-size: 1.5em; margin-right: 5px'></i>"
                        + "<br />" + result['result'] + "</div><div style='height: 10px;'></div>");
                }
            }
        });
        $('.toaster').attr('style', '');
        setTimeout(function(){$('.toaster').fadeOut()},4000);
    });

});