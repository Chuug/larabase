/* --------------------------------- Toasts --------------------------------- */

let checkToast = document.querySelector('.toast');

if(checkToast) {
    let toast = new bootstrap.Toast(checkToast);
    toast.show();
}