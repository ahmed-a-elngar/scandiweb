$(".delete-checkbox").on("change", function () {
  if ($(this).is(":checked")) {
    $(this).parents(".card-body").addClass("bg-light");
  } else {
    $(this).parents(".card-body").removeClass("bg-light");
  }
});

$("#delete_products").on("click", function () {
  if ($(".delete-checkbox:checked").length > 0) {
    $("#delete_form").submit();
  }
});

$("#productType").on("change", function () {
  $(".measurements").addClass("hidden");

  let container = $(this).children("option:selected").data("container"),
    info = $(this).children("option:selected").data("info");

  $("." + container).removeClass("hidden");
  $("#info").text(info ?? " ");
});

$("#product_form").on("submit", function (e) {
  if (!isProductValid()) {
    e.preventDefault();
  }
});

function isProductValid() {
  let status = true;

  if ($("#sku").val().trim().length < 1) {
    raiseValidateError("#sku", "please, enter the sku");
    status = false;
  }

  if ($("#name").val().trim().length < 1) {
    raiseValidateError("#name", "please, enter the name");
    status = false;
  }

  if ($("#price").val().trim().length < 1) {
    raiseValidateError("#price", "please, enter the price");
    status = false;
  }

  let type = $("#productType").val();

  if (type < 1) {
    raiseValidateError("#productType", "please, choose the type");
    status = false;
  } else if (type == 1 && $("#size").val().trim().length < 1) {
    raiseValidateError("#size", "please, enter the size");
    status = false;
  } else if (type == 2 && $("#weight").val().trim().length < 1) {
    raiseValidateError("#weight", "please, enter the weight");
    status = false;
  } else if (type == 3) {
    if ($("#height").val().trim().length < 1) {
      raiseValidateError("#height", "please, enter the height");
      status = false;
    }
    if ($("#width").val().trim().length < 1) {
      raiseValidateError("#width", "please, enter the width");
      status = false;
    }
    if ($("#length").val().trim().length < 1) {
      raiseValidateError("#length", "please, enter the length");
      status = false;
    }
  }

  return status;
}

function raiseValidateError(delimiter, msg) {
  $(delimiter).after("<p class='text-danger validate_error'>" + msg + "</p>");
}

$(document).on("change", function () {
  $(".validate_error").remove();
});

$("#submit_new_product_form").on("click", function () {
  $("#product_form").submit();
});
