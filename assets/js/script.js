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

    if (!user_id || user_id === "0") {
      Swal.fire({
        icon: "error",
        title: "Please Login First",
        html: 'You must <a href="/main/pages/login.php" style="color:#0065F8;">login here</a> to continue.',
        showConfirmButton: true,
      });
      return;
    }

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
      var price = parseFloat($(this).data("total_price")) || 0;
      totalSum += price;
    });

    // You can also update the UI with these values, for example:
    $("#checked-count").text(checkedCount);
    $(".total-price").text("Rs. " + totalSum.toFixed(2));
  });
  $("#add-to-fav").on("click", function () {
    var $btn = $(this);

    // Toggle heart icon style
    $("#heart-icon").toggleClass("fa-regular fa-solid");

    var product_id = $btn.data("product_id");
    var user_id = $btn.data("user_id");
    if (!user_id || user_id === "0") {
      Swal.fire({
        icon: "error",
        title: "Please Login First",
        html: 'You must <a href="/main/pages/login.php" style="color:#0065F8;">login here</a> to continue.',
        showConfirmButton: true,
      });
      return;
    }

    var like = $btn.data("like");
    var newLike = like == 1 ? 0 : 1;

    // Update data attribute & jQuery data cache before sending AJAX
    $btn.attr("data-like", newLike);
    $btn.data("like", newLike);

    var data = {
      product_id: product_id,
      user_id: user_id,
      like: like, // send updated like value
      action: "add_to_fav",
    };

    $.ajax({
      type: "POST",
      url: "http://sneaker-head.local/main/pages/ajax-request.php",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          Swal.fire({
            icon: "success",
            title: "Success",
            html: response.message,
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
        console.error("AJAX Error:", error);
        Swal.fire({
          icon: "error",
          title: "AJAX Error",
          text: error,
        });
      },
    });
  });

  //slider
  $(document).ready(function () {
    const $carousel = $("#recommendation_carousel");
    const $cards = $(".recommend_card");
    const cardWidth = $cards.outerWidth(true);
    const visibleCards = 4;
    const totalCards = $cards.length;

    if (totalCards <1) {
      $("#recommended_title").hide();
      $(".prev-btn, .next-btn").hide();
      return; // Exit early — nothing to slide
    }
    if (totalCards <= visibleCards) {
      $(".prev-btn, .next-btn").hide();
      return; // no need to proceed
    }

    // Clone first and last few cards
    const $firstClones = $cards.slice(0, visibleCards).clone();
    const $lastClones = $cards.slice(-visibleCards).clone();

    // Append/prepend clones to the carousel
    $carousel.append($firstClones);
    $carousel.prepend($lastClones);

    // Set initial position (skip the prepended clones)
    let currentIndex = visibleCards;
    $carousel.css("transform", `translateX(-${cardWidth * currentIndex}px)`);

    // Slide next
    $(".next-btn").click(function () {
      currentIndex++;
      $carousel.css({
        transition: "transform 0.5s ease",
        transform: `translateX(-${cardWidth * currentIndex}px)`,
      });

      if (currentIndex === totalCards + visibleCards) {
        setTimeout(() => {
          $carousel.css({
            transition: "none",
            transform: `translateX(-${cardWidth * visibleCards}px)`,
          });
          currentIndex = visibleCards;
        }, 500);
      }
    });

    // Slide previous
    $(".prev-btn").click(function () {
      currentIndex--;
      $carousel.css({
        transition: "transform 0.5s ease",
        transform: `translateX(-${cardWidth * currentIndex}px)`,
      });

      if (currentIndex === 0) {
        setTimeout(() => {
          $carousel.css({
            transition: "none",
            transform: `translateX(-${cardWidth * totalCards}px)`,
          });
          currentIndex = totalCards;
        }, 500);
      }
    });
  });

  
});
