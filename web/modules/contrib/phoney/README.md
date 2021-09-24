CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

This module provides an input filter that protects phone numbers from spam
bots. The filter encrypts the phone number by adding 19 to the ASCII value
of each digit and hiding it behind a data-attribute. The HTML is decrypted
and rewritten by JavaScript in the browser.

**Notice**: There is no non-javascript fallback.

 * For a full description of the module visit:
   https://www.drupal.org/project/phoney

 * To submit bug reports and feature suggestions, or to track changes visit:
   https://www.drupal.org/project/issues/phoney


REQUIREMENTS
------------

This module requires no modules outside of Drupal core.


INSTALLATION
------------

Install the Phoney module as you would normally install a contributed Drupal
module. Visit https://www.drupal.org/node/1897420 for further information.


CONFIGURATION
-------------

    1. Enable the module.
    2. In the backend go to `admin/config/content/formats`, e.g. Basic HTML, and under the section "Enabled filters" check the box "Obfuscate Phone".
    3. Flush the site cache.


MAINTAINERS
-----------

 * bkelly - https://www.drupal.org/u/bkelly
