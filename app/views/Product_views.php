<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #140a1f;
            --bg-glow: radial-gradient(circle at 20% 0%, #2d1250 0%, #140a1f 55%);
            --surface: #1c1030;
            --surface-2: #241338;
            --border: #3a2359;
            --accent: #a855f7;
            --accent-2: #c084fc;
            --accent-soft: rgba(168, 85, 247, 0.15);
            --text: #f1e9ff;
            --muted: #a892c4;
            --danger: #f87171;
            --danger-soft: rgba(248, 113, 113, 0.12);
            --warn: #fbbf24;
            --warn-soft: rgba(251, 191, 36, 0.12);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg-glow);
            color: var(--text);
            padding: 48px 32px;
        }
        .page {
            max-width: 1000px;
            margin: 0 auto;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 28px;
        }
        .top-bar h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 28px;
            margin: 0;
            letter-spacing: 0.3px;
        }
        .top-bar h1::before {
            content: "◆ ";
            color: var(--accent-2);
            font-size: 18px;
        }
        .actions { display: flex; gap: 10px; }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            border: 1px solid transparent;
            transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
            cursor: pointer;
        }
        .btn-add {
            background: linear-gradient(135deg, var(--accent), #7c3aed);
            color: #fff;
            box-shadow: 0 4px 14px rgba(168, 85, 247, 0.35);
        }
        .btn-add:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(168, 85, 247, 0.5); }
        .btn-logout {
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--border);
        }
        .btn-logout:hover { color: var(--text); border-color: var(--accent-2); }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }
        table { width: 100%; border-collapse: collapse; }
        thead th {
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--muted);
            font-weight: 600;
            padding: 16px 18px;
            background: var(--surface-2);
            border-bottom: 1px solid var(--border);
        }
        tbody td {
            padding: 16px 18px;
            font-size: 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.15s ease; }
        tbody tr:hover { background: rgba(168, 85, 247, 0.06); }
        .name-cell { font-weight: 600; }
        .price-chip, .qty-chip {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }
        .price-chip { background: var(--accent-soft); color: var(--accent-2); }
        .qty-chip { background: var(--warn-soft); color: var(--warn); }
        .muted-text { color: var(--muted); }
        .row-actions { display: flex; gap: 8px; }
        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
        }
        .btn-edit { background: var(--surface-2); color: var(--accent-2); border: 1px solid var(--border); }
        .btn-edit:hover { border-color: var(--accent-2); }
        .btn-delete { background: var(--danger-soft); color: var(--danger); }
        .btn-delete:hover { background: rgba(248, 113, 113, 0.2); }
        .empty-state {
            text-align: center;
            padding: 48px 16px;
            color: var(--muted);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="top-bar">
            <h1>Products</h1>
            <div class="actions">
                <a class="btn btn-add" href="<?= site_url('products/create') ?>">+ Add Product</a>
                <a class="btn btn-logout" href="<?= site_url('logout') ?>">Log Out</a>
            </div>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="muted-text">#<?= htmlspecialchars($product['id']) ?></td>
                                <td class="name-cell"><?= htmlspecialchars($product['product_name']) ?></td>
                                <td class="muted-text"><?= htmlspecialchars($product['description']) ?></td>
                                <td><span class="price-chip">₱<?= htmlspecialchars($product['price']) ?></span></td>
                                <td><span class="qty-chip"><?= htmlspecialchars($product['quantity']) ?></span></td>
                                <td class="muted-text"><?= htmlspecialchars($product['created_at']) ?></td>
                                <td>
                                    <div class="row-actions">
                                        <a class="btn-edit" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a>
                                        <a class="btn-delete" href="<?= site_url('products/delete/' . $product['id']) ?>"
                                           onclick="return confirm('Delete this product?');">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">No products found. Click "Add Product" to create one.</div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>