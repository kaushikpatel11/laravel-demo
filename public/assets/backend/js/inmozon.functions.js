/**
 * Remove some input fields that are not necessary to submit.
 *
 * @param fieldIds, input field id objects (array)
 */
function removeFields(fieldIds) {
    fieldIds.forEach(function (field) {
        let element = document.getElementById(field);
        if(element.parentNode) {
            // IE doesn't support remove() native Javascript function but does support removeChild().
            // http://www.webdeveloper.com/forum/showthread.php?125037-replaceChild-throws-and-invalid-argument-error-in-IE
            element.parentNode.removeChild(element, element);
        }

    });
}
