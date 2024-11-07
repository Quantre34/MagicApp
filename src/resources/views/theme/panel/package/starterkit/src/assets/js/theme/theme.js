document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  //=====================================
  // Theme Onload Toast
  //=====================================
  window.addEventListener("load", () => {
    let myAlert = document.querySelectorAll('.toast')[0];
    if (myAlert) {
      let bsAlert = new bootstrap.Toast(myAlert);
      bsAlert.show();
    }
  })

  // =================================
  // Tooltip
  // =================================
  const tooltipTriggerList = Array.from(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  tooltipTriggerList.forEach((tooltipTriggerEl) => {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // =================================
  // Popover
  // =================================
  var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
  );
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });
  // =================================
  // Hide preloader
  // =================================
  var preloader = document.querySelector(".preloader");
  if (preloader) {
    preloader.style.display = "none";
  }
});
