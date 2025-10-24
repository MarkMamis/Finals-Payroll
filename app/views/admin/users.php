<!doctype html>
<html>
<head><meta charset="utf-8"><title>Manage Users</title></head>
<body>
<h1>Users</h1>
<?php if (!empty($users)) : ?>
    <ul>
    <?php foreach ($users as $u) : ?>
        <li><?=htmlspecialchars($u['username'] ?? $u->username ?? '')?> (<?=htmlspecialchars($u['email'] ?? $u->email ?? '')?>) - <?=htmlspecialchars($u['role'] ?? $u->role ?? '')?></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No users found</p>
<?php endif; ?>
</body>
</html>
