(function(){
    $('button#backtohome').unbind('click').on('click', function(e) {
        e.preventDefault();
        window.location.href='http://localhost:8080';
    });
    $('form').fieldset_to_tabs();
    
    // close any modals before opening a new one
    $('body').on('show.bs.modal', ".modal", function(e) {
        if($('.modal:visible').length) {
            $('.modal').modal('hide');
        }
    });

    // trigger primary button on enter
    $("body").on("shown.bs.modal", ".modal", function() {
        $(this).keypress(function(e) {
            if (e.which == "13") {
                $("div.modal-footer > button.btn-primary").trigger('click');
            }
        });
    });

    // <select> inside dropdown
    $('ul.dropdown-menu select').on('click', function(event) {
    	event.stopPropagation();
    });

    $('ul.dropdown-menu select option').on('click', function(event) {
        var target = $(event.target).text();
        window.location.href = 'http://localhost:8080/datasource/'+target;
    });

    $('#datasource').on('shown.bs.modal', function (e) {
        $(this).find('form').validator();
        $(this).find('form').on('submit', function (e) {
            if (e.isDefaultPrevented()) {
alert('error');
            } else {
alert('ok');
            }
        });
    });

    $.fn.validator.Constructor.FOCUS_OFFSET=0;
    $('form').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            var tab = '#'+$('div.form-group.has-error.has-danger:first').parent().prop('id');
            $('.help-block.with-errors').show();
            // activate first tab having invalid fields
            $('a[href="'+tab+'"]').trigger('click');

        } else {
            // everything looks good!
        }
    })
})(jQuery);