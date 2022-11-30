import Swal from 'sweetalert2'
document.addEventListener('DOMContentLoaded', event => {
    Livewire.on('book-deleted', e => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Libro eliminado',
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            background: '#34d399',
            color: '#4b5563'
        });
    });
});


