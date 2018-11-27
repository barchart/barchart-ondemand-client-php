<?php

namespace Barchart\OnDemand\Exceptions;

use Exception;

class AuthorizationException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct('Invalid API key.');
    }
}
