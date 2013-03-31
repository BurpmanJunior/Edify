<?php

namespace Edify\Utils;
/**
 * GUID Tools
 */

/**
 * A GUID class for functions based around the production of GUID strings
 *
 * @author IrishAdo <irishado@php-programmers.net>
 */
class Guid {
    /**
     * create a new GUID
     *
     * @return String a Unique GUID string
     */
    function create() {
        $guid = '';
        $uid = uniqid("", true);
        $data = $namespace;
        $data .= $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $data .= $_SERVER['SERVER_ADDR'];
        $data .= $_SERVER['SERVER_PORT'];
        $data .= $_SERVER['REMOTE_ADDR'];
        $data .= $_SERVER['REMOTE_PORT'];
        $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
        $guid = '{' .
                substr($hash, 0, 8) .
                '-' .
                substr($hash, 8, 4) .
                '-' .
                substr($hash, 12, 4) .
                '-' .
                substr($hash, 16, 4) .
                '-' .
                substr($hash, 20, 12) .
                '}';
        return $guid;
    }
}

?>
