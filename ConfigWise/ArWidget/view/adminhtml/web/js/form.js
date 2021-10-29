define(['jquery'], function ($) {
    var testShowHide = {
        showHideAttr: function () {
            var action = $('[name="product[product_attribute_use]"]').val();
            console.log(action);
            if (action == 1) {
                this.showFields('div[data-index="product_custom_id"]');
                this.showFields('div[data-index="channel_id"]');
                this.showFields('div[data-index="domain"]');
                this.showFields('div[data-index="company_reference_number"]');
            }
            else {
                this.hideFields('div[data-index="product_custom_id"]');
                this.hideFields('div[data-index="channel_id"]');
                this.hideFields('div[data-index="domain"]');
                this.hideFields('div[data-index="company_reference_number"]');
            }
        },

        hideFields: function (names) {
            $(names).toggle(false);
        },

        showFields: function (names) {
            $(names).toggle(true);
        }
    };
    return testShowHide;
});