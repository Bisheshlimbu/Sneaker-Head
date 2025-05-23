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
  const selectedBrands = [];

  document.querySelectorAll(".brand-item").forEach((item) => {
    item.addEventListener("click", () => {
      const brand = item.textContent.trim().toLowerCase();
      const index = selectedBrands.indexOf(brand);

      if (index === -1) {
        // Add brand to array if not already present
        selectedBrands.push(brand);
        item.classList.add("selected");
      } else {
        // Remove brand from array if already present
        selectedBrands.splice(index, 1);
        item.classList.remove("selected");
      }

      console.log(selectedBrands);
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

  $("#addToBag").on("click", function () {
    var product_id = $(this).data("product_id");
    var user_id = $(this).data("user_id");
    var qty = parseInt($("#qty-number").html());

    console.log(product_id);
    console.log(user_id);
    console.log(selectedBrands);
    console.log(qty);
  });
});
