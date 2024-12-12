<div class="col-8">

    <h2 class="mb-4">Payroll Processing</h2>

    <form action="<?php echo base_url('payroll_processing'); ?>" method="post">
        <div class="form-group">
            <label for="processed_by">Processed By</label>
            <input type="text" name="processed_by" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="month">Month</label>
            <input type="text" name="month" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Payroll</button>
    </form>
    
</div>
