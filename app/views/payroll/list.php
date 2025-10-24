<h1>Payroll Records</h1>
<?php if (!empty($records)): ?>
    <ul>
    <?php foreach ($records as $r): ?>
        <li><a href="<?= site_url('payroll/view/'.$r['id']) ?>"><?= htmlspecialchars($r['period']).' - '.number_format($r['net_pay'],2) ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No payroll records found.</p>
<?php endif; ?>
