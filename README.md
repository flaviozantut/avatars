## avatars

Laravel 4 client to [avatars.io](http://avatars.io)


[![Build Status](https://travis-ci.org/flaviozantut/avatars.png?branch=master)](https://travis-ci.org/flaviozantut/avatars)
[![Coverage Status](https://coveralls.io/repos/flaviozantut/avatars/badge.png)](https://coveralls.io/r/flaviozantut/avatars)
[![Latest Stable Version](https://poser.pugx.org/flaviozantut/avatars/v/stable.png)](https://packagist.org/packages/flaviozantut/avatars)
[![Total Downloads](https://poser.pugx.org/flaviozantut/avatars/downloads.png)](https://packagist.org/packages/flaviozantut/avatars)


## Installation

Installation with php composer

     composer require "flaviozantut/avatars:1.0.*"

add to app.php 'providers':

    'Flaviozantut\Avatars\AvatarsServiceProvider',

add to app.php 'aliases':

    'Avatars'    => 'Flaviozantut\Avatars\AvatarsFacade',

   Register on [avatars.io](http://avatars.io) and after receiving the email with the configuration switches run the commands substituting the keys


    php artisan avatars:client_id YOURCLIENTID
    php artisan avatars:secret_key YOURSECRETKEY
    php artisan config:publish flaviozantut/avatars


## Usage

    //get avatar url
    $app['avatars']->url('user@mail.com', 'auto');
    //upload avatar
    $app['avatars']->upload(base64encodefile, userid);
    //get by URL
    http://yourapp.dev/avatars/userid/service/size
    //POST photo to
    http://yourapp.dev/avatars/userid

## DOCS

 [Docs](https://github.com/flaviozantut/avatars/tree/master/docs/ApiIndex.md)


## MIT License

  [license.txt](/flaviozantut/avatars/blob/master/license.txt)
