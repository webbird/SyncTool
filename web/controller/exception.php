<?php

namespace SyncTool;

class exception {

    public function __call($method, $args)
    {
        return call_user_func_array(array($this, $method), $args);
    }

    /**
     * exception handler; allows to remove paths from error messages and show
     * optional stack trace
     **/
    public static function exceptionHandler($exception)
    {
        $exc_class = get_class($exception);

        // filter message
        $message = $exception->getMessage();
        $message = str_replace(
            array(
                CAT_Helper_Directory::sanitizePath(CAT_PATH),
                str_replace('/','\\',CAT_Helper_Directory::sanitizePath(CAT_PATH)),
            ),
            array(
                '[path to]',
                '[path to]',
            ),
            $message
        );
        $msg = "[$exc_class] $message";
        echo $msg;
    }
}