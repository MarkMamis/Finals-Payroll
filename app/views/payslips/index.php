<?php
$user = $this->session->userdata('user') ?? null;
$name = is_array($user) ? ($user['username'] ?? 'Employee') : ($user->username ?? 'Employee');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Payslips</title>
    <style>
        body { font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial; margin:0; background:#f7f9fb; color:#111827; }
        .app { display:flex; min-height:100vh; }
        .sidebar { width:260px; background:#0f1724; color:#fff; padding:24px; box-sizing:border-box; }
        .content { flex:1; padding:28px; }
        .page-title h1 { margin:0; font-size:34px; }
        .card { background:#fff; border-radius:10px; padding:22px; box-shadow:0 1px 0 rgba(16,24,40,0.03); }
        .row { display:flex; gap:18px; margin-top:18px; }
        .col { flex:1 }
        .summary { background:#f3f4f6; padding:18px; border-radius:8px; }
        .download { background:#6b5ce3; color:#fff; padding:10px 14px; border-radius:8px; text-decoration:none; }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div style="font-weight:700;color:#fff;margin-bottom:20px;">PayrollPro</div>
        <nav>
            <a href="/employee" style="color:#cbd5e1;display:block;margin-bottom:8px">Dashboard</a>
            <a href="/employee/attendance" style="color:#cbd5e1;display:block;margin-bottom:8px">My Attendance</a>
            <a href="/employee/payslips" style="color:#fff;display:block">My Payslips</a>
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
        <div class="page-title"><h1>My Payslips</h1><div style="color:#6b7280">View and download your salary slips</div></div>

        <div class="card" style="margin-top:18px;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                <div>
                    <h2 style="margin:0">October 2025 Payslip</h2>
                    <div style="color:#6b7280">Net Pay: $6,000</div>
                </div>
                <a class="download" href="#">Download PDF</a>
            </div>

            <div class="row">
                <div class="col summary">
                    <div style="font-size:12px;color:#6b7280">Basic Salary</div>
                    <div style="font-size:26px;font-weight:700;margin-top:6px">$6,250</div>
                </div>
                <div class="col summary">
                    <div style="font-size:12px;color:#6b7280">Allowances</div>
                    <div style="font-size:26px;color:#10b981;font-weight:700;margin-top:6px">+$500</div>
                </div>
            </div>

            <div class="row" style="margin-top:12px;">
                <div class="col summary">
                    <div style="font-size:12px;color:#6b7280">Deductions</div>
                    <div style="font-size:26px;color:#ef4444;font-weight:700;margin-top:6px">-$750</div>
                </div>
                <div class="col summary" style="background:#eef2ff;">
                    <div style="font-size:12px;color:#6b7280">Net Pay</div>
                    <div style="font-size:26px;color:#6b5ce3;font-weight:700;margin-top:6px">$6,000</div>
                </div>
            </div>

            <div style="margin-top:18px;border-top:1px solid #eef2f6;padding-top:18px;">
                <h4>Breakdown</h4>
                <div style="display:flex;justify-content:space-between;padding:8px 0;"><div>Basic Salary</div><div>$6,250</div></div>
                <div style="display:flex;justify-content:space-between;padding:8px 0;"><div>Transport Allowance</div><div style="color:#10b981">+$200</div></div>
                <div style="display:flex;justify-content:space-between;padding:8px 0;"><div>Housing Allowance</div><div style="color:#10b981">+$300</div></div>
                <div style="display:flex;justify-content:space-between;padding:8px 0;border-top:1px solid #f3f4f6"><div>Tax (12%)</div><div style="color:#ef4444">-$750</div></div>
                <div style="display:flex;justify-content:space-between;padding:12px 0;font-weight:700;"><div>Total</div><div style="color:#6b5ce3">$6,000</div></div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
