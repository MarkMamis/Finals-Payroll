<h1>Attendance History</h1>
<?php if (!empty($records)): ?>
    <table>
        <tr><th>Date</th><th>In</th><th>Out</th><th>Hours</th></tr>
        <?php foreach ($records as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['attendance_date']) ?></td>
                <td><?= htmlspecialchars($r['clock_in']) ?></td>
                <td><?= htmlspecialchars($r['clock_out']) ?></td>
                <td><?= htmlspecialchars($r['hours_worked']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No attendance records.</p>
<?php endif; ?>
