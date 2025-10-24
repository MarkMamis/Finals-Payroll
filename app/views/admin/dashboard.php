<?php
// Admin Dashboard view
// Expects $this->session to be available for current user info
$user = $this->session->userdata('user') ?? null;
$username = is_array($user) ? ($user['username'] ?? ($user['name'] ?? '')) : ($user->username ?? ($user->name ?? ''));
$role = is_array($user) ? ($user['role'] ?? '') : ($user->role ?? '');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <style>
        /* Minimal, clean CSS to match the attached design */
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0; background:#f5f7fb; color:#243142; }
        .app { display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0f1724; color:#fff; padding:24px 18px; box-sizing:border-box; display:flex; flex-direction:column; }
        .brand { display:flex; align-items:center; gap:12px; margin-bottom:28px; }
        .brand .logo { width:40px; height:40px; border-radius:8px; background:#6b5ce3; display:inline-block; }
        .brand h1 { font-size:18px; margin:0; font-weight:700; }
        nav { flex:1; }
        nav a { display:flex; align-items:center; gap:10px; color:#cbd5e1; text-decoration:none; padding:12px 8px; border-radius:8px; margin-bottom:6px; }
        nav a.active, nav a:hover { background:rgba(255,255,255,0.04); color:#fff; }
        .profile { margin-top:auto; display:flex; align-items:center; gap:12px; }
        .avatar { width:44px; height:44px; border-radius:50%; background:#1f2937; display:inline-block; }
        .content { flex:1; padding:28px; box-sizing:border-box; }
        .page-title { display:flex; align-items:center; justify-content:space-between; }
        .page-title h2 { margin:0; font-size:28px; }
        .subtitle { color:#6b7280; margin-top:6px; }
        .grid { display:grid; grid-template-columns:repeat(4,1fr); gap:18px; margin-top:22px; }
        .card { background:#fff; border-radius:10px; padding:22px; box-shadow:0 1px 0 rgba(16,24,40,0.03); }
        .card h3 { margin:0; font-size:14px; color:#6b7280; }
        .card .value { font-size:28px; margin-top:8px; font-weight:700; }
        .panel-row { display:grid; grid-template-columns:2fr 1fr; gap:18px; margin-top:22px; }
        .panel { background:#fff; border-radius:10px; padding:20px; }
        .panel h3 { margin:0 0 12px 0; }
        .btn-list { display:flex; flex-direction:column; gap:10px; }
        .btn { background:#f3f4f6; border-radius:8px; padding:12px; color:#111827; text-decoration:none; display:inline-block; }
        .meta { color:#6b7280; display:flex; justify-content:space-between; padding:8px 0; }
        .green { color:#10b981; font-weight:600; }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="logo"></div>
            <div>
                <h1>PayrollPro</h1>
                <div style="font-size:12px;color:#93c5fd;margin-top:2px;">Management System</div>
            </div>
        </div>
        <nav>
            <a href="/admin" class="active">Dashboard</a>
            <a href="/employees">Employees</a>
            <a href="/admin/users">User Management</a>
            <a href="/admin/settings">Settings</a>
        </nav>

        <div class="profile">
            <div class="avatar"></div>
            <div>
                <div style="font-weight:700;"><?php echo htmlentities($username ?: 'Admin'); ?></div>
                <div style="font-size:12px;color:#9ca3af"><?php echo htmlentities(ucfirst($role ?: 'Admin')); ?></div>
                <div style="margin-top:10px;"><a class="btn" href="/logout">Logout</a></div>
            </div>
        </div>
    </aside>

    <main class="content">
        <div class="page-title">
            <div>
                <h2>Admin Dashboard</h2>
                <div class="subtitle">System overview and configuration</div>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3>Total Users</h3>
                <div class="value"><?php echo isset($users) ? count($users) : '—'; ?></div>
                <div style="color:#9ca3af;margin-top:8px;">Active accounts</div>
            </div>
            <div class="card">
                <h3>Departments</h3>
                <div class="value">4</div>
                <div style="color:#9ca3af;margin-top:8px;">Engineering, Product, Design, Marketing</div>
            </div>
            <div class="card">
                <h3>System Health</h3>
                <div class="value">100%</div>
                <div style="color:#9ca3af;margin-top:8px;">&nbsp;</div>
            </div>
            <div class="card">
                <h3>Active Sessions</h3>
                <div class="value">5</div>
                <div style="color:#9ca3af;margin-top:8px;">Current logins</div>
            </div>
        </div>

        <div class="panel-row">
            <div class="panel">
                <h3>System Settings</h3>
                <div style="color:#6b7280;margin-top:8px;">Configure application</div>
                <div class="btn-list" style="margin-top:18px;">
                    <a class="btn" href="/admin/roles">Manage User Roles</a>
                    <a class="btn" href="/admin/salary-grades">Configure Salary Grades</a>
                    <a class="btn" href="/admin/audit">View Audit Logs</a>
                </div>
            </div>
            <div class="panel">
                <h3>Security Overview</h3>
                <div style="color:#6b7280;margin-top:8px;">System security status</div>
                <div class="meta"><span>Failed Login Attempts</span><span>0</span></div>
                <div class="meta"><span>2FA Enabled Users</span><span>3/8</span></div>
                <div class="meta"><span>Last Backup</span><span class="green">2 hours ago</span></div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin Dashboard</title></head>
<body>
<h1>Admin Dashboard</h1>
<p>Overview and quick stats.</p>
<p><a href="/admin/users">Manage Users</a> | <a href="/admin/settings">Settings</a></p>
</body>
</html>
