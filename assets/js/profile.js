document.addEventListener("DOMContentLoaded", function () {
  const brandItems = document.querySelectorAll(".pre-items");

  brandItems.forEach((item) => {
    item.addEventListener("click", () => {
      item.classList.toggle("selected");
    });
  });

  //container show hide
  const perefenceBtn = document.querySelector("#perefence_btn");
  const personalBtn = document.querySelector("#personal_btn");
  const perefenceCont = document.querySelector("#preferences_cont");
  const personalCont = document.querySelector("#personal_cont");

  perefenceBtn.addEventListener("click", function () {
    perefenceCont.classList.remove("hide");
    personalCont.classList.add("hide");
    perefenceBtn.classList.add("active");
    personalBtn.classList.remove("active");
  });

  personalBtn.addEventListener("click", function () {
    perefenceCont.classList.add("hide");
    personalCont.classList.remove("hide");
    perefenceBtn.classList.remove("active");
    personalBtn.classList.add("active");
  });

  /**getting the preferences data start*/
  function ajaxUserPreferences(data) {
    $.ajax({
      type: "POST",
      url: "http://sneaker-head.local/main/pages/ajax-request.php",
      data: data,
      success: function (response) {
        console.log(response);
        if (response.status == "success") {
          $("#profile-message-container").html(`
                <div class="successMessage">
                    <p>${response.message}</p>
                </div>
            `);

          setTimeout(() => {
            $("#profile-message-container").html("");
          }, 2000);
        } else {
          $("#profile-message-container").html(`
                <div class="errorMessage">
                    <p>${response.message}</p>
                </div>
            `);
        }
      },
      error: function (xhr, status, error) {
        console.log("An error occurred: " + error);
      },
    });
  }

  //brand
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

  //categories
  const selectedCategories = [];

  document.querySelectorAll(".category-item").forEach((item) => {
    item.addEventListener("click", () => {
      const category = item.textContent.trim().toLowerCase();
      const index = selectedCategories.indexOf(category);

      if (index === -1) {
        selectedCategories.push(category);
        item.classList.add("selected");
      } else {
        selectedCategories.splice(index, 1);
        item.classList.remove("selected");
      }

      console.log(selectedCategories);
    });
  });

  //type
  const selectedType = [];

  document.querySelectorAll(".type-item").forEach((item) => {
    item.addEventListener("click", () => {
      const type = item.textContent.trim().toLowerCase();
      const index = selectedType.indexOf(type);

      if (index === -1) {
        selectedType.push(type);
        item.classList.add("selected");
      } else {
        selectedType.splice(index, 1);
        item.classList.remove("selected");
      }

      console.log(selectedType);
    });
  });

  document
    .querySelector("#savePreferences")
    .addEventListener("click", function () {
      var preferencesData = {
        brandItems: selectedBrands,
        categoryItems: selectedCategories,
        typeItem: selectedType,
        action: "update_user_preferences",
      };
      console.log(preferencesData);
      //calll the function
      ajaxUserPreferences(preferencesData);
    });

  /**getting the preferences data ends*/
});
