$('#form').parsley({
    errorClass: 'is-invalid text-red',
    successClass: 'is-valid',
    errorsWrapper: '<span class="invalid-feedback"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change'
});

// ===== sweetalert2 =====
// ===== alert success =====
let flashSuccess = $('.flash-success').data('flashdata')

if (flashSuccess) {
    Swal.fire({
        // position: 'top-end',
        icon: 'success',
        title: 'Success',
        text: flashSuccess,
        showConfirmButton: false,
        timer: 2000
    })
}

// ===== alert error =====
let flashError = $('.flash-error').data('flashdata')

if (flashError) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: flashError,
    })
}

// ===== alert confirm =====
$('.btn-delete').on('click', function (e) {

    e.preventDefault();

    Swal.fire({
        title: 'Anda Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = $(this).attr('href')
        }
    })
})

// ===== end sweetalert2 =====

// =====  preview image before upload =====
$('#upload').on('change', function (event) {
    $('#preview').attr('src', URL.createObjectURL(event.target.files[0]))
})
$('#upload-2').on('change', function (event) {
    $('#preview-2').attr('src', URL.createObjectURL(event.target.files[0]))
})
$('#upload-3').on('change', function (event) {
    $('#preview-3').attr('src', URL.createObjectURL(event.target.files[0]))
})
// ===== end preview image before upload =====

// ===== data table =====
$('#data-table').DataTable();

$('#export-table').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
// ===== end data table =====