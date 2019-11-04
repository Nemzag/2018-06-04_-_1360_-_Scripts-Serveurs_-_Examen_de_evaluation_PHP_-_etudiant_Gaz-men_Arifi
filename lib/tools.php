<?php
// Cut String
function cutString($txt)
{
    if(strlen($txt) > 150 ){
        $txt = substr($txt, 0,150);
        $space = strrpos($txt, ' ');
        $txt = substr($txt, 0, $space);
        $txt .= '...';
    }
    return $txt;
}