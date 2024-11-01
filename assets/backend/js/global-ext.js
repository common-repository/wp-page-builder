/**
 * Created by umeshkumar on 12/05/16.
 */
jQuery(function () {
    var el_notice = jQuery(".zgpb-ext-notice"),
        btn_act = el_notice.find(".zgpb-ext-notice-act"),
        btn_dismiss = el_notice.find(".zgpb-dismiss-welcome");
    el_notice.fadeIn(500);

    function zgpb_remove_notice() {
        el_notice.fadeTo(100, 0, function () {
            el_notice.slideUp(100, function () {
                el_notice.remove();
            });
        });
    }

    btn_act.click(function (ev) {
        zgpb_remove_notice();
        zgpb_notify_wordpress(btn_act.data("msg"),'zgpb_dismiss_upgrade_notice');
    });
    btn_dismiss.click(function (ev) {
        zgpb_remove_notice();
        zgpb_notify_wordpress(btn_act.data("msg"),'zgpb_dismiss_upgrade_notice');
    });

    
    function zgpb_notify_wordpress(message,action_name) {
        el_notice.attr("data-message", message);
        el_notice.addClass("loading");

        var param = {
            action: action_name
        };
        jQuery.post(ajaxurl, param);
    }
    
    //notice 2
    
    var btn_act2 = el_notice.find(".zgpb-ext-notice2-act"),
        btn_dismiss2 = el_notice.find(".zgpb-ext-notice2-act2"),
        btn_dismiss3 = el_notice.find(".zgpb-dismiss-rated");
        
    btn_act2.click(function (ev) {
        zgpb_remove_notice();
        zgpb_notify_wordpress(btn_act2.data("msg"),'zgpb_f_notice_dismiss');
    });
    btn_dismiss2.click(function (ev) {
        zgpb_remove_notice();
        zgpb_notify_wordpress(btn_act2.data("msg"),'zgpb_f_notice_dismiss');
    });   
     btn_dismiss3.click(function (ev) {
        zgpb_remove_notice();
        zgpb_notify_wordpress(btn_act2.data("msg"),'zgpb_f_notice_rated');
    }); 
    

});