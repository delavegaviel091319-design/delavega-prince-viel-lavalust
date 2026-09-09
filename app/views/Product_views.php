<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; max-width: 900px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #fafafa; }
        .btn { display: inline-block; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 14px; }
        .btn-add { background: #2d6cdf; color: #fff; }
        .btn-edit { background: #f0ad4e; color: #fff; margin-right: 6px; }
        .btn-delete { background: #d9534f; color: #fff; }
        .btn-logout { color: #555; }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Products</h1>
        <div>
            <a class="btn btn-add" href="<?= site_url('products/create') ?>">Add Product</a>
            <a class="btn btn-logout" href="<?= site_url('logout') ?>">Log Out</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']) ?></td>
                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?></td>
                        <td><?= htmlspecialchars($product['quantity']) ?></td>
                        <td><?= htmlspecialchars($product['created_at']) ?></td>
                        <td>
                            <a class="btn btn-edit" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a>
                            <a class="btn btn-delete" href="<?= site_url('products/delete/' . $product['id']) ?>"
                               onclick="return confirm('Delete this product?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>