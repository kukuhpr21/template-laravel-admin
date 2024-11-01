<div x-data="{open: false}" x-show="open"
    @sweet-alert-notif.window="
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
    }});
    Toast.fire({
        icon: event.detail.icon,
        title: event.detail.title
    });
    ">
</div>

<div x-data="{open: false}" x-show="open"
    @sweet-alert-modal-confirm.window="
    const detail = event.detail;
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'mx-2 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none',
        cancelButton: 'mx-2 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none'
    },
    buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
    title: detail.title,
    text: detail.text,
    icon: detail.icon,
    showCancelButton: true,
    showCloseButton: true,
    confirmButtonText: detail.confirmtext,
    cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = detail.confirmlink;
        }
    });
    ">

</div>
