$(document).ready(function () {
  $(".jqueryMask").mask("(00) 00000-0000");
  $(".editarCliente").on("click", function (e) {
    let idCliente = $(this).closest("tr").find('input[name="id_editar"]').val();

    $.ajax({
      url: "ajax_buscar.php",
      method: "GET",
      data: { id: idCliente },
      success: function (response) {
        let cliente = JSON.parse(response);
        $("#nomeE").val(cliente.username);
        $("#emailE").val(cliente.email);
        $("#contatoE").val(cliente.contact);
        $("#IdS").val(cliente.id);
        $("#editarCliente").modal("show");
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });
});
