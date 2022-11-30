import Swal from 'sweetalert2'
document.addEventListener('DOMContentLoaded', event => {
    Livewire.on('paintingDeleted', e => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Pintura eliminado',
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            background: '#34d399',
            color: '#4b5563'
        });
    });
});