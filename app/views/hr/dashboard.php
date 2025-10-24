<?php
$user = $this->session->userdata('user') ?? null;
$role = $user['role'] ?? ($user->role ?? 'guest');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>HR Dashboard</title>
    <style>
        body{font-family:Inter,Arial,Helvetica,sans-serif;margin:0;background:#f8fafc;color:#0f172a}
        .layout{display:flex}
        .sidebar{width:260px;background:#0f172a;color:#fff;padding:20px;min-height:100vh}
        .sidebar h3{margin-top:8px}
        .content{flex:1;padding:28px}
        .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
        .card{background:#fff;padding:18px;border-radius:10px;box-shadow:0 6px 18px rgba(12,18,29,0.06)}
        .welcome{margin-bottom:18px}
        .actions{margin-top:18px}
    </style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div style="font-weight:700;font-size:18px">PayrollPro</div>
            <nav style="margin-top:18px">
                <div style="margin-bottom:12px">Dashboard</div>
                <div style="margin-bottom:12px">Employees</div>
                <div style="margin-bottom:12px">Attendance</div>
                <div style="margin-bottom:12px">Payroll</div>
            </nav>
            <div style="position:fixed;bottom:24px;color:#fff">Logged in as<br><strong><?=htmlspecialchars($user['username'] ?? 'Guest')?></strong><br><small><?=htmlspecialchars(ucfirst($role))?></small></div>
        </aside>
        <main class="content">
            <h1 class="welcome"><?php if($role==='admin') echo 'Admin Dashboard'; elseif($role==='hr') echo 'HR Dashboard'; else echo 'Welcome back, '.htmlspecialchars($user['username'] ?? ''); ?></h1>

            <?php if ($role === 'employee'): ?>
                <div class="grid">
                    <div class="card"><h3>Today's Status</h3><p>Clocked In</p></div>
                    <div class="card"><h3>Hours This Week</h3><p>42.5</p></div>
                    <div class="card"><h3>This Month's Pay</h3><p>$6,000</p></div>
                </div>
                <div class="actions">
                    <div class="card">Quick Actions: Clock In/Out, View Payslip</div>
                </div>
            <?php elseif ($role === 'hr'): ?>
                <div class="grid">
                    <div class="card"><h3>Total Employees</h3><p>5</p></div>
                    <div class="card"><h3>Present Today</h3><p>2</p></div>
                    <div class="card"><h3>Pending Payroll</h3><p>1</p></div>
                </div>
                <div class="actions">
                    <div class="card">Quick Actions: Add Employee, Process Payroll, Review Attendance</div>
                </div>
            <?php elseif ($role === 'admin'): ?>
                <div class="grid">
                    <div class="card"><h3>Total Users</h3><p>8</p></div>
                    <div class="card"><h3>Departments</h3><p>4</p></div>
                    <div class="card"><h3>System Health</h3><p>100%</p></div>
                </div>
                <div class="actions">
                    <div class="card">System Settings: Manage Roles, Configure Salary Grades, View Audit Logs</div>
                </div>
            <?php else: ?>
                <div class="card">Please login to view the dashboard.</div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
<h1><?= $title ?? 'HR Dashboard' ?></h1>
<p>Welcome to the HR dashboard placeholder.</p>
