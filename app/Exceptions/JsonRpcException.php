<?php

namespace App\Exceptions;

class JsonRpcException extends \Exception
{
    const PARSE_ERROR = 1;
    const UNKNOWN_METHOD = 2;
}