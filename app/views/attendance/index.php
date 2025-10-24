<?php
$user = $this->session->userdata('user') ?? null;
$name = is_array($user) ? ($user['username'] ?? 'Employee') : ($user->username ?? 'Employee');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Attendance</title>
    <style>
        body { font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial; margin:0; background:#f7f9fb; color:#111827; }
        .app { display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0f1724; color:#fff; padding:24px; box-sizing:border-box; }
        .content { flex:1; padding:28px; }
        .page-title h1 { margin:0; font-size:34px; }
        .grid { display:grid; grid-template-columns:2fr 1fr; gap:18px; margin-top:22px; }
        .card { background:#fff; border-radius:10px; padding:22px; box-shadow:0 1px 0 rgba(16,24,40,0.03); }
        .clock { text-align:center; padding:40px 10px; background:#f3f4f6; border-radius:8px; }
        .clock .time { font-size:36px; font-weight:700; }
        .btn { display:inline-block; margin-top:18px; background:#6b5ce3; color:#fff; padding:12px 18px; border-radius:8px; text-decoration:none; }
        .summary-item { display:flex; justify-content:space-between; padding:14px; background:#f3f4f6; border-radius:8px; margin-bottom:12px; }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div style="font-weight:700;color:#fff;margin-bottom:20px;">PayrollPro</div>
        <nav>
            <a href="/employee" style="color:#cbd5e1;display:block;margin-bottom:8px">Dashboard</a>
            <a href="/employee/attendance" style="color:#fff;display:block;margin-bottom:8px">My Attendance</a>
            <a href="/employee/payslips" style="color:#cbd5e1;display:block">My Payslips</a>
        </nav>
        <div style="position:absolute;bottom:20px;color:#fff;display:flex;gap:12px;align-items:center;padding:0 24px;">
            <div style="width:40px;height:40px;border-radius:50%;background:#1f2937"></div>
            <div>
                <div style="font-weight:700"><?php echo htmlentities($name); ?></div>
                <div style="font-size:12px;color:#9ca3af">Employee</div>
            </div>
        </div>
    </aside>

    <main class="content">
        <div class="page-title"><h1>My Attendance</h1><div style="color:#6b7280">Track your working hours</div></div>

        <div class="grid">
            <div class="card">
                <h3>Clock In/Out</h3>
                <div style="color:#6b7280;margin-bottom:12px">Record your daily attendance</div>
                <div class="clock">
                    <div style="font-size:42px;">02:51 AM</div>
                    <div style="color:#6b7280;margin-top:8px;">Friday, October 24, 2025</div>
                    <a class="btn" href="/employee/attendance/clock">Clock In</a>
                </div>
            </div>

            <div class="card">
                <h3>This Month Summary</h3>
                <div style="color:#6b7280;margin-top:8px">October 2025</div>
                <div style="margin-top:18px">
                    <div class="summary-item"><span>Total Days Worked</span><strong>20</strong></div>
                    <div class="summary-item"><span>Total Hours</span><strong>168</strong></div>
                    <div class="summary-item"><span>Late Arrivals</span><strong style="color:#f59e0b">2</strong></div>
                </div>
            </div>
        </div>

        <div style="margin-top:18px" class="card">
            <h3>Recent Attendance</h3>
            <p style="color:#6b7280">Your attendance history</p>
            <table style="width:100%;border-collapse:collapse;margin-top:12px">
                <thead><tr style="text-align:left;color:#6b7280"><th>Date</th><th>Clock In</th><th>Clock Out</th><th>Hours</th></tr></thead>
                <tbody>
                    <tr><td>2025-10-24</td><td>09:00</td><td>17:00</td><td>8</td></tr>
                    <tr><td>2025-10-23</td><td>09:05</td><td>17:00</td><td>7.9</td></tr>
                    <tr><td>2025-10-22</td><td>09:00</td><td>17:00</td><td>8</td></tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
<h1><?= $title ?? 'My Attendance' ?></h1>
<p>Clock in/out panel (placeholder)</p>
