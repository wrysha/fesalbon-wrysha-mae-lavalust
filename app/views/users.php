<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$escape = static fn ($value) => htmlspecialchars(
    (string) $value,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($page_title) ?></title>
    <style>
        :root {
            color-scheme: light;
            --canvas: #f4efe8;
            --surface: #fffaf4;
            --ink: #35271e;
            --muted: #806f62;
            --brown: #855b3d;
            --brown-dark: #5f3f2a;
            --line: #dfd2c5;
            --soft: #eee3d8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 64px 24px;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--ink);
            background: var(--canvas);
        }

        .shell {
            width: min(1080px, 100%);
            margin: 0 auto;
        }

        .eyebrow {
            display: inline-block;
            margin: 0 0 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--brown);
            color: var(--brown);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: var(--brown-dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(2.35rem, 6vw, 4.3rem);
            font-weight: 500;
            letter-spacing: -0.035em;
            line-height: 1;
        }

        .subtitle {
            max-width: 620px;
            margin: 18px 0 38px;
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.7;
        }

        .table-card {
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--surface);
            box-shadow: 0 16px 45px rgba(85, 58, 39, 0.08);
        }

        .table-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 22px 26px;
            border-bottom: 1px solid var(--line);
        }

        .table-toolbar strong {
            color: var(--brown-dark);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 1.15rem;
            font-weight: 500;
        }

        .badge {
            padding: 7px 12px;
            border-radius: 999px;
            color: var(--brown-dark);
            background: var(--soft);
            font-size: 0.78rem;
            font-weight: 700;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 780px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 18px 26px;
            border-bottom: 1px solid var(--line);
            text-align: left;
        }

        th {
            color: var(--muted);
            background: #f8f1ea;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.11em;
            text-transform: uppercase;
        }

        tbody tr { transition: background 150ms ease; }
        tbody tr:hover { background: #faf4ed; }
        tbody tr:last-child td { border-bottom: 0; }

        .id {
            color: var(--brown);
            font-weight: 700;
        }

        .name {
            color: var(--brown-dark);
            font-weight: 650;
        }

        .email { color: #705b4d; }

        .empty {
            padding: 52px 24px;
            color: var(--muted);
            text-align: center;
        }

        footer {
            margin-top: 20px;
            color: #99887a;
            font-size: 0.8rem;
            letter-spacing: 0.04em;
            text-align: center;
        }

        @media (max-width: 640px) {
            body { padding: 38px 16px; }
            .table-toolbar { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="shell">
        <p class="eyebrow">Fesalbon, Wrysha Mae</p>
        <h1><?= $escape($page_title) ?></h1>
        <p class="subtitle">My Friends User Records.</p>

        <section class="table-card" aria-labelledby="directory-heading">
            <div class="table-toolbar">
                <strong id="directory-heading">Registered Users</strong>
                <span class="badge"><?= count($users) ?> records</span>
            </div>

            <?php if (empty($users)) : ?>
                <p class="empty">No user records were found.</p>
            <?php else : ?>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td class="id">#<?= $escape($user['id']) ?></td>
                                    <td class="name"><?= $escape($user['firstname']) ?></td>
                                    <td class="name"><?= $escape($user['lastname']) ?></td>
                                    <td class="email"><?= $escape($user['email']) ?></td>
                                    <td><?= $escape($user['username']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>

        <footer>...</footer>
    </main>
</body>
</html>
