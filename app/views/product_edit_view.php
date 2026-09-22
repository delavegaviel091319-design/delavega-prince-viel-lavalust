<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-glow: radial-gradient(circle at 20% 0%, #2d1250 0%, #140a1f 55%);
            --surface: #1c1030;
            --border: #3a2359;
            --accent: #a855f7;
            --accent-2: #c084fc;
            --text: #f1e9ff;
            --muted: #a892c4;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg-glow);
            color: var(--text);
            padding: 48px 24px;
        }
        .page { max-width: 460px; margin: 0 auto; }
        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 26px;
            margin-bottom: 24px;
        }
        h1::before { content: "◆ "; color: var(--accent-2); font-size: 18px; }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }
        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 500;
            color: var(--muted);
        }
        label:first-of-type { margin-top: 0; }
        input, textarea {
            width: 100%;
            padding: 11px 14px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #150b24;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }
        textarea { resize: vertical; }
        input:focus, textarea:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
        }
        button {
            margin-top: 24px;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), #7c3aed);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(168, 85, 247, 0.35);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }
        button:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(168, 85, 247, 0.5); }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover { color: var(--accent-2); }
    </style>
</head>
<body>
    <div class="page">
        <h1>Edit Product</h1>
        <div class="card">
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
        </div>
        <a class="back-link" href="<?= site_url('products') ?>">&larr; Back to Products</a>
    </div>
</body>
</html>