<?php
$user = $this->session->userdata('user') ?? null;
$name = is_array($user) ? ($user['username'] ?? 'Employee') : ($user->username ?? 'Employee');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Employee Dashboard</title>
	<style>
		body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0; background:#f7f9fb; color:#1f2937; }
		.app { display:flex; min-height:100vh; }
		.sidebar { width:260px; background:#0f1724; color:#fff; padding:24px 18px; box-sizing:border-box; display:flex; flex-direction:column; }
		.brand { display:flex; align-items:center; gap:12px; margin-bottom:28px; }
		.brand .logo { width:40px; height:40px; border-radius:8px; background:#6b5ce3; display:inline-block; }
		nav { flex:1; }
		nav a { display:block; color:#cbd5e1; text-decoration:none; padding:12px 8px; border-radius:8px; margin-bottom:6px; }
		nav a.active, nav a:hover { background:rgba(255,255,255,0.04); color:#fff; }
		.profile { margin-top:auto; display:flex; align-items:center; gap:12px; }
		.avatar { width:44px; height:44px; border-radius:50%; background:#1f2937; display:inline-block; }
		.content { flex:1; padding:28px; box-sizing:border-box; }
		.title h1 { margin:0; font-size:34px; }
		.subtitle { color:#6b7280; margin-top:8px; }
		.grid { display:grid; grid-template-columns:repeat(3,1fr); gap:18px; margin-top:22px; }
		.card { background:#fff; border-radius:10px; padding:22px; box-shadow:0 1px 0 rgba(16,24,40,0.03); }
		.card h3 { margin:0; font-size:14px; color:#6b7280; }
		.card .value { font-size:28px; margin-top:8px; font-weight:700; }
		.panel-row { display:grid; grid-template-columns:2fr 1fr; gap:18px; margin-top:22px; }
		.panel { background:#fff; border-radius:10px; padding:20px; }
		.panel h3 { margin:0 0 12px 0; }
		.btn { background:#f3f4f6; border-radius:8px; padding:12px; color:#111827; text-decoration:none; display:inline-block; margin-bottom:10px; }
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
				<div style="font-weight:700;">PayrollPro</div>
				<div style="font-size:12px;color:#93c5fd;margin-top:2px;">Management System</div>
			</div>
		</div>
		<nav>
			<a href="/employee" class="active">Dashboard</a>
			<a href="/employee/attendance">My Attendance</a>
			<a href="/payslips">My Payslips</a>
		</nav>
		<div class="profile">
			<div class="avatar"></div>
			<div>
				<div style="font-weight:700;"><?php echo htmlentities($name); ?></div>
				<div style="font-size:12px;color:#9ca3af">Employee</div>
				<div style="margin-top:10px;"><a class="btn" href="/logout">Logout</a></div>
			</div>
		</div>
	</aside>

	<main class="content">
		<div class="title">
			<h1>Welcome back, <?php echo htmlentities($name); ?>!</h1>
			<div class="subtitle">Here's your overview for today</div>
		</div>

		<div class="grid">
			<div class="card">
				<h3>Today's Status</h3>
				<div class="value">Clocked In</div>
				<div style="color:#9ca3af;margin-top:8px;">Last clock in: 09:00 AM</div>
			</div>
			<div class="card">
				<h3>Hours This Week</h3>
				<div class="value">42.5</div>
				<div class="green">+2.5 hrs</div>
			</div>
			<div class="card">
				<h3>This Month's Pay</h3>
				<div class="value">$6,000</div>
				<div style="color:#9ca3af;margin-top:8px;">Net pay after deductions</div>
			</div>
		</div>

		<div class="panel-row">
			<div class="panel">
				<h3>Quick Actions</h3>
				<div style="color:#6b7280;margin-top:8px;">Manage your daily tasks</div>
				<div style="margin-top:18px;">
					<a class="btn" href="/attendance/clock">⏱️ Clock In/Out</a>
					<a class="btn" href="/payslips/latest">💲 View Latest Payslip</a>
				</div>
			</div>
			<div class="panel">
				<h3>Attendance Summary</h3>
				<div style="color:#6b7280;margin-top:8px;">Last 7 days</div>
				<div class="meta"><span>Present Days</span><span class="green">6</span></div>
				<div class="meta"><span>Late Arrivals</span><span style="color:#f59e0b;">1</span></div>
				<div class="meta"><span>Absent Days</span><span style="color:#ef4444;">0</span></div>
			</div>
		</div>
	</main>
</div>
</body>
</html>

