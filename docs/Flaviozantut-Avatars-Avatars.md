Flaviozantut\Avatars\Avatars
===============

Avatars




* Class name: Avatars
* Namespace: Flaviozantut\Avatars



Constants
----------


### AVATARS_IO

```
const AVATARS_IO = 'http://avatars.io'
```





Properties
----------


### $client

```
private mixed $client
```

Guzzle client



* Visibility: **private**


### $clientId

```
private mixed $clientId
```

client id to get uplouded avatar



* Visibility: **private**


### $secretKey

```
private mixed $secretKey
```

secret key to auth on avatars.oi



* Visibility: **private**


Methods
-------


### \Flaviozantut\Avatars\Avatars::__construct()

```
mixed Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::__construct()(string $clientId, string $secretKey)
```

Constructor class



* Visibility: **public**

#### Arguments

* $clientId **string**
* $secretKey **string**



### \Flaviozantut\Avatars\Avatars::getClientId()

```
string Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::getClientId()()
```

Get client id



* Visibility: **public**



### \Flaviozantut\Avatars\Avatars::getSecretKey()

```
string Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::getSecretKey()()
```

Get secret key



* Visibility: **public**



### \Flaviozantut\Avatars\Avatars::setClientId()

```
mixed Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::setClientId()(string $value)
```

Set client id



* Visibility: **public**

#### Arguments

* $value **string**



### \Flaviozantut\Avatars\Avatars::setSecretKey()

```
mixed Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::setSecretKey()(string $value)
```

Set secret key



* Visibility: **public**

#### Arguments

* $value **string**



### \Flaviozantut\Avatars\Avatars::url()

```
string Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::url()(string $user, string $service, string $size)
```

Get avatar url



* Visibility: **public**

#### Arguments

* $user **string** - &lt;p&gt;user key&lt;/p&gt;
* $service **string** - &lt;p&gt;service to get avatar  suported: auto, twitter, facebook, instagram, gravatar&lt;/p&gt;
* $size **string** - &lt;p&gt;suported: default, small, medium, large&lt;/p&gt;



### \Flaviozantut\Avatars\Avatars::upload()

```
string Flaviozantut\Avatars\Avatars::\Flaviozantut\Avatars\Avatars::upload()(string $file, string $user)
```

Upload avatar



* Visibility: **public**

#### Arguments

* $file **string** - &lt;p&gt;base64 encoded file&lt;/p&gt;
* $user **string** - &lt;p&gt;user id&lt;/p&gt;


