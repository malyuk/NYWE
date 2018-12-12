# New York Wine Events
[http://wp-project.zeeklabs.com](http://wp-project.zeeklabs.com)

## URLs
* [Production](http://wp-project.zeeklabs.com) - Digital Ocean
* [Staging](http://stage.wp-project.zeeklabs.com) - Digital Ocean

## Useful Links
* [Buddy](https://app.buddy.works/zeek)
* [Teamwork](https://support.zeek.com/)
* [GitHub](https://github.com/ZeekInteractive/)

## Hosting
[WP Engine - Zeek Account](https://my.wpengine.com/installs/zeekint)

## Deployment
- [Production](https://app.buddy.works/zeek): Manual via `master` branch
- [Development](https://app.buddy.works/zeek): Automatic via `develop` branch

## Getting started
1. `composer install` from git root directory

### Theme
See theme `/themes/wp-project/README.md` for theme-specific documentation.

## WordPress Plugins
This project **FULLY** uses composer to install and manage all WordPress plugins.

To bring in new plugins to this project, they should be retrievable from either:
* [WordPress Packagist](https://wpackagist.org/)
* [Zeek SatisPress](https://wpp.zeeklabs.com/wp-admin/options-general.php?page=satispress#satispress-packages)

If there is a premium plugin that does not exist in Zeek's SatisPress, please [upload it and add it to the system](https://wpp.zeeklabs.com/wp-admin/plugin-install.php).

### PHP Dependencies
All PHP dependencies should be listed in the `composer.json` file. Do not commit dependencies directly to the repo, as they should be managed entirely via composer.

There are a handful of private Zeek packages (standalone and WordPress) [available](https://packages.zeeklabs.com/).

### Environment Variables
In your local dev (in `mu-plugins/app`), copy the `.env.example.php` file to a new `.env.php` file. Modify the values as necessary:
* `SENTRY_URL`: typically should never be defined locally (only should be used in production environments)
* `ACF_LITE`: if set to true will load the ACF generated files. Set to false to allow WYSIWYG to load.
* `DISALLOW_FILE_EDIT`: set to true to set a WP constant that disables file modifications.

Example:
```php
<?php
return [
    'ACF_LITE'           => true
    'DISALLOW_FILE_EDIT' => false
];
```
