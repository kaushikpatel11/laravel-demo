<script>

    /*
     * ZONES and LOCATIONS SELECTS
     *
     * Every select is depending on the previous select value (states depend on the selected country)
     * The value of every select are loaded by ajax
     *
     * countries -> states -> counties -> cities
     *
     * To avoid asynchronous calls, it has the parameter ASYNC to FALSE
     * It allows to wait the ajax call and pouring the selects with the response data before continue with the following command.
     *
     * Every select in the tab for location or zone has these html5 attributes
     * id="zone_country"
     * data-related_select_id="#zone_state"    // The following select
     * data-url="url('state_ajax')"            // The ajax url to fill the following select
     * data-action="getCountryStates"          // The method in the ajax controller which returns the values
     *
     */
    jQuery("select[name$=country_id], select[name$=state_id], select[name$=county_id]").focus( function () {
        // https://stackoverflow.com/questions/4076770/getting-value-of-select-dropdown-before-change
        // Store the current value on focus and on change
        // previous = this.value;
    }).change(function() {
        let item_id = jQuery(this).attr('id');
        let related_select_id = jQuery(this).data('related_select_id');
        let url = jQuery(this).data('url');
        let action = jQuery(this).data('action');
        let item_value = jQuery(this).val();

        jQuery.ajax({
            type: 'post',
            async: false,  // avoid asynchronous calls. It waits upto the ajax call finishes
            url: url,
            data: {
                action: action,
                item_id: item_value,
            },
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                if (false == response.success) {
                    swal.fire({
                        title: "Error",
                        text: response.response.error.message,
                        type: "error",
                        confirmButtonClass: "btn btn-secondary"
                    });
                } else {
                    if (true == response.success) {
                        jQuery(related_select_id).removeClass('d-none');

                        let dropdown = jQuery(related_select_id);
                        dropdown
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="-1">Todos</option>');

                        jQuery.each(response.response, function (key, value) {
                            dropdown.append(jQuery("<option />").val(value.id).text(value.name));
                        });

                        jQuery(related_select_id).addClass('d-inline');
                    }
                }
            }
        });
    });

</script>
