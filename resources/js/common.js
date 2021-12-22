$(function() {
    initSummerNote();
});

function initSummerNote() {
    $('#summernote').summernote({
        placeholder: 'Write something nice..',
        tabsize: 2,
        height: 250,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
}

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function fireSuccessAlert(message) {
    Toast.fire({
        icon: 'success',
        title: message
    })
}
window.fireSuccessAlert = fireSuccessAlert

function fireErrorAlert(error) {
    Toast.fire({
        icon: 'error',
        title: error
    })
}
window.fireErrorAlert = fireErrorAlert
