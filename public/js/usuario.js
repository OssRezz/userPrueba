$(function () {


    $(document).on('click', (e) => {
        if (e.target.id === "btn-editar-usuario") {
            const id = e.target.value;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "usuarios/edit",
                type: "POST",
                data: {
                    id: id,
                },
                success: function (result) {
                    $("#respuesta").html(result);
                },
            });
        } else if (e.target.id === "btn-actualizar-usuario") {
            const id = e.target.value;
            const primerNombre = $('#primerNombreUpdate').val();
            const segundoNombre = $('#segundoNombreUpdate').val();
            const primerApellido = $('#primerApellidoUpdate').val();
            const segundoApellido = $('#segundoApellidoUpdate').val();
            const fkTipoDocumento = $('#tipoDocumentoUpdate').val();
            const documento = $('#documentoUpdate').val();
            const correo = $('#correoUpdate').val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "usuarios/update",
                type: "POST",
                data: {
                    id: id,
                    primerNombre: primerNombre,
                    segundoNombre: segundoNombre,
                    primerApellido: primerApellido,
                    segundoApellido: segundoApellido,
                    fkTipoDocumento: fkTipoDocumento,
                    documento: documento,
                    correo: correo

                },
                success: function (result) {
                    $("#respuesta").html(result);
                },
            });
        }
    })
})