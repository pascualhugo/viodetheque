<?php
ini_set('error_reporting', '-1');
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');

function getBlock($file, $data = [])
{
    require $file;
}
