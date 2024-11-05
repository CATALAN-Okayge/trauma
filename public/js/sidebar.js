function updateStatus() {
    const status = document.getElementById('status-selector').value;

    fetch('/update-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ estado: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Estado actualizado correctamente');
        }
    })
    .catch(error => console.error('Error al actualizar el estado:', error));
}
