<h1>Create Employee</h1>
<form method="post" action="<?= site_url('employees/store') ?>">
    <label>Employee Code</label>
    <input type="text" name="employee_code" />
    <label>Hire Date</label>
    <input type="date" name="hire_date" />
    <button type="submit">Save</button>
</form>
