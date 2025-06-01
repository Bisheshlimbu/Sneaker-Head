<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sneaker Cards</title>
    <style>
    body {
      background-color: #111;
      font-family: Arial, sans-serif;
      color: #fff;
      margin: 0;
      padding: 40px;
    }

    .card-container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-top:40px;
    }

    .card {
        background-color: #151515;
        border-radius: 8px;
        overflow: hidden;
        width: 320px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        transition: transform 0.2s;
        border: 1px solid black;
    }

    /* .card:hover {
        transform: scale(1.03);
    } */

    .card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .card-details {
        padding: 20px;
    }

    .colors {
        color: #aaa;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 1.1rem;
        margin: 5px 0 12px;
    }

    .price {
        font-weight: bold;
        font-size: 1rem;
        margin-bottom: 8px;
    }

    .trending {
        color: #00d2ff;
        font-size: 0.9rem;
    }

    .shop-mens {
        background-color: #0e0e0e;
        padding: 0 20px;
        padding-top:10px;
        font-family: sans-serif;
    }

    .shop-mens h2 {
        color: #fff;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .category-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .category-buttons button, select {
        background-color: transparent;
        color: #fff;
        border: 1px solid #444;
        border-radius: 50px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-buttons button:hover {
        background-color: #fff;
        color: #000;
    }
    </style>
</head>

<body>

    <body>
        <section class="shop-mens">
            <h2>SHOP MEN’S</h2>
            <div class="category-buttons">
                <button>All Shoes</button>
                <button>Casual Shoes</button>
                <button>Running Shoes</button>
                <button>Basketball Shoes</button>
                <button>All Clothing</button>
                <button>Sweatpants & Joggers</button>
                <button>Hoodies & Sweatshirts</button>
            </div>
            
        </section>
         <section class="shop-mens">
            <h3>BRANDS</h3>
            <div class="category-buttons">
                <select>
                  <option>Filter By Brands</option>
                  <option>Filter By Brands</option>
                  <option>Filter By Brands</option>
                  <option>Filter By Brands</option>
                </select>
                <button>Casual Shoes</button>
                <button>Running Shoes</button>
                <button>Basketball Shoes</button>
                <button>All Clothing</button>
                <button>Sweatpants & Joggers</button>
                <button>Hoodies & Sweatshirts</button>
            </div>
            
        </section>

        <div class="card-container">

            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>


            <div class="card">
                <img src="http://sneaker-head.local/assets/images/asics.jpg" alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>
            <div class="card">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/f83b1d6b-f6c7-47a6-822e-88ec2b8c7894/image.jpg"
                    alt="Air Jordan Retro 12">
                <div class="card-details">
                    <p class="colors">1 color</p>
                    <h3>Air Jordan Retro 12 Basketball Shoes</h3>
                    <p class="price">$200.00</p>
                </div>
            </div>

        </div>
    </body>

</html>