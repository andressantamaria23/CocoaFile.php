function verContrato(tipoContrato) {
    
    if (tipoContrato === 'contrato_comercial') {
        window.location.href = '../contrato_c/contratocomercial.html'; 
    }
    if (tipoContrato === 'contrato_laboral') {
        window.location.href = '../contrato_L/contratolaboral.html'; 
    } else if (tipoContrato === 'ordenes_compra') {
        window.location.href = '../orden_compra/ordenesdecompra.html'; 
    } else if (tipoContrato === 'capacitaciones') {
        window.location.href = '../capacitaciones/capacitaciones.html'; 
    }
    
}
