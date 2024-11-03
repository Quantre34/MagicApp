/**
 *
 * Settings
 *
 * Settings page content scripts. Initialized from scripts.js file.
 *
 *
 */

class ProfileSettings {
  constructor() {
    this._initGenderSelect();
    this._initCategorySelect();
    this._initTreatmentSelect();
    this._initPaymentSelect();
    this._initBirthdayDatePicker();
    this._initStatusSelect();
    this._initParentSelect();
  }

  // Gender select2
  _initGenderSelect() {
    if (document.getElementById('genderSelect') !== null && jQuery().select2) {
        jQuery('#genderSelect').select2({minimumResultsForSearch: Infinity, placeholder: ''});
    }
  }
  _initParentSelect() {
    if (document.getElementById('ParentSelect') !== null && jQuery().select2) {
        jQuery('#ParentSelect').select2({minimumResultsForSearch: 3, placeholder: ''});
    }
  }
  _initCategorySelect() {
    if (document.getElementById('CategorySelect') !== null && jQuery().select2) {
        jQuery('#CategorySelect').select2({minimumResultsForSearch: 3, placeholder: ''});
    }
  }
  _initTreatmentSelect() {
    if (document.getElementById('TreatmentSelect') !== null && jQuery().select2) {
        jQuery('#TreatmentSelect').select2({minimumResultsForSearch: 3, placeholder: ''});
    }
  }
  _initStatusSelect() {
    if (document.getElementById('StatusSelect') !== null && jQuery().select2) {
        jQuery('#StatusSelect').select2({minimumResultsForSearch: Infinity, placeholder: ''});
    }
  }
  _initPaymentSelect() {
    if ( document.getElementById('PaymentSelect') !== null && jQuery().select2) {
        jQuery('#PaymentSelect').select2({minimumResultsForSearch: Infinity, placeholder: ''});
    }
  }
  // Birthday date picker
  _initBirthdayDatePicker() {
    if (document.getElementById('birthday') !== null && jQuery().datepicker) {
      jQuery('#birthday').datepicker({
        autoclose: true,
      });
    }
  }
}

