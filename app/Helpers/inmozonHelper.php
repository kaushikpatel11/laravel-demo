<?php

/**
 * Format a Json message when an exception is throwed.
 * It is used in the try catch to gie information to the user with the error.
 *
 * @param Exception $exception
 * @return array
 */
function exceptionJsonMessage(\Exception $exception)
{
    return array(
        'success' => false,
        'error'   => array(
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage()
        )
    );
}

