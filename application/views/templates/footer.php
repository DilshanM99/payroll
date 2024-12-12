<Style>
    .brand-footer {
        margin-left: 300px;
    }
</Style>
</div>
<footer class="footer mt-5 py-3 bg-light">
    <div class="container text-center brand-footer">
        <?php if ($this->session->userdata('logged_in')): ?>
            <span class="text-muted">&copy; 2024 Payroll Management System</span>
        <?php endif; ?>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://example.com/fontawesome/v6.6.0/js/fontawesome.js" data-auto-replace-svg="nest"></script>
<script src="https://example.com/fontawesome/v6.6.0/js/solid.js"></script>
<script src="https://example.com/fontawesome/v6.6.0/js/brands.js"></script>

</body>

</html>