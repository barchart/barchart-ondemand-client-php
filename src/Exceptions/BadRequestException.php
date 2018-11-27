<?php

namespace Barchart\OnDemand\Exceptions;

use Exception;

class BadRequestException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
