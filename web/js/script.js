function confirmDelete(id, first_name, last_name) {
    if (confirm(`¿Quieres eliminar al empleado ${first_name} ${last_name}?`)) {
        document.location.href = "?order=Delete&id="+id;
    }
}