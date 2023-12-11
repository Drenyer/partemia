window.obtenerFechaHoraDocumento = function(elemento) {
    // Obtener el timestamp del \_id del documento
    const timestamp = elemento.dataset.timestamp;
  
    // Convertir el timestamp a una fecha y hora 
    const fechaHora = new Date(timestamp);

    console.log("Ejecutando la función");
    console.log(timestamp);
    // Devolver la fecha y hora formateada
    return fechaHora.toDateString(); 
  }
