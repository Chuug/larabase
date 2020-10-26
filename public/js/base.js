/* --------------------------------- Toasts --------------------------------- */

let checkToast = document.querySelector('.toast');

if(checkToast) {
    let toast = new bootstrap.Toast(checkToast);
    toast.show();
}

/* ------------------------------ Init tooltips ----------------------------- */

let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'));

tooltipTriggerList.forEach(function(tooltip){
    return new bootstrap.Tooltip(tooltip);
})