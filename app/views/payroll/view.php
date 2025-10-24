<h1>Payroll for <?= htmlspecialchars($record['period'] ?? '') ?></h1>
<?php if (!empty($record)): ?>
    <p>Employee ID: <?= htmlspecialchars($record['employee_id']) ?></p>
    <p>Gross Pay: <?= number_format($record['gross_pay'],2) ?></p>
    <p>Net Pay: <?= number_format($record['net_pay'],2) ?></p>
<?php else: ?>
    <p>Payroll record not found.</p>
<?php endif; ?>
