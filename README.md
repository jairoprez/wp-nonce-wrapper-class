# WordPress Nonce Wrapper Class

This class provides the functionality of working with WordPress Nonces in an object orientated way.

Table of contents:
 * [Requirements](#requirements)
 * [Installation](#installation)
 * [Usage](#usage)

## Requirements

* PHP >= 5.4
* WordPress >= 3.5

## Installation

You can install this class via command-line or drag it into the root of your plugin directory.

### via Command-line

Using [Composer](https://getcomposer.org/), add Nonce Wrapper Class to your plugin's dependencies.

```sh
composer require perezlabs/wp-nonce-wrapper-class:dev-master
```

### Another way

1. Download the [latest zip](https://github.com/perezlabs/wp-nonce-wrapper-class/archive/master.zip) of this repo.
2. Unzip the master.zip file.
3. Drag it into the root of your plugin directory.
4. Happy coding :)!

## Usage

Setup the minimum required thigs:

```php
<?php
require_once 'vendor/autoload.php';

use Perezlabs\WpNonceWrapper\WpNonceWrapper;

// Instantiate the class
$nonce = new WpNonceWrapper();
```
### Examples

Adding a nonce to a URL:

```php
$complete_url = $nonce->wpNonceUrl( $bare_url, 'trash-post_'.$post->ID );
```

Adding a nonce to a form:

```php
$nonce->wpNonceField( 'delete-comment_'.$comment_id );
```

Creating a nonce:

```php
$newNonce = $nonce->wpCreateNonce( 'my-action_'.$post->ID );
```

Verifying a nonce:

```php
$nonce->checkAdminReferer( 'delete-comment_'.$comment_id );
```

Verifying a nonce passed in an AJAX request:

```php
$nonce->checkAjaxReferer( 'process-comment' );
```

Verifying a nonce passed in some other context:

```php
$nonce->wpVerifyNonce( $_REQUEST['my_nonce'], 'process-comment'.$comment_id );
```

