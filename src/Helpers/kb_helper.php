<?php

use Zero\KB\KB;

if (! function_exists('kb')) {
    /**
     * @return \Zero\KB\KB
     */
    function kb()
    {
        return app(KB::class);
    }
}
