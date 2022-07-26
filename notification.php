<!DOCTYPE html>
<html lang="ro">
 <?php require "includes/header.php"; ?>
 <?php require "includes/notification-table-content.php"; ?>
 <body>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <span class="h3 mb-0 text-gray-800">Notificarii si alerte</span><br>
            Setari notificare - <a href="add-notification.php"><i class="fas fa-fw fa-cog"></i></a><br>
            Marcheaza toate intrarile ca citite - <a href="data.php?type=notification-read-all"><i class="fas fa-glasses"></i></a>
        </div>

        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table" id="dataTable" data-order='[[0, "desc"]]' width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descriere</th>
                            <th>Data - Ora</th>
                            <th>Tip</th>
                            <th>Actiune</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo notificationTableContent();?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require "includes/footer.php"; ?>
 <!-- End of Footer -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
 </a>

 <!-- Javascript includes-->
 <script src="js/vendor/chart.js/Chart.min.js"></script>
 <script src="js/time.js"></script>
 <script src="js/jquery.min.js"></script>
 <script src="js/custom.js"></script>
 <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="js/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="js/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 <script src="js/demo/datatables-demo.js"></script>
 <script src="js/nav.js"></script>
 <script>
 // Call the dataTables jQuery plugin
 $(document).ready(function() {
    $('#dataTable').DataTable();
    });
</script>
</body>
</html>