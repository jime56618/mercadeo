<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>agregarproducto</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a href="http://127.0.0.1:8000/home" class="navbar-brand "><span class="text-primary">car</span>world</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-start" arial-controls="navbar-start" arial-expanded="false" aria-label="toggle navigation">
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
     <div class="container d-flex justify-content-center align-items-center min-vh-100">


       <div class="row border rounded-5 p-3 bg-white shadow box-area">


       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #000000;">
           <div class="featured-image mb-3">
            <img src="" class="img-fluid" style="width: 450px;" id="imagenCompra">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;"> vende tus productos en carworld</small>
       </div> 
       <input type="hidden" value="{{$idCompra}}" id="idCompra">
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Detalle de compra</h2>
                </div>
                <div class="input-group mb-3" id="nombrecompra">
                    <h1>titulo de compra</h1>
                </div>
                <div class="input-group mb-3" id="precio">
                    
                    <h2>$00.00</h2>
                    
                </div>
                <div class="input-group mb-3" id="fecha">
                    
                    <p>fecha</p>
                </div>
              
                <div class="input-group mb-5 d-flex justify-content-between">
                
                </div>
                <div class="input-group mb-3">
                    <a href="http://127.0.0.1:8000/HistorialCompra"class="btn btn-lg btn-primary w-50 fs-6">Cerrar</a>
                </div>
            
          </div>
       </div> 

      </div>
    </div>
    <script>
          const idCompra=document.getElementById('idCompra').value;
        console.log(idCompra)
        fetch(`http://127.0.0.1:8000/api/compra/${idCompra}`)
        .then(res=>res.json())
        .then(response=>{
            console.log(response)
          document.getElementById('nombrecompra').innerHTML=`nombre: ${response.nombre_producto}`;
          document.getElementById('precio').innerHTML=`precio: ${response.precio}`;
          document.getElementById('fecha').innerHTML=`fecha: ${response.fechahora}`;
          document.getElementById('imagenCompra').setAttribute("src",response.imagen);
          

        

        })

    </script>
</body>
</html>