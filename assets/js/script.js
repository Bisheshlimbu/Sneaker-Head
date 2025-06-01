document.addEventListener("DOMContentLoaded", function () {
  const mainImage = document.querySelector("#main-image");
  var thumbnainlImage = document.querySelectorAll(".thumbnail-image");

  thumbnainlImage.forEach(function (element) {
    element.addEventListener("click", function () {
      const imageSrc = this.src;

      //make image preview
      mainImage.src = imageSrc;
    });
  });

  //for the size select
  let selectedBrand = null;

  document.querySelectorAll(".brand-item").forEach((item) => {
    item.addEventListener("click", () => {
      const brand = item.textContent.trim().toLowerCase();

      // Remove 'selected' class from all items
      document.querySelectorAll(".brand-item").forEach((el) => {
        el.classList.remove("selected");
      });

      // Update selected brand and add class
      selectedBrand = brand;
      item.classList.add("selected");

      console.log("Selected brand:", selectedBrand);
    });
  });

  $(document).ready(function () {
    let count = 0;

    $("#qty-inc").on("click", function () {
      count++;
      $("#qty-number").text(count);
    });

    $("#qty-dec").on("click", function () {
      if (count > 1) {
        count--;
        $("#qty-number").text(count);
      }
    });
  });

  function ajaxAddToCart(data) {
    $.ajax({
      type: "POST",
      url: "http://sneaker-head.local/main/pages/ajax-request.php",
      data: data,
      success: function (response) {
        console.log(response);
        if (response.status === "success") {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: response.message || "Operation completed successfully.",
            html: 'Product added! <br><a href="/main/pages/cart.php">Go to Cart</a>',
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: response.message || "Something went wrong.",
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: "error",
          title: "AJAX Error",
          text: error,
        });
      },
    });
  }
  $("#addToBag").on("click", function () {
    var product_id = $(this).data("product_id");
    var user_id = $(this).data("user_id");
    var qty = parseInt($("#qty-number").html());

    if (!selectedBrand) {
      $("#selectSize").html("Select size !");
      return;
    }

    var cartData = {
      product_id: product_id,
      user_id: user_id,
      size: selectedBrand,
      qty: qty,
      action: "add_to_cart",
    };
    ajaxAddToCart(cartData);
  });
});

$(document).ready(function () {
  /**add product for checkout */
  $('input[name="selected_products[]"]').change(function () {
  // Get all checked checkboxes
  var checkedBoxes = $('input[name="selected_products[]"]:checked');

  // Count checked items
  var checkedCount = checkedBoxes.length;

  // Calculate total price sum
  var totalSum = 0;
  checkedBoxes.each(function () {
    // Get total price from data attribute (make sure it's a number)
    var price = parseFloat($(this).data('total_price')) || 0;
    totalSum += price;
  });

  // You can also update the UI with these values, for example:
  $('#checked-count').text(checkedCount);
  $('.total-price').text('Rs. ' + totalSum.toFixed(2));
});

});
