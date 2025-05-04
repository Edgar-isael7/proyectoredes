$(document).ready(function () {
    let tablausuarios;
    let Id;
    let opcion;
    let fila;

    tablausuarios = $("#tablausuarios").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
        }],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando..."
        }
    });

    // Botón NUEVO
    $("#btnNuevo").click(function () {
        $("#formusuarios").trigger("reset");
        $(".modal-header").css("background-color", "#1cc88a");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nueva Persona");

        $("#modalCRUD").modal("show");
        Id = null;
        opcion = 1; // alta
    });

    // Botón EDITAR
    $(document).on("click", ".btnEditar", function () {
        fila = $(this).closest("tr");
        Id = parseInt(fila.find('td:eq(0)').text());
        let Usuario = fila.find('td:eq(1)').text();
        let Clave = fila.find('td:eq(2)').text();
        let correo = fila.find('td:eq(3)').text();

        $("#Usuario").val(Usuario);
        $("#Clave").val(Clave);
        $("#correo").val(correo);

        opcion = 2; // editar

        $(".modal-header").css("background-color", "#4e73df");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Persona");
        $("#modalCRUD").modal("show");
    });

    // Botón BORRAR
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        Id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; // borrar
        let respuesta = confirm("¿Está seguro de eliminar el registro: " + Id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, Id: Id },
                success: function () {
                    tablausuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    // FORMULARIO GUARDAR
    $("#formusuarios").submit(function (e) {
        e.preventDefault();
        let Usuario = $.trim($("#Usuario").val());
        let Clave = $.trim($("#Clave").val());
        let correo = $.trim($("#correo").val());

        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "JSON",
            data: { Usuario: Usuario, correo: correo, Clave: Clave, Id: Id, opcion: opcion },
            success: function (data) {
                console.log(data);
                Id = data[0].Id;
                Usuario = data[0].Usuario;
                Clave = data[0].Clave;
                correo = data[0].correo;

                if (opcion == 1) {
                    tablausuarios.row.add([Id, Usuario, Clave, correo]).draw();
                } else {
                    tablausuarios.row(fila).data([Id, Usuario, Clave, correo]).draw();
                }
            }
        });
        $("#modalCRUD").modal("hide");
    });
});
