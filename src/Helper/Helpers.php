<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 18:28
 * Copyright:EastSea
 */

if(!function_exists('make_text_file_to_array_file'))
{
    function make_text_file_to_array_file($file,$dist='./')
    {
        if(!file_exists($file))
            return false;
        $list = [];
        $fs = fopen($file, 'r');
        $ts = fopen($dist.basename($file).'.php', 'w+');
        fputs($ts, "<?php\r\n return ");
        while (!feof($fs)) {
            $line = fgets($fs);
            if (empty($line = mb_ereg_replace(PHP_EOL,'',$line))) {
                continue;
            }
            $list[] = $line;
        }
        fwrite($ts, var_export($list, true));
        fputs($ts, ";");
        fclose($fs);
        return $dist.basename($file).'.php';
    }
}