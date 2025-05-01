define([
    'mage/translate'
], function (uiRegistry, $t) {
    'use strict';

    window.addEventListener('magewire:flash-messages:dispatch', function (event) {
        console.log('WIP: flash messages support has not yet been build.', event.detail)
    });
});
