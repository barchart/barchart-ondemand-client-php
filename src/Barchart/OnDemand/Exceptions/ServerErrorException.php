<?php

namespace Barchart\OnDemand\Exceptions;

use Exception;

class ServerErrorException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct('Something is not working correctly, please contact support.');
    }
}
