<?php

function getBrowser()
{
    /* Create variables */
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "";

    /* Check if user agents matches string */
    if (preg_match('/MSIE/i', $agent))
    {
        /* assigns value to the browser variable */
        $browser = "Internet Explorer";
    }
    else if (preg_match('/Edge/i', $agent))
    {
        $browser = "Microsoft Edge";
    }
    else if (preg_match('/WOW64/i', $agent))
    {
        $browser = "Intenet Explorer 11+";
    }
    else if (preg_match('/Firefox/i', $agent))
    {
        $browser = "Mozilla Firefox";
    }
    else if (preg_match('/Chrome/i', $agent))
    {
        $browser = "Google Chrome";
    }
    else if (preg_match('/safari/i', $agent))
    {
        $browser = "Safari";
    }
    else if (preg_match('/opera/i', $agent))
    {
        $browser = "Opera";
    }
    else if (preg_match('/netscape/i', $agent))
    {
        $browser = "Netscape";
    }
    else if (preg_match('/maxthon/i', $agent))
    {
        $browser = "Maxthon";
    }
    else if (preg_match('/konqueror/i', $agent))
    {
        $browser = "Konqueror";
    }
    else if (preg_match('/mobile/i', $agent))
    {
        $browser = "Mobile Browser";
    }

    
    return  $browser;
}

function getClientIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

function getOperatingSystem()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $os = "";

    if (preg_match('/windows nt 10/i', $agent))
    {
        $os = "Windows 10";
    }
    else if (preg_match('/windows nt 6.3/i', $agent))
    {
        $os = "Windows 8.1";
    }
    else if (preg_match('/windows nt 6.2/i', $agent))
    {
        $os = "Windows 8";
    }
    else if (preg_match('/windows nt 6.1/i', $agent))
    {
        $os = "Windows 7";
    }
    else if (preg_match('/windows nt 6.0/i', $agent))
    {
        $os = "Windows Vista";
    }
    else if (preg_match('/windows nt 5.2/i', $agent))
    {
        $os = "Windows Server";
    }
    else if (preg_match('/windows nt 5.1/i', $agent))
    {
        $os = "Windows XP";
    }
    else if (preg_match('/windows xp/i', $agent))
    {
        $os = "Windows XP";
    }
    else if (preg_match('/windows nt 5.0/i', $agent))
    {
        $os = "Windows 2000";
    }
    else if (preg_match('/windows me/i', $agent))
    {
        $os = "Windows ME";
    }
    else if (preg_match('/win98/i', $agent))
    {
        $os = "Windows 98";
    }
    else if (preg_match('/win95/i', $agent))
    {
        $os = "Windows 95";
    }
    else if (preg_match('/win16/i', $agent))
    {
        $os = "Windows 3.11";
    }
    else if (preg_match('/macintosh|mac os x/i', $agent))
    {
        $os = "Mac OS X";
    }
    else if (preg_match('/mac_powerpc/i', $agent))
    {
        $os = "Mac OS 9";
    }
    else if (preg_match('/linux/i', $agent))
    {
        $os = "Linux";
    }
    else if (preg_match('/ubuntu/i', $agent))
    {
        $os = "Ubuntu";
    }
    else if (preg_match('/iphone/i', $agent))
    {
        $os = "iPhone IOS";
    }
    else if (preg_match('/ipod/i', $agent))
    {
        $os = "iPod IOS";
    }
    else if (preg_match('/ipad/i', $agent))
    {
        $os = "iPad IOS";
    }
    else if (preg_match('/android/i', $agent))
    {
        $os = "Android";
    }
    else if (preg_match('/blackberry/i', $agent))
    {
        $os = "Blackberry OS";
    }
    else if (preg_match('/webos/i', $agent))
    {
        $os = "Mobile";
    }

    return $os;
}