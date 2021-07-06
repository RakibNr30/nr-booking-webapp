<?php

// check if notifier helper function doesn't exists
if (!function_exists('notifier')) {
    // notifier function
    function notifier()
    {
        return new \App\Helpers\Notifier\Notifier();
    }
}
