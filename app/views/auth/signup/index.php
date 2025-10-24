<?php
$flash = isset($this->session) ? $this->session->flashdata('error') : null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>PayrollPro — Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#f6f7fb;--card:#fff;--muted:#6b7280}
        body{margin:0;font-family:Inter,Arial,sans-serif;background:var(--bg);color:#0f172a}
        .container{display:grid;grid-template-columns:1fr 480px;min-height:100vh}
        .hero{background:linear-gradient(90deg, rgba(108,99,255,0.95) 0%, rgba(108,99,255,0.85) 100%), url('/public/assets/img/office.jpg') center/cover no-repeat;padding:64px;color:#fff;display:flex;align-items:center}
        .card{margin:48px;background:var(--card);border-radius:10px;padding:28px;box-shadow:0 8px 24px rgba(12,18,29,0.06)}
        .field{margin-bottom:14px}
        .field input, .field select{width:100%;padding:12px;border:1px solid #e6e9ef;border-radius:8px}
        .btn{display:inline-block;background:#6c63ff;color:#fff;padding:12px 18px;border-radius:8px;border:0;cursor:pointer;width:100%}
        .muted{color:var(--muted);font-size:14px}
        .error{background:#fff4f4;border:1px solid #fde2e2;color:#b91c1c;padding:10px;border-radius:8px;margin-bottom:12px}
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <div>
                <h1>PayrollPro</h1>
                <p>Join our team — create your account to access payroll and HR features.</p>
            </div>
        </div>

        <div style="display:flex;align-items:center;justify-content:center;">
            <div class="card" style="width:100%;max-width:420px;">
                <h2>Create account</h2>
                <?php if (!empty($flash)): ?>
                    <div class="error"><?=htmlspecialchars($flash)?></div>
                <?php endif; ?>
                <form method="post" action="/signup">
                    <div class="field">
                        <label class="muted">Full name</label>
                        <input id="name" name="name" type="text" required>
                    </div>
                    <div class="field">
                        <label class="muted">Email</label>
                        <input id="email" name="email" type="email" required>
                    </div>
                    <div class="field">
                        <label class="muted">Password</label>
                        <input id="password" name="password" type="password" required>
                    </div>
                    <div class="field">
                        <label class="muted">Confirm Password</label>
                        <input id="password_confirm" name="password_confirm" type="password" required>
                    </div>
                    <div class="field">
                        <label class="muted">Role</label>
                        <select name="role">
                            <option value="employee">Employee</option>
                            <option value="hr">HR</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="field">
                        <button class="btn" type="submit">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
