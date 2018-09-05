(function($){
    $(document).ready(function (){
        
        $('.modal-opener').on('click', function(){
            var modal_id = parseInt($(this).data('modal'));
            var modal = $('#modal-'+modal_id).get()[0];
            if(modal){
                $('#modal-'+modal_id).fadeIn();
            }
            return false;
        });
        $('.modal-window-close').click(function() {
            $(this).parents('.modal-window').fadeOut(200);
        });
        $(document).on('click', function(){
            var modals = $('.modal-window').get();
            if(modals.length > 0){
                $(modals).each(function(){
                    var content = $(this).find('.modal-window-content')[0]
                    if(!$(content).is(':hover')){
                        $(this).fadeOut(200);
                    }
                });
            }

        });
    });
})(jQuery);