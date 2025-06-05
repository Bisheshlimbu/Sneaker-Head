<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>4-Card jQuery Slider</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .slider-container {
      width: 1000px;
      overflow: hidden;
      position: relative;
      margin: 40px auto;
    }

    .slider {
      display: flex;
      transition: transform 0.4s ease-in-out;
    }

    .slide {
      width: 250px;
      margin-right: 10px;
      box-sizing: border-box;
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .slide img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .slide .info {
      padding: 10px;
      font-family: sans-serif;
    }

    .nav-btn {
      position: absolute;
      top: 40%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      border: none;
      padding: 10px 15px;
      font-size: 20px;
      cursor: pointer;
      z-index: 10;
    }

    .prev-btn { left: -50px; }
    .next-btn { right: -50px; }
  </style>
</head>
<body>

<div class="slider-container">
  <button class="nav-btn prev-btn">&#10094;</button>
  <div class="slider">
    <!-- Slide Cards -->
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 1</strong><br>$99</div>
    </div>
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 2</strong><br>$89</div>
    </div>
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 3</strong><br>$79</div>
    </div>
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 4</strong><br>$69</div>
    </div>
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 5</strong><br>$59</div>
    </div>
    <div class="slide">
      <img src="http://sneaker-head.local/assets/images/asics.jpg">
      <div class="info"><strong>Product 6</strong><br>$49</div>
    </div>
  </div>
  <button class="nav-btn next-btn">&#10095;</button>
</div>

<script>
  $(document).ready(function () {
    const slideWidth = $('.slide').outerWidth(true); // 250 + margin
    const visibleSlides = 4;
    const totalSlides = $('.slide').length;
    let currentIndex = 0;

    function updateSlider() {
      const maxIndex = totalSlides - visibleSlides;
      currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
      $('.slider').css('transform', `translateX(-${currentIndex * slideWidth}px)`);
    }

    $('.next-btn').click(function () {
      currentIndex++;
      updateSlider();
    });

    $('.prev-btn').click(function () {
      currentIndex--;
      updateSlider();
    });
  });
</script>

</body>
</html>
