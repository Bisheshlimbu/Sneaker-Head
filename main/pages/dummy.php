<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Product List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
    /* body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #1e1e1e;
      color: #ffffff;
      padding: 40px;
    } */

    h1 {
        font-size: 32px;
        color: #ffffff;
    }

    p.subtitle {
        color: #888;
    }

    .top-bar {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin: 20px 0;
    }

    .top-bar button {
        padding: 10px 16px;
        border: none;
        cursor: pointer;
        border-radius: 6px;
        font-weight: 600;
    }

    .btn-export,
    .btn-import {
        background-color: #333;
        color: #fff;
    }

    .btn-create {
        background-color: #00c2b2;
        color: #fff;
    }

    .filters {
        background-color: #2a2a2a;
        padding: 20px;
        display: flex;
        gap: 20px;
        border-radius: 10px;
        align-items: center;
    }

    select,
    input[type="date"] {
        padding: 10px;
        border-radius: 6px;
        border: none;
        background-color: #1e1e1e;
        color: #fff;
    }

    .product-table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .product-row {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #333;
    }

    .product-row img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 20px;
    }

    .product-name {
        flex: 2;
    }

    .product-price,
    .product-status,
    .product-date,
    .product-actions {
        flex: 1;
        text-align: center;
    }

    .status {
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 12px;
        display: inline-block;
    }

    .active {
        background-color: #1f7a1f;
    }

    .archived {
        background-color: #b87333;
    }

    .disabled {
        background-color: #a52a2a;
    }

    .btn-edit,
    .btn-delete {
        padding: 6px 12px;
        margin: 0 4px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #00c2b2;
        color: #fff;
    }

    .btn-delete {
        background-color: #333;
        color: #fff;
    }
    </style>
</head>

<body>
    <h1>Products List</h1>
    <!-- <p class="subtitle">.</p> -->

    <div class="top-bar">

        <button class="btn-create">Create new</button>
    </div>

    <div class="filters">
        <select>
            <option>All category</option>
            <option>Casuals</option>
            <option>Running</option>
            <option>Basketball</option>
            <option>Retro</option>
        </select>
        <input type="date">

    </div>

    <div class="product-table">
        <div class="product-row">
            <input type="checkbox">
            <img src="https://via.placeholder.com/50" alt="Product">
            <div class="product-name">T-shirt for men medium size</div>
            <div class="product-price">$34.50</div>
            <div class="product-status"><span class="status active">Active</span></div>
            <div class="product-date">02.11.2022</div>
            <div class="product-actions">
                <button class="btn-edit">Edit</button>
                <button class="btn-delete">Delete</button>
            </div>
        </div>
        <!-- Repeat similar product-row divs for other products -->
    </div>
</body>

</html>