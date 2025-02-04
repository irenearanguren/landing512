
    document.addEventListener('DOMContentLoaded', function() {
        const getProductsButton = document.getElementById('getProductsButton');
        const productosTable = document.getElementById('productos');
    
        if (getProductsButton && productosTable) {
            getProductsButton.addEventListener('click', function() {
                fetch('/cliente/dashboard', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud');
                    }
                    return response.json();
                })
                .then(data => {
                    const productos = data.products;
                    const tablaCatalogo = document.getElementById('tabla-catalogo');
                    tablaCatalogo.innerHTML = ''; 
    
                    productos.forEach(producto => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${producto.name}</td>
                            <td>${producto.description}</td>
                            <td>${producto.price}</td>
                        `;
                        tablaCatalogo.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        }
    });
