MessageBird's REST API for PHP
===============================
This repository contains the open source PHP client for MessageBird's REST API. Documentation can be found at: https://www.messagebird.com/developers/php


Requirements
-----

- [Sign up](https://www.messagebird.com/en/signup) for a free MessageBird account
- Create a new access_key in the developers sections
- MessageBird API client for PHP requires PHP >= 5.3.

Installation
-----

####Composer installation

- Add the `"messagebird/php-rest-api": "1.1.x"` into the `require` section of your `composer.json`.
- Run `composer install`.

```
{
    "require": {
        "messagebird/php-rest-api": "1.1.x"
    }
}
```

####Manual installation

When you do not use Composer. You can git checkout or download [this repository](https://github.com/messagebird/php-rest-api/archive/master.zip) and include the MessageBird API client manually.


Usage
-----

We have put some self-explanatory examples in the *examples* directory, but here is a quick breakdown on how it works. First, you need to set up a **MessageBird\Client**. Be sure to replace **YOUR_ACCESS_KEY** with something real.

```php
require 'autoload.php';

$MessageBird = new \MessageBird\Client('YOUR_ACCESS_KEY');

```

That's easy enough. Now we can query the server for information. Lets use getting your balance overview as an example:

```php
// Get your balance
$Balance = $MessageBird->balance->read();
```


Documentation
----
Complete documentation, instructions, and examples are available at:
[https://www.messagebird.com/developers/php](https://www.messagebird.com/developers/php)


License
----
The MessageBird REST Client for PHP is licensed under [The BSD 2-Clause License](http://opensource.org/licenses/BSD-2-Clause). Copyright (c) 2014, MessageBird
