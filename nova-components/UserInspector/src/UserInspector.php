<?php

namespace Acme\UserInspector;

use Laravel\Nova\ResourceTool;

class UserInspector extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'User Inspector';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'user-inspector';
    }
}
