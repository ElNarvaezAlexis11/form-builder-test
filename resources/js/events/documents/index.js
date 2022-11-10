document.addEventListener('DOMContentLoaded', event => {
    Livewire.on('documentDeleted', e => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Documento eliminado',
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            background: '#34d399',
            color: '#4b5563'
        });
    });
});