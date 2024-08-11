var init = () => {
    $("#frm_producto").on("submit", (e) => {
        guardaryeditar(e);
    });
};

$().ready(() => {
    cargaTabla();
});

var cargaTabla = () => {
    $.get("../controllers/productos.controller.php?op=todos", (listaProductos) => {
        var html = "";
        listaProductos = JSON.parse(listaProductos);
        $.each(listaProductos, (index, producto) => {
            html += `<tr>
                      <td>${index + 1}</td>
                      <td>${producto.Nombre_Producto}</td>
                      <td>${producto.Codigo_Barras}</td>
                      <td>${producto.Graba_IVA}</td>
                      <td>
                          <button class="btn btn-primary" onclick="editarProducto(${producto.idProductos})">Editar</button>
                          <button class="btn btn-danger" onclick="eliminarProducto(${producto.idProductos})">Eliminar</button>
                      </td>
                    </tr>`;
        });
        $("#cuerpoProductos").html(html);
    });
};

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_producto")[0]);
    $.ajax({
        url: "../controllers/productos.controller.php?op=" + (formData.get("idProductos") ? "actualizar" : "insertar"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            $("#frm_producto")[0].reset();
            $("#modal").modal("hide");
            cargaTabla();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
};

var editarProducto = (id) => {
    $.post("../controllers/productos.controller.php?op=uno", { idProductos: id }, (data) => {
        var producto = JSON.parse(data);
        $("#idProductos").val(producto.idProductos);
        $("#Nombre_Producto").val(producto.Nombre_Producto);
        $("#Codigo_Barras").val(producto.Codigo_Barras);
        $("#Graba_IVA").val(producto.Graba_IVA);
        $("#modal").modal("show");
    });
};

var eliminarProducto = (id) => {
    if (confirm("¿Estás seguro de eliminar este producto?")) {
        $.post("../controllers/productos.controller.php?op=eliminar", { idProductos: id }, (data) => {
            if (data == 1) {
                cargaTabla();
            } else {
                console.error("Error al eliminar: " + data);
            }
        });
    }
};

init();

