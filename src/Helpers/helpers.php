<?php

namespace Y\Helpers;

/**
 * @param $var
 *
 * @return bool
 */
function is_exception($var): bool
{
    $fOk = false;

    if ($var instanceof \Throwable) {
        $fOk = true;
    }

    return $fOk;
}

/**
 * @param $path
 *
 * @return bool
 */
function createDirIfNotExists($path): bool
{
    $fOk = false;

    if (!file_exists($path)) {
        mkdir($path);
        $fOk = true;
    }

    return $fOk;
}

/**
 * @param \Throwable $t
 *
 * @return string
 */
function exceptionToStr(\Throwable $t): string
{
    $separator = ', ';

    $msg = 'line: ' . $t->getLine() . $separator;
    $msg .= 'code: ' . $t->getCode() . $separator;
    $msg .= 'message: ' . $t->getMessage() . $separator;
    $msg .= 'file: ' . $t->getFile() . $separator;
    $msg .= 'trace: ' . $t->getTraceAsString() . "\r\n";

    return $msg;
}