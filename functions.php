<?php
function isa_add_cron_recurrence_interval( $schedules ) {
 
    $schedules['every_three_minutes'] = array(
            'interval'  => 180,
            'display'   => __( 'Every 3 Minutes', 'textdomain' )
    );

    return $schedules;
}
add_filter( 'cron_schedules', 'isa_add_cron_recurrence_interval' );

if ( ! wp_next_scheduled( 'your_three_minute_action_hook' ) ) {
    wp_schedule_event( time(), 'every_three_minutes', 'your_three_minute_action_hook' );
}
add_action('your_three_minute_action_hook', 'isa_test_cron_job_send_mail');
function isa_test_cron_job_send_mail() {
    $to = 'oleg@beaverglobal.com';
    $subject = 'Test my 3-minute cron job';
    $message = 'If you received this message, it means that your 3-minute cron job has worked! <img draggable="false" class="emoji" alt="🙂" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/1f642.svg"> ';
	error_log(print_r($subjec, true));
    wp_mail( $to, $subject, $message );
 
}
error_log(print_r(time(), true));

// one time
//wp_clear_scheduled_hook( 'your_three_minute_action_hook' );
?>
