<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    Nuevo Producto
                </button>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Producto</th>
                <th>Código de Barras</th>
                <th>Graba IVA</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="cuerpoProductos"></tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frm_producto">
                    <div class="modal-body">
                        <input type="hidden" name="idProductos" id="idProductos">
                        <div class="form-group">
                            <label for="Nombre_Producto">Nombre Producto</label>
                            <input type="text" class="form-control" name="Nombre_Producto" id="Nombre_Producto">
                        </div>

                        <div class="form-group">
                            <label for="Codigo_Barras">Código de Barras</label>
                            <input type="text" class="form-control" name="Codigo_Barras" id="Codigo_Barras">
                        </div>

                        <div class="form-group">
                            <label for="Graba_IVA">Graba IVA</label>
                            <select class="form-control" name="Graba_IVA" id="Graba_IVA">
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./productos.js"></script>

</body>

</html>



