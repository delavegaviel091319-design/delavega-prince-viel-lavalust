<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 400px; }
        label { display: block; margin-top: 12px; margin-bottom: 4px; font-size: 14px; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; padding: 10px 20px; background: #2d6cdf; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1e56b8; }
        .back-link { display: inline-block; margin-top: 16px; color: #555; }
    </style>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="<?= site_url('products/edit/' . $product['id']) ?>">
        <label for="product_name">Product Name</label>
        <input type="text" id="product_name" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="3"><?= htmlspecialchars($product['description']) ?></textarea>

        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" min="0" value="<?= htmlspecialchars($product['price']) ?>" required>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="0" value="<?= htmlspecialchars($product['quantity']) ?>" required>

        <button type="submit">Update Product</button>
    </form>
    <a class="back-link" href="<?= site_url('products') ?>">&larr; Back to Products</a>
</body>
</html>