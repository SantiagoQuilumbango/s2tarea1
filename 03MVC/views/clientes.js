var init = () => {
    $("#frm_cliente").on("submit", (e) => {
        guardaryeditar(e);
    });
};

$().ready(() => {
    cargaTabla();
});

var cargaTabla = () => {
    $.get("../controllers/clientes.controller.php?op=todos", (listaClientes) => {
        try {
            var html = "";
            listaClientes = JSON.parse(listaClientes);
            $.each(listaClientes, (index, cliente) => {
                html += `<tr>
                          <td>${index + 1}</td>
                          <td>${cliente.Nombres}</td>
                          <td>${cliente.Direccion}</td>
                          <td>${cliente.Telefono}</td>
                          <td>${cliente.Cedula}</td>
                          <td>${cliente.Correo}</td>
                          <td>
                              <button class="btn btn-primary" onclick="editarCliente(${cliente.idClientes})">Editar</button>
                              <button class="btn btn-danger" onclick="eliminarCliente(${cliente.idClientes})">Eliminar</button>
                          </td>
                        </tr>`;
            });
            $("#cuerpoClientes").html(html);
        } catch (e) {
            console.error("Error al procesar los datos:", e);
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    });
};

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#frm_cliente")[0]);
    $.ajax({
        url: "../controllers/clientes.controller.php?op=" + (formData.get("idClientes") ? "actualizar" : "insertar"),
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            $("#frm_cliente")[0].reset();
            $("#modal").modal("hide");
            cargaTabla();
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", xhr.responseText);
        }
    });
};

var editarCliente = (id) => {
    $.post("../controllers/clientes.controller.php?op=uno", { idClientes: id }, (data) => {
        try {
            var cliente = JSON.parse(data);
            $("#idClientes").val(cliente.idClientes);
            $("#Nombres").val(cliente.Nombres);
            $("#Direccion").val(cliente.Direccion);
            $("#Telefono").val(cliente.Telefono);
            $("#Cedula").val(cliente.Cedula);
            $("#Correo").val(cliente.Correo);
            $("#modal").modal("show");
        } catch (e) {
            console.error("Error al procesar los datos del cliente:", e);
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    });
};

var eliminarCliente = (id) => {
    if (confirm("¿Estás seguro de eliminar este cliente?")) {
        $.post("../controllers/clientes.controller.php?op=eliminar", { idClientes: id }, (data) => {
            if (data == 1) {
                cargaTabla();
            } else {
                console.error("Error al eliminar: " + data);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
        });
    }
};

init();
