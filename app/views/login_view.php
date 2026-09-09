<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; height: 100vh; display: flex; align-items: center; justify-content: center; background: #f4f4f4; }
        .login-box { background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 320px; }
        h1 { font-size: 20px; margin-top: 0; }
        label { display: block; margin-top: 12px; margin-bottom: 4px; font-size: 14px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; width: 100%; padding: 10px; background: #2d6cdf; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1e56b8; }
        .error { color: #c0392b; font-size: 14px; margin-top: 12px; }
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