$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':csrfToken
    }
});

$(function(){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    var durum = parseInt($("body").data("status"));

    switch (durum)
    {
        case 0 :
            toastr.error('Error');
            break;
        case 1 :
            toastr.success('Success.');
            break;
        case 2 :
            toastr.info('The operation is successful but will be activated after the administrator approves.');
            break;

        case 3 :
            toastr.warning('You have already asked for authorship before.');
            break;
        case 4 :
            toastr.warning('Category not deleted! because the category has articles.');
            break;



    }
    //
    $('[data-toggle="tooltip"]').tooltip();



    $('.summernote').summernote({
        height: 300,
        lang: 'en-EN'
    });

    $('.selectpicker').selectpicker({
        style: 'btn-default'
    });
    //
    $(".durum").bootstrapSwitch();

    $(".durum").on('switchChange.bootstrapSwitch', function(event, state) {
        console.log(this); // DOM element
        console.log(event); // jQuery event
        console.log(state); // true | false
        $.ajax({
            data: {"status": state,"id":$(this).data("id") },
            type: "POST",
            url: $(this).data("url"),
            success: function(url) {
                //alert('Success');

            }
        });
    });


});
