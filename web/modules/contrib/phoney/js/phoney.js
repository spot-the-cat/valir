(function (Drupal) {
  'use strict';

  /**
   * Attach the phoney behavior to rewrite the decrypted phone link into the DOM.
   */
  Drupal.behaviors.phoneyField = {
    attach: init
  };

  /**
   * Initialize the phone processing.
   *
   * @param object context
   *   The DOM to be processed.
   */
  function init(context) {
    var elements = context.querySelectorAll('[data-phone-to]');
    var clickable = context.querySelectorAll('[data-phone-click-link]');

    // If not elements run away.

    if (!elements) {
      return;
    }
    // Process clickable strings.

    if (clickable.length) {
      clickable.forEach(function (element) {
        element.addEventListener('click', function (event) {
          if (element.className.split(/\s+/).indexOf('link-processed') === -1) {
            event.preventDefault();
            setPhoneNumber(element);
            element.classList.add('link-processed');
          }
        });
      });
      return;
    }
    // Build an DOM node array and process it.

    NodeList.prototype.forEach = Array.prototype.forEach;

    elements.forEach(function (element) {
      setPhoneNumber(element);
    });

    /**
     * Decrypt the string by shifting each character's ASCII value by -19.
     *
     * @param string phone
     *   The encrypted phone number.
     *
     * @returns string
     *   And decrypted phone string.
     */
    function krypt(phone) {
      return phone.replace(/[a-zA-Z0-9]/g, function (c) {
        return String.fromCharCode((c.charCodeAt(0)  - 19));
      });
    }

    /**
     * Decrypt the string to a phone number.
     *
     * @param string phone
     *   The encrypted phone string.
     *
     * @returns string
     *   And decrypted phone number.
     */
    function normalizeEncryptPhone(phone) {
      return krypt(phone);
    }

    /**
     * Rewrite the phone link into the DOM.
     *
     * @param element
     *   An HTML element.
     */
    function setPhoneNumber(element) {
      var tel = normalizeEncryptPhone(element.getAttribute('data-phone-to'));

      element.removeAttribute('data-phone-to');
      element.removeAttribute('data-replace-inner');

      if (element.tagName === 'A') {
        element.setAttribute('href', 'tel:' + tel);
        element.innerHTML = '(' + tel.slice(0,3) + ') ' + tel.slice(3,6) + '-' + tel.slice(6);
      }
      return;
    }
  }
})(Drupal);
