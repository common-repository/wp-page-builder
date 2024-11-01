<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
?>
    <div class="notice notice-info is-dismissible zgpb-f-notice-message">
            <p><?php echo __( 'Hey, I noticed you created a page content with Landera - that’s awesome! Could you please do me a BIG favor and give it a 5-star rating on WordPress to help us spread the word and boost our motivation?', 'zgpbd_admin' ); ?></p>
            <p><strong>&#8594;<?php echo __( 'Laranginha<br>Landera team', 'zgpbd_admin' ); ?></strong></p>
            <p>
                    <a href="https://wordpress.org/support/plugin/zigapage-lite/reviews/?filter=5#new-post"
                       class="zgpb-notice-1-dismiss-opt zgpb-notice-1-rate-trigger"
                       target="_blank"
                       rel="noopener"
                        >
                           <?php echo __( 'Ok, you deserve it', 'zgpbd_admin' ); ?></a><br>
                    <a href="#" 
                       class="zgpb-notice-1-dismiss-opt" 
                      rel="noopener"
                        ><?php echo __( 'Nope, maybe later', 'zgpbd_admin' ); ?></a>
                           <br>
                    <a href="#" 
                       class="zgpb-notice-1-opt-rated" 
                     rel="noopener"
                        ><?php echo __( 'I already did', 'zgpbd_admin' ); ?></a>
            </p>
    </div>
    <script type="text/javascript">
            jQuery(document).ready( function($) {
                    $(document).on('click', '.zgpb-notice-1-dismiss-opt, .zgpb-f-notice-message button', function( event ) {
                            
                             if ( ! $(this).hasClass('zgpb-notice-1-rate-trigger') ) {
						event.preventDefault();
					}
                             
                             
                            $.post( ajaxurl, {
                                    action: 'zgpb_f_notice_dismiss'
                            });
                            $('.zgpb-f-notice-message').remove();
                    });
            });
            
            jQuery(document).ready( function($) {
                    $(document).on('click', '.zgpb-notice-1-opt-rated', function( event ) {
                            
                             event.preventDefault();
                             
                             
                            $.post( ajaxurl, {
                                    action: 'zgpb_f_notice_rated'
                            });
                            $('.zgpb-f-notice-message').remove();
                    });
            });
    </script>