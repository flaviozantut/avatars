## avatars

Laravel 4 client to [avatars.io](http://avatars.io)


## Installation

Installation with php composer

    php composer.phar require flaviozantut/avatars
    dev-master

add to app.php 'providers':

    'Flaviozantut\Avatars\AvatarsServiceProvider',

add to app.php 'aliases':

    'Avatars'    => 'Flaviozantut\Avatars\AvatarsFacade',

   Register on [avatars.io](http://avatars.io) and after receiving the email with the configuration switches run the commands substituting the keys


    php artisan avatars:secret_key YOURSECRETKEY
    php artisan avatars:client_id YOURCLIENTID


## Usage

    //get avatar url
    $app['avatars']->url('user@mail.com', 'auto');
    //upload avatar
    $app['avatars']->upload(base64encodefile, userid);
    //get by URL
    http://yourapp.dev/avatars/userid/service/size

##DOC

 [Doc](http://flaviozantut.github.com/avatars/buils/docs/index.html)


## MIT License

  [license.txt](/flaviozantut/avatars/blob/master/license.txt)