(function(){
    // converts fieldsets to tabs
    $.fn.fieldset_to_tabs = function(options) {
		return this.each(function() {
			var form = $(this);
            if(!form.children('fieldset').length) { return; } // no fieldsets
			var $nav = $('<ul class="nav nav-tabs inner" role="tablist">');
            var $cnt = $('<div class="tab-content">');
			form.children('fieldset').each(function(i){ // first level children
                $(this).children('legend').each(function(y){ // first level legend
                    $nav.append('<li role="presentation"><a href="#tab_'+i+'" aria-controls="tab_'+i+'" role="tab" data-toggle="tab">'+$(this).text()+'</a></li>');
                    $(this).remove();
                });
                $cnt.append('<div role="tabpanel" class="tab-pane" id="tab_'+i+'">'+$(this).html());
                $(this).remove();
			});
            var $rest = form.html();
            form.html('');
            form.append($nav).append($cnt).append($rest);
            $nav.children().children().first().tab('show');
		});
	}
})(jQuery);