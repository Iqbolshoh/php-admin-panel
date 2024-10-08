<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->
  <?php include 'includes/css.php' ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">


    <!-- Navbar -->
    <?php include 'includes/navbar.php' ?>

    <div class="content-wrapper">

      <!-- Page path -->
      <?php
      $arr = array(
        ["title" => "Home", "url" => "./"],
        ["title" => "DataTable", "url" => "#"],
      );
      pagePath('DataTable', $arr);
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <?php
              // read JSON
              $jsonData = file_get_contents('data.json');
              $data = json_decode($jsonData, true);

              echo '<div class="card-body">';
              echo '<table id="example2" class="table table-bordered table-hover">';
              echo '<thead>';
              echo '<tr>';
              echo '<th>Rendering engine</th>';
              echo '<th>Browser</th>';
              echo '<th>Platform(s)</th>';
              echo '<th>Engine version</th>';
              echo '<th>CSS grade</th>';
              echo '</tr>';
              echo '</thead>';
              echo '<tbody>';

              // print data
              foreach ($data as $row) {
                echo '<tr>';
                echo '<td>' . $row['Rendering_engine'] . '</td>';
                echo '<td>' . $row['Browser'] . '</td>';
                echo '<td>' . $row['Platform'] . '</td>';
                echo '<td>' . $row['Engine_version'] . '</td>';
                echo '<td>' . $row['CSS_grade'] . '</td>';
                echo '</tr>';
              }

              echo '</tbody>';
              echo '<tfoot>';
              echo '<tr>';
              echo '<th>Rendering engine</th>';
              echo '<th>Browser</th>';
              echo '<th>Platform(s)</th>';
              echo '<th>Engine version</th>';
              echo '<th>CSS grade</th>';
              echo '</tr>';
              echo '</tfoot>';
              echo '</table>';
              echo '</div>';
              ?>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    <!-- Main Footer -->
    <?php include 'includes/footer.php' ?>

  </div>
  <!-- ./wrapper -->

  <!-- SCRIPTS -->
  <?php include 'includes/js.php' ?>

  <!-- DataTables -->
  <script src="includes/js/jquery.dataTables.min.js"></script>
  <script src="includes/js/dataTables.bootstrap4.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>