<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-glow: radial-gradient(circle at 50% 20%, #2d1250 0%, #140a1f 60%);
            --surface: #1c1030;
            --border: #3a2359;
            --accent: #a855f7;
            --accent-2: #c084fc;
            --text: #f1e9ff;
            --muted: #a892c4;
            --danger: #f87171;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            background: var(--bg-glow);
            color: var(--text);
        }
        .login-box {
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 36px 32px;
            border-radius: 18px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.45);
            width: 340px;
        }
        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 20px;
            margin: 0 0 24px;
            text-align: center;
        }
        h1::before { content: "◆ "; color: var(--accent-2); }
        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 500;
            color: var(--muted);
        }
        label:first-of-type { margin-top: 0; }
        input[type=text], input[type=password] {
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
        input:focus {
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
        .error {
            color: var(--danger);
            font-size: 13px;
            margin-top: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Product Management Login</h1>
        <form method="post" action="<?= site_url('login') ?>">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log In</button>

            <?php if (!empty($error)): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>