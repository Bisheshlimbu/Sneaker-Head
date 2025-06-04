$(document).ready(function () {
  $(".edit-product-btn").on("click", function () {
    $(".edit-form-container").removeClass("hide");
    //get the data attr
    var product_id = $(this).data("product_id");
    var product_title = $(this).data("product_title");
    var product_price = $(this).data("product_price");
    var product_desc = $(this).data("product_desc");
    var product_category = $(this).data("product_category");
    var product_brand = $(this).data("product_brand");
    var product_type = $(this).data("product_type");
    var product_size = $(this).data("product_size");
    // console.log(product_size)
    // const converted_size = [product_size.join("-")];
    if (product_size == null) {
      product_size = [];
    } else if (!Array.isArray(product_size)) {
      product_size = String(product_size).split(",");
    }

    const converted_size = [product_size.join("-")];
    // console.log(product_id);
    // console.log(product_title);
    // console.log(product_desc);
    // console.log(product_category);
    // console.log(product_brand);
    // console.log(product_type);
    // console.log(converted_size);

    $("#title").val(product_title);
    $("#price").val(product_price);
    $("#size").val(converted_size);
    $("#description").val(product_desc);
    $("#category").val(product_category).trigger("change");
    $("#brand").val(product_brand).trigger("change");
    $("#type").val(product_type).trigger("change");
    $("#product_id").val(product_id);
  });
  $("#close-edit-form").on("click", function () {
    $(".edit-form-container").addClass("hide");
  });

  //validate the size
  document.getElementById("size").addEventListener("input", function () {
    const sizeInput = this.value;
    const errorMsg = document.getElementById("size-error");
    const addBtn = document.querySelector("#create_product_btn");

    // Check for invalid characters: only numbers and single hyphens allowed
    if (!/^[0-9\-]*$/.test(sizeInput)) {
      errorMsg.textContent = "Only numbers and hyphens (-) are allowed.";
      return;
    }

    // Check for double hyphens
    if (sizeInput.includes("--")) {
      errorMsg.textContent = "Double hyphens (--) are not allowed.";
      addBtn.setAttribute("disabled", true);
      addBtn.style.cursor = "not-allowed";
      return;
    }

    // Validate individual sizes
    const sizes = sizeInput.split("-");
    for (let size of sizes) {
      if (size === "") {
        errorMsg.textContent =
          "Each size must be a number. No empty values allowed.";
        addBtn.setAttribute("disabled", true);
        addBtn.style.cursor = "not-allowed";

        return;
      }

      const num = parseInt(size);
      if (isNaN(num) || num < 30 || num > 45) {
        errorMsg.textContent = "Sizes must be numbers from 30 to 45.";
        addBtn.setAttribute("disabled", true);
        addBtn.style.cursor = "not-allowed";

        return;
      }
    }

    // If all checks pass
    addBtn.removeAttribute("disabled");
    addBtn.style.cursor = "";
    errorMsg.textContent = "";
  });

  //update product details
  $("#update_product_form").on("submit", function (e) {
    e.preventDefault();

    var id = $("#product_id").val().trim();
    var title = $("#title").val().trim();
    var price = $("#price").val();
    var size = $("#size").val();
    var desc = $("#description").val();
    var category = $("#category").val();
    var brand = $("#brand").val();
    var type = $("#type").val();
    let converted_size = size.split("-").map(Number);

    let data = {
      id: id,
      title: title,
      price: price,
      size: converted_size,
      desc: desc,
      category: category,
      brand: brand,
      type: type,
      action: "update_product",
    };
    $.ajax({
      type: "POST",
      url: "http://sneaker-head.local/main/pages/ajax-request.php",
      data: data,
      success: function (response) {
        console.log(response);
        if (response.status === "success") {
          $("#update_product_message").html(response.message);
          $("#update_product_message").removeClass("error-message");
          $("#update_product_message").addClass("success-message");
          setTimeout(function () {
            $("#update_product_message").html("");
            $("#update_product_message").removeClass("error-message");
            $("#update_product_message").removeClass("success-message");
          }, 3000);
        } else {
          $("#update_product_message").html(response.message);
          $("#update_product_message").removeClass("success-message");
          $("#update_product_message").addClass("error-message");
        }
      },
      error: function (xhr, status, error) {
        $("#update_product_message").html("Error occoured");
      },
    });
  });
});
