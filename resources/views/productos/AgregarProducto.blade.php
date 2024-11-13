<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Agregar Producto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand span {
            color: #4a90e2;
            font-weight: bold;
        }
        .left-box {
            background-color: #010304;
        }
        .left-box img {
            width: 100%;
            max-width: 450px;
            border-radius: 15px;
        }
        .left-box p {
            font-size: 2.5rem;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: white;
        }
        .left-box small {
            font-size: 1rem;
            font-family: 'Courier New', Courier, monospace;
            color: white;
            text-align: center;
            width: 17rem;
        }
        .right-box h2 {
            font-size: 2rem;
            font-weight: bold;
        }
        .right-box .form-control {
            border-radius: 10px;
        }
        .right-box .btn-primary {
            background-color: #4a90e2;
            border-radius: 10px;
        }
        .right-box .btn-primary:hover {
            background-color: #357ABD;
        }
        .box-area {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a href="http://127.0.0.1:8000/home" class="navbar-brand"><span>car</span>world</a>
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
                    <li class="nav-item">
                        <a href="http://127.0.0.1:8000/ListadoUsuario" class="nav-link active">listado de usarios</a>
                    </li>
    
                </ul>
                <div class="d-flex ms-3" >
                    <input class="form-control me-2" type="search" id="filtro" placeholder="Buscar productos..." aria-label="Search" name="query">
                    <button class="btn btn-outline-primary" type="button" onclick="filtrar()">Buscar</button>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>




    

    <form method="POST" id="formularioAgregarProducto">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                
                
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image mb-3">
                        <img src="{{ asset('assets/car1.jpg') }}" class="img-fluid" alt="Car Image">
                    </div>
                    <p class="fs-2">Car World</p>
                    <small>Vende tus productos en CarWorld de manera rápida y sencilla.</small>
                </div>
                
            
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Agrega un nuevo producto</h2>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Descripción" name="descripcion" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="dropify" name="imagen" data-height="100" id="imagen_producto"/>
                        </div>
                                             </div>
                        <div class="input-group mb-3">
                            <input type="number" step="0.01" class="form-control form-control-lg bg-light fs-6" placeholder="Precio" name="precio" required>
                        </div>

                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Agregar</button>
                            <button type="button" onclick="resetForm()">Reset</button> 
                            
                            
                        </div>
                    </div>
                </div> 
                <br>
                
                
            </div>
        </div>
    </form>

    <div class="container mt-5 pt-5">
        <h1 class="text-center mb-4">Productos</h1>

        
        <div class="row" id="seccion_productos">
       
        
        </div>

       
        <div class="text-center mt-5">
            <a href="http://127.0.0.1:8000/home" class="btn btn-primary btn-lg">cerrar</a>
            
        </div>

    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>
    $('.dropify').dropify();


fetch('http://127.0.0.1:8000/api/products')
        .then(res=>res.json())
        .then(response=>{
            console.log(response)
            let htmlcard="";
            response.forEach(element => {
                console.log(element.nombre)

                htmlcard+=`
                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card bg-light shadow-sm border-0 h-100">
                        <div class="text-center p-3">
                            <img src="${element.imagen}" class="img-fluid" alt="Producto 2">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${element.nombre}</h5>
                            <p class="card-text">${element.descripcion}</p>
                             <p>$${element.precio}</p>
                             <div class="d-grid gap-2 d-md-block">

                                
                                  <a href="EditarProducto/${element.idProducto}" class="btn btn-primary ">editar</a>
                                  <a href="#" onclick="borrar(${element.idProducto})" class="btn btn-primary">borrar</a>

                            </div>
                        </div>
                    </div>
                </div>
                `
            });

            document.getElementById('seccion_productos').innerHTML=htmlcard
        })

        function borrar(idProducto){
            Swal.fire({
            title: "¿estas seguro?",
            text: "este producto se eliminara",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "si,eliminar!"
            }).then((result) => {
            if (result.isConfirmed) {
                fetch(http://127.0.0.1:8000/api/product/${idProducto}, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })

                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title: "Producto eliminado",
                            text: "El producto se ha eliminado exitosamente.",
                            icon: "success"
                        });
                        // This will reload the current page

                        window.location.href="http://127.0.0.1:8000/home"

                    })
            }
            });
       
    }
    const formulario=document.getElementById('formularioAgregarProducto');

    formulario.addEventListener('submit',function(e){
        e.preventDefault();
        
        const file_product=imagen_producto.files[0];
      
        const formData = new FormData(this);
        formData.append('imagen',file_product);
        console.log(formData);


    
    fetch('http://127.0.0.1:8000/api/productoagregar', {
        method: 'POST',
        //headers: {
          //  'Content-Type': 'application/json',
        //},
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        
        Swal.fire({
            title: "Producto agregado",
            text: "se agrego correctamente",
            icon: "success"
        });
        window.location.href="http://127.0.0.1:8000/AgregarProducto"
        
    })
  

    })

    
    function filtrar(){
   const filtro= document.getElementById('filtro').value

   fetch(http://127.0.0.1:8000/api/products?filtro=${filtro})
        .then(res=>res.json())
        .then(response=>{
            console.log(response)
            let htmlcard="";
            response.forEach(element => {
                console.log(element.nombre)

                htmlcard+=`
                  <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card bg-light shadow-sm border-0 h-100">
                        <div class="text-center p-3">
                            <img src="${element.imagen}" class="img-fluid" alt="Producto 2">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${element.nombre}</h5>
                            <p class="card-text">${element.descripcion}</p>
                             <p>$${element.precio}</p>
                            <a href="DetalleProducto/${element.idProducto}" class="btn btn-primary">Comprar</a>
                        
                        </div>
                    </div>
                </div>
                `
            });

            document.getElementById('seccion_productos').innerHTML=htmlcard
        })
 }

</script>
    

</body>
</html>