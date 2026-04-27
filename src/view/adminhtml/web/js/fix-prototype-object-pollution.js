/*
 * Prototype.js (loaded as legacy-build.min) overrides Object.keys and Object.values
 * using a for-in loop without hasOwnProperty guards. Because Prototype.js also adds
 * enumerable methods to Object.prototype, Object.values() on any plain object returns
 * those inherited functions in addition to the object's own values — causing consumers
 * like Magewire's `get children()` to receive non-array values and produce undefined IDs.
 *
 * This module depends on 'prototype' to guarantee it runs after Prototype.js has loaded,
 * then restores Object.keys and Object.values to own-property-only behavior.
 */
define(['prototype'], function () {
    'use strict';

    Object.keys = function (obj) {
        var keys = [];

        for (var key in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, key)) {
                keys.push(key);
            }
        }

        return keys;
    };

    Object.values = function (obj) {
        var values = [];

        for (var key in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, key)) {
                values.push(obj[key]);
            }
        }

        return values;
    };
});
