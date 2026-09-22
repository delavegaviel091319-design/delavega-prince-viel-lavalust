<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management Module</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-glow: radial-gradient(circle at 20% 0%, #2d1250 0%, #140a1f 55%);
            --surface: #1c1030;
            --surface-2: #241338;
            --border: #3a2359;
            --accent: #a855f7;
            --accent-2: #c084fc;
            --accent-soft: rgba(168, 85, 247, 0.15);
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
            padding: 48px 32px;
        }
        .page { max-width: 900px; margin: 0 auto; }
        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 28px;
            margin: 0 0 24px;
            letter-spacing: 0.3px;
        }
        h1::before { content: "◆ "; color: var(--accent-2); font-size: 18px; }
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
        .id-cell { color: var(--muted); }
        .name-cell { font-weight: 600; }
        .username-chip {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            background: var(--accent-soft);
            color: var(--accent-2);
        }
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
        <h1>Users</h1>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="id-cell">#<?= htmlspecialchars($user['id']) ?></td>
                                <td class="name-cell"><?= htmlspecialchars($user['firstname']) ?></td>
                                <td><?= htmlspecialchars($user['lastname']) ?></td>
                                <td class="id-cell"><?= htmlspecialchars($user['email']) ?></td>
                                <td><span class="username-chip"><?= htmlspecialchars($user['username']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">No users found.</div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>