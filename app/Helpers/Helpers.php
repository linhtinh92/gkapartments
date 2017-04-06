<?php
/**
 * Created by PhpStorm.
 * User: LINH NGUYEN
 * Date: 9/11/2016
 * Time: 8:05 PM
 */
if (!function_exists('checkRoleAccess')) {
    function checkRoleAccess($arrRole, $role)
    {
        $arrRole = (array)json_decode($arrRole);
        if (array_key_exists($role, $arrRole)) {
            if ($arrRole[$role] == "true") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
if (!function_exists('recursionCate')) {
    function recursionCate($source, $parent, $level, &$newArray)
    {
        if (count($source) > 0) {
            foreach ($source as $key => $value) {
                if ($value['parent'] == $parent) {
                    $value['level'] = $level;
                    $newArray[] = $value;
                    unset($source[$key]);
                    $newParent = $value['id'];
                    recursionCate($source, $newParent, $level + 1, $newArray);
                }
            }
        }
    }
}
if (!function_exists('cut_string')) {
    function cut_string($string, $max_length)
    {
        if ($string && $max_length) {
            if (strlen($string) > $max_length) {
                $string = substr($string, 0, $max_length);
                $pos = strrpos($string, " ");
                if ($pos === false) {
                    return substr($string, 0, $max_length) . "...";
                }
                return substr($string, 0, $pos) . "...";
            } else {
                return $string;
            }
        }
    }
}
if (!function_exists('orderingValue')) {
    function orderingValue($allArray)
    {
        $array = $allArray->toArray();
        if (count($array) > 0) {
            return max($array)['ordering'] + 1;
        } else {
            return 1;
        }

    }
}
if (!function_exists('convertData')) {
    function convertData($allArray)
    {
        $array = [];
        foreach ($allArray as $key => $value) {
            if (!is_array($value)) {
                unset($value);
            } else {
                foreach ($value as $k => $v) {
                    $array[$k][$key] = $v;
                }
            }
        }
        return $array;
    }
}
if (!function_exists('convertArray')) {
    function convertArray($array)
    {
        $arr = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if (is_array($v) && $v[0] != "") {
                        $arr[$k][$key] = $v[0];
                    }

                }
            }
        }
        return $arr;
    }
}


if (!function_exists('validationEmail')) {
    function validationEmail($email)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
    }
}
if (!function_exists('get_youtube_id')) {
    function get_youtube_id($url)
    {
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);
        return isset($args['v']) ? $args['v'] : false;
    }
}
if (!function_exists('_sendEmail')) {
    function _sendEmail($view, $subject, $data, $to = [], $from, $cc = [], $bcc = [])
    {
        return \Mail::send($view, ['data' => $data], function ($message) use ($subject, $to, $cc, $bcc, $from) {
            foreach ($to as $key => $row) {
                $message->from($from['email_receives_feedback'], $subject . " " . $_SERVER['SERVER_NAME']);
                $message->to($row['email'], $row['name'])->subject($subject . " " . $_SERVER['SERVER_NAME']);
            }
        });
    }
}
if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}