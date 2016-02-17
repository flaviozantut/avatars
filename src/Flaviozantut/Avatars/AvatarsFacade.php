<?php

namespace Flaviozantut\Avatars;

class AvatarsFacade extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'avatars';
    }
}
