<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="assets/demo/chart-area-demo.js"></script> -->
<!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
<script>
   google.charts.load('current', {
      'packages': ['corechart']
   });
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {

      var data = google.visualization.arrayToDataTable([
         ['Task', 'Hours per Day'],
         ['Views', <?php echo $session->count; ?>],
         ['Photos', <?php echo Photo::count_all(); ?>],
         ['Users', <?php echo User::count_all(); ?>],
         ['Comments', <?php echo Comment::count_all(); ?>],
      ]);

      var options = {
         legend: 'none',
         pieSliceText: 'label',
         backgroundColor: 'transparent',
         title: 'DashBoard',
         colors: ['#0d6efd','#198754','#ffc107','#dc3545']
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
   }
</script>
<!-- <script src="js/datatables-simple-demo.js"></script> -->

</body>

</html>