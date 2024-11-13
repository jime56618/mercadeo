<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .product-card {
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .product-img {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            object-fit: cover;
            height: 300px;
            width: 100%;
        }
        .card-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            font-size: 1rem;
        }
        .price-tag {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
        }
        .btn-primary, .btn-outline-secondary {
            border-radius: 50px;
            padding: 10px 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-outline-secondary {
            border-color: #6c757d;
        }
    </style>
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
        <a href="home" class="navbar-brand"><span class="text-primary">car</span>world</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-start" aria-controls="navbar-start" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-start">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8000/AgregarProducto" class="nav-link active">Agregar producto</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8000/HistorialCompra" class="nav-link active">Historial de compras</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>

<br>
<br>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card product-card">
                    <img src="" alt="Producto" class="product-img" id="imagenProducto">
                    <div class="card-body text-center">
                        <input type="hidden" value="{{$idProducto}}" id="idProducto">
                        <h2 class="card-title" >Detalle del Producto</h2>
                        <h3 class="my-3"id="tituloProducto" >Rines Deportivos </h3>
                        <p class="card-text" id="descripcionProducto">Encuentra los mejores rines deportivos para darle a tu auto un estilo único. Fabricados con materiales de alta calidad para garantizar durabilidad y rendimiento.</p>
                        <p class="price-tag my-3" id="precioProducto">$95.00</p>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-primary" onclick="comprar()">Comprar</a>
                            <a href="http://127.0.0.1:8000/home" class="btn btn-outline-secondary">Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const idProducto=document.getElementById('idProducto').value;
        let nombre,precio,imagen;
        console.log(idProducto)
        fetch(`http://127.0.0.1:8000/api/product/${idProducto}`)
        .then(res=>res.json())
        .then(response=>{
            console.log(response)
            nombre=response.nombre
            precio=response.precio
            imagen=response.imagen

          document.getElementById('tituloProducto').innerHTML=`nombre: ${nombre}`;
          document.getElementById('descripcionProducto').innerHTML=response.descripcion;
          document.getElementById('precioProducto').innerHTML=precio;
          document.getElementById('imagenProducto').setAttribute("src",imagen);

    })

    function comprar() {
            const data = {
                "nombre": "Nombre del Producto",
                "imagen": "URL de la imagen",
                "precio": 95.00
            };

            fetch('http://127.0.0.1:8000/api/comprasagregar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: "Compra exitosa",
                    text: "Su compra se realizó exitosamente",
                    icon: "success"
                });
                console.log('success:', data);
            })
            .catch(error => console.error("Error:", error));
        }
    
    </script>
</body>
</html>

