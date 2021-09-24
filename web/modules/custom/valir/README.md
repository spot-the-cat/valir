valirCONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Developers
 * Maintainers


INTRODUCTION
------------

The Valir module:
 * Adds a controller for the /hello-velir-1
 * Adds a JSON controller for the /hello-velir-2
 * Adds an admin controller for the /hello-velir-3
 * Configuration form for first and last name.
 * Adds a string to upper text formatter.
 * Adds a login block.
 * Adds a content entity normalizer to add the "velir" field.

REQUIREMENTS
------------

This module requires no modules outside of Drupal core.


INSTALLATION
------------

Install the Valir module as you would normally install a contributed Drupal
module. Visit https://www.drupal.org/node/1897420 for further information.


CONFIGURATION
-------------

    1. After the module is installed, enable the module.
    2. Flush the site cache.
    3. Go to Administration > Configuration > Valir and configure the
       first and last names.
    4. Optionally, the Valir login block can be enabled.


DEVELOPERS
-------------

Developers can view the velir field by appending "?_format=json" to any node's
URL


MAINTAINERS
-----------

 * bkelly - https://www.drupal.org/u/bkelly
