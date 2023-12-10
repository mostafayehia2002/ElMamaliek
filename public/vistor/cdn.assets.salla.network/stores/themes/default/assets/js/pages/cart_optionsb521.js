/*************************** merged duplicated options ids ***********/
function getServiceOptions(elements){

    var options = [];
    var checked_options = [];
    var radio_options = [];
    elements.each(function (_elem) {
        var _elem = $(this);
        // Push only the checkbox elements that maybe has duplicated ids !!
        if(_elem.is(':checkbox') && _elem.is(':checked')){
            checked_options.push({
                'id'   : _elem.attr('data-option-id'),
                'value': _elem.val()
            })
        }
         if(_elem.is(':radio') && _elem.is(':checked')){
            radio_options.push({
                'id'   : _elem.attr('data-option-id'),
                'value': _elem.val()
            })
        }

        // Push all other option types that has a value .
        // if ((_elem.is(':selected') || _elem.is(':text') || _elem.is("textarea") || _elem.hasClass('image-option')) && _elem.val()) {
        if (_elem.is(':selected') || (!_elem.is(':radio')  && !_elem.is('option') && !_elem.is(':checkbox') && _elem.val())) {
            options.push({
                'id'   : _elem.attr('data-option-id'),
                'value': _elem.val().trim()
            });
        }
    });

    // filter checkbox array , to make it contain unique ids !!
    checked_options.forEach(function(item) {
        var existing = options.filter(function(v) {
            return v.id === item.id;
        });
        if (existing.length) {
            var existingIndex = options.indexOf(existing[0]);
            options[existingIndex].value = options[existingIndex].value.concat(item.value);
        } else {
            if (typeof item.value == 'string')
                item.value = [item.value];
            options.push(item);
        }
    });
    radio_options.forEach(function(item) {
        var existing = options.filter(function(v) {
            return v.id === item.id;
        });
        if (existing.length) {
            var existingIndex = options.indexOf(existing[0]);
            options[existingIndex].value = options[existingIndex].value.concat(item.value);
        } else {
            if (typeof item.value == 'string')
                item.value = [item.value];
            options.push(item);
        }
    });
    return options
}
/********************************************************************/

function getDefaultOptions(formData) {
    $('.prod-options-list').each(function () {
        if($(this).is(':radio') && $(this).is(':checked')) {
            formData.append('options[]', $(this).val());
        }else if(!$(this).is(':radio') &&  $(this).val()){
            formData.append('options[]', $(this).val());
        }
    });

    return formData
}
