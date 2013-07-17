<?php
//avatars route
Route::get('/avatars/{userId}/{service?}/{size?}', function ($userId, $service = '', $size = '') {
    return Redirect::to(app()['avatars']->url($userId, (isset($service)?$service:''), $size));
});

Route::post('/avatars/{userId}', function ($userId) {
    if (Input::hasFile('photo')) {
        $file = file_get_contents(Input::file('photo')->getRealPath());
        try {
            return Redirect::to(app()['avatars']->upload(base64_encode($file), $userId));
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    } else {
        return "Required file input: 'photo'";
    }

});
