(function($){

    /****** EVENTS ******/

    $(document).ready(function (){
        StartStageOwl();
        MobileMenu();
        StartAdminPurchasesEditFileForm();
        StartAdminTopPanelConsoleToggle();
    });

    $(window).on('load', function(){
        StartAdminMenuCore();
    });

    $(window).on('resize', function(){
        StartAdminMenuCore();
    });

    /****** FUNCTIONS ******/

    function StartStageOwl() {
        $('.single-stage .owl-carousel').owlCarousel({
            loop : true,
            margin : 15,
            nav : true,
            dots : false,
            center : true,
            items : 1,
            autoHeight : true,
            autoplay : true,
            autoplayTimeout : 5000,
            autoplayHoverPause : true,
            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
        });

        /* Auto height fix */
        var interval = setInterval(function () {
            var current_item = $('.owl-item.active').get()[0];
            var parents_outers = $(current_item).parents('.owl-stage-outer.owl-height');
            var outer = parents_outers[0];
            $(outer).height(parseInt($(current_item).height()));
        }, 500);
        setTimeout(function () {
            clearInterval(interval);
        }, 5000);
    }
    
    function StartAdminPurchasesEditFileForm() {

        /* Delete this attachment form actions*/
        $('.attachment-wrap .delete-button').each(function (){
            var form = $(this).find('form')[0];
            var del_icon = $(this).find('i')[0];
            $(del_icon).on('click', function() {
                $(form).submit();
            });
        });

        /* Add new attachment form actions */
        $('.attachment-add-block').each(function(){
            var form_block = this;
            var add_icon = $(form_block).find('i')[0];
            var form_file_input = $(form_block).find('input[type=file]')[0];
            var form = $(form_block).find('form')[0];
            $(add_icon).on('click', function(){
                $(form_file_input).click();
            });
            $(form_file_input).change(function(){
                $(form).submit();
            });
        });
    }
    
    function StartAdminTopPanelConsoleToggle() {
        $('#console-toggle').on('click', function(){
            var left_panel = $('.left-panel').get()[0];
            if($(left_panel).hasClass('active')){
                $(left_panel).removeClass('active');
            }else{
                $(left_panel).addClass('active');
            }
        });
    }
    
    function StartAdminMenuCore() {
        var buttons = $('.admin-page .left-panel ul.general-menu>li>a').each(function(){
            var button = this;
            $(button).on('click', function(){
                $(buttons).each(function() {
                    $(this).parent().find('ul.sub-menu').removeClass('tablet_visible');
                });
                if(window.innerWidth>600 && window.innerWidth<=800){
                    $(button).parent().find('ul.sub-menu').addClass('tablet_visible');
                    return false;
                }
            });
        });
    }
    
    function MobileMenu() {
        var mob_menu = $('.mobile-menu').get()[0];
        if(mob_menu){
            $('#mob-menu-switcher').on('click', function(){
                if($(mob_menu).hasClass('visible')){
                    $(mob_menu).stop().slideUp(400, function(){
                        $(mob_menu).removeClass('visible');
                    });
                }else{
                    $(mob_menu).stop().slideDown(400, function () {
                        $(mob_menu).addClass('visible');
                    });
                }
            });
            $(document).on('click', function(){
                if(!$(mob_menu).is(':hover') && $(mob_menu).hasClass('visible')){
                    $(mob_menu).stop().slideUp(400, function(){
                        $(mob_menu).removeClass('visible');
                    });
                }
            });
            $(window).resize(function(){
                var toggle_width = 800;
                if($(window).width()>toggle_width && $(mob_menu).hasClass('visible')){
                    $(mob_menu).removeClass('visible');
                    $(mob_menu).slideUp(200);
                }
            });
        }
    }

})(jQuery);