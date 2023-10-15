$(function() {
    'use strict';

    $('.tags').tagsInput({
        'width': '100%',
        'height': '75%',
        'interactive': true,
        'defaultText': 'Agregar',
        'removeWithBackspace': true,
        'minChars': 4,
        'maxChars': 4,
        'delimiter': [' '],
        'placeholderColor': '#666666'
    });
});