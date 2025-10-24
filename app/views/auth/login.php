<?php
// Minimal login form. Use framework's session flashdata if available.
$flash = isset($this->session) ? $this->session->flashdata('error') : null;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f5f5f5; }
        .login { max-width:360px; margin:60px auto; padding:20px; background:white; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1);} 
        .login h2{margin-top:0}
        .field{margin-bottom:12px}
        .field input{width:100%; padding:8px}
        .error{color:#a94442;background:#f2dede;padding:8px;border-radius:4px;margin-bottom:12px}
    </style>
</head>
<body>
    <div class="login">
        <h2>Sign in</h2>
        <?php if (!empty($flash)): ?>
            <div class="error"><?=htmlspecialchars($flash)?></div>
        <?php endif; ?>
        <form method="post" action="/login">
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required>
            </div>
            <div class="field">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
