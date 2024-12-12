<div class="col-8">
    <div id="payslip-content">
        <div class="header">
            <h2>Pay Slip - <?php echo $payslip['employee_name']; ?></h2>

            <span class="pay-period"><?php echo date('F Y', strtotime($payslip['month'])); ?></span>

        </div>

        <div class="container">
            <divclass="payslip-table">
                <table>
                    <tr>
                        <th>Basic Salary</th>
                        <td><?php echo $payslip['basic_salary']; ?></td>
                    </tr>
                    <tr>
                        <th>Allowance</th>
                        <td><?php echo $payslip['allowance']; ?></td>
                    </tr>
                    <tr>
                        <th>EPF</th>
                        <td><?php echo $payslip['epf']; ?></td>
                    </tr>
                    <tr>
                        <th>Gross Salary</th>
                        <td><?php echo $payslip['gross_salary']; ?></td>
                    </tr>
                    <tr>
                        <th>Net Salary</th>
                        <td><?php echo $payslip['net_salary']; ?></td>
                    </tr>
                </table>
        </div>
    </div>
    
    <div class="container text-right mt-4">
        <button id="downloadBtn" class="btn btn-primary" onclick="downloadPDF()">Download Pay Slip</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script>
    document.getElementById('downloadBtn').addEventListener('click', function () {
        const element = document.getElementById('payslip-content');  // Select the payslip content

        // Convert the content to PDF using html2pdf
        html2pdf(element, {
            margin: 10,
            filename: 'payslip.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    });

</script>