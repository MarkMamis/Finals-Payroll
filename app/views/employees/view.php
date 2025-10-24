<h1>Employee Details</h1>
<?php if (!empty($employee)): ?>
    <p>Employee Code: <?= htmlspecialchars($employee['employee_code']) ?></p>
    <p>Base Salary: <?= number_format($employee['base_salary'],2) ?></p>
<?php else: ?>
    <p>Employee not found.</p>
<?php endif; ?>
