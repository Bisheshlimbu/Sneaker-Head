document.addEventListener("DOMContentLoaded", function () {

    const mainImage = document.querySelector('#main-image');
    var thumbnainlImage=document.querySelectorAll(".thumbnail-image")

    thumbnainlImage.forEach(function (element) {
      element.addEventListener("click", function () {
        const imageSrc = this.src;
       
        //make image preview
        mainImage.src = imageSrc;
      });
    });
  });
  