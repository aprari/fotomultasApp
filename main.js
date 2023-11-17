$(document).ready(function () {
  $("#version-id").change(function () {
    var idVersion = $("#version-id").val();

    $.ajax({
      url: "obtener_categoria.php",
      type: "POST",
      data: { id_versiones: idVersion },
      success: function (response) {
        $("#category").val(response);
      },
    });
  });

  // agregar registro
  $("#agregar").click(function () {
    var versionId = $("#version-id").val();
    var categoria = $("#category").val();

    if (versionId.trim() != "" && categoria.trim() != "") {
      $.ajax({
        url: "insertar_registro.php",
        type: "POST",
        data: { id_versiones: versionId, categoria: categoria },
        success: function (response) {
          $("#registros").append(response);
          alert("Registro agregado exitosamente.");
          limpiarFormulario();
        },
        error: function (response) {
          alert(
            "Ha habido un error al agregar el registro. Por favor, inténtelo de nuevo más tarde."
          );
        },
      });
    } else {
      alert("Ambos campos son requeridos.");
    }
  });

  // eliminar registro
  $("#eliminar").click(function () {
    var versionId = $("#version-id").val();

    if (versionId.trim() != "") {
      $.ajax({
        url: "eliminar_registro.php",
        type: "POST",
        data: { id_versiones: versionId },
        success: function (response) {
          console.log("La respuesta del servidor es:", response);
          $("#registros tr").each(function () {
            var currentRow = $(this);
            if (currentRow.find("td:eq(0)").text() == versionId) {
              currentRow.remove();
              alert("Registro eliminado exitosamente.");
              limpiarFormulario();
            }
          });
        },
        error: function (response) {
          alert(
            "Ha habido un error al eliminar el registro. Por favor, inténtelo de nuevo más tarde."
          );
        },
      });
    } else {
      alert("El campo ID de versión es requerido.");
    }
  });

  // actualizar registro
  $("#actualizar").click(function () {
    var versionId = $("#version-id").val();
    var categoria = $("#category").val();

    if (versionId.trim() != "" && categoria.trim() != "") {
      $.ajax({
        url: "actualizar_registro.php",
        type: "POST",
        data: { id_versiones: versionId, categoria: categoria },
        success: function (response) {
          $("#registros tr").each(function () {
            var currentRow = $(this);
            if (currentRow.find("td:eq(0)").text() == versionId) {
              currentRow.find("td:eq(1)").text(categoria);
            }
          });
          alert("Registro actualizado exitosamente.");
          limpiarFormulario();
        },
        error: function (response) {
          alert(
            "Ha habido un error al actualizar el registro. Por favor, inténtelo de nuevo más tarde."
          );
        },
      });
    } else {
      alert("Ambos campos son requeridos.");
    }
  });

  // limpiar formulario
  function limpiarFormulario() {
    $("#version-id").val("");
    $("#category").val("");
  }

  $("#buscar").click(function () {
    var versionId = $("#version-id").val();

    if (versionId.trim() != "") {
      $.ajax({
        url: "obtener_categoria.php",
        type: "POST",
        data: { id_versiones: versionId },
        success: function (response) {
          $("#category").val(response);
          alert("Categoría encontrada.");
        },
        error: function (response) {
          alert(
            "El ID ingresado no corresponde a ninguna versión de auto registrada."
          );
          $("#category").val("");
        },
      });
    } else {
      alert("El campo ID de versión es requerido.");
    }
  });
});
