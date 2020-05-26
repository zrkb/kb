<?php

use Pandorga\KB\KB;

if (! function_exists('kb')) {
    /**
     * @return \Pandorga\KB\KB
     */
    function kb()
    {
        return app(KB::class);
    }
}
