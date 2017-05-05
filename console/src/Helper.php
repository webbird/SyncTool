<?php

namespace SyncTool;

class Helper
{

    protected static $is_win       = null;

    /**
     *
     * @access public
     * @return
     **/
    public static function findDirectories($dir,$options=array())
    {
        // merge options with defaults
        $options = array_merge(array(
            'curr_depth'    => 0,
            'dirs'          => array(),
            'max_depth'     => 9,
            'recurse'       => false,
            'remove_prefix' => false,
        ), $options);

        $options['curr_depth'] ++;

        $dir = self::sanitizePath($dir);
        if(isset($options['remove_prefix']) && !is_bool($options['remove_prefix']) && strlen($options['remove_prefix']))
            $options['remove_prefix'] = self::sanitizePath($options['remove_prefix']);

        foreach(glob($dir, GLOB_ONLYDIR|GLOB_NOSORT) as $folder) {
            $folder = self::sanitizePath($folder);

            $options['dirs'][]
                = (isset($options['remove_prefix']))
                ? ((is_bool($options['remove_prefix']) && $options['remove_prefix'])
                  ? str_ireplace(str_replace('*','',$dir),'',$folder)
                  : str_ireplace($options['remove_prefix'],'',$folder)
                  )
                : $folder;

            if($options['recurse'] && $options['curr_depth']<$options['max_depth']) {
                 $options['dirs'] = self::findDirectories("{$folder}/*", $options);
            }
        }

        return $options['dirs'];
    }   // end function findDirectories()

    /**
     *
     * @access public
     * @return
     **/
    public static function isWin()
    {
        if(!self::$is_win)
        {
            self::$is_win = false;
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                self::$is_win = true;
            }
        }
        return self::$is_win;
    }   // end function isWin()

    /**
     * fixes a path by removing //, /../ and other things
     *
     * @access public
     * @param  string  $path - path to fix
     * @return string
     **/
    public static function sanitizePath($path,$as_array=false)
    {
        // remove trailing slash; this will make sanitizePath fail otherwise!
        $path       = preg_replace( '~/{1,}$~', '', $path );
        // make all slashes forward
        $path       = str_replace( '\\', '/', $path );
        // bla/./bloo ==> bla/bloo
        $path       = preg_replace('~/\./~', '/', $path);

        // relative path
        if(strlen($path)>2 && !substr_compare($path,'..',0,2)) {
            if(defined('SIA_BASE_PATH')) {
                $path = substr_replace($path, SIA_BASE_PATH, 1, 2);
            }
        }

        // resolve /../
        // loop through all the parts, popping whenever there's a .., pushing otherwise.
        $parts = array();
        foreach(explode('/',preg_replace('~/+~','/',$path)) as $part) {
            if($part === ".." || $part == '') {
                array_pop($parts);
            }
            elseif($part!="")
            {
                #$part = (self::isWin() && \mb_detect_encoding($part,'UTF-8',true))
                #      ? utf8_decode($part)
                #      : $part;
                $parts[] = $part;
            }
        }

        if($as_array) return $parts;

        $new_path = implode("/", $parts);
        // windows
        if(!preg_match('/^[a-z]\:/i', $new_path)) {
            $new_path = '/' . $new_path;
        }

        return $new_path;
    }   // end function sanitizePath()
}