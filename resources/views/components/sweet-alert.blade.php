<div x-data="{open: false}"
    x-show="open"
    @sweet-alert.window="
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
