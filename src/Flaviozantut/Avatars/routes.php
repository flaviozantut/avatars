<?php
//avatars route
Route::get('/avatars/{userId}/{service?}/{size?}', function ($userId, $service = '', $size = '')
{
    return Redirect::to(app()['avatars']->url($userId, (isset($service)?$service:''), $size));
});