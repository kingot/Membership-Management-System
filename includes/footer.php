<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>NDC</b>
        </div>
        <strong>Copyright &copy; 2015 <a href="#">TEIN</a>.</strong> All rights reserved.
      </footer>

     
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
      <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
     <script type="text/javascript" src="../jquery.js"></script>
     
    <script type="text/javascript">
	
		/*   script to get members live search */
			$('#search').keyup(function(){

 			var search_term = $(this).val();

 		$.post('search.php',{search_term: search_term }, function(data){
 		//display info
 		$('#search_results').html(data);
 		
 			});
		});
		

		/*   script to get members live search  ends here */
		
		$('#search_dues').keyup(function(){

 			var search_term_dues = $(this).val();

 		$.post('search-dues.php',{search_term_dues: search_term_dues }, function(data){
 		//display info
 		$('#search_results_dues').html(data);
 		
 			});
		});
		
		/*   script to get pay dues live search */
		
		
		/*   script to get paid dues  live search ends*/
		$('#search_dues_paid').keyup(function(){

 			var search_term_dues_paid = $(this).val();

 		$.post('search-dues-paid.php',{search_term_dues_paid: search_term_dues_paid }, function(data){
 		//display info
 		$('#search_results_dues_paid').html(data);
 		
 			});
		});
		
		
		
		/*   script to get student leve live search ends*/
		$('#search_level').keyup(function(){

 			var search_term_level = $(this).val();

 		$.post('search-level-js.php',{search_term_level: search_term_level }, function(data){
 		//display info
 		$('#search_results_level').html(data);
 		
 			});
		});
		
		
 
		$('#dob').datepicker({format: 'dd/mm/yyyy'});
		//$('#Date').datepicker({dateFormate: 'dd/mm/yy',showButtonPanel: true,showAnim: 'fadeIn'});
		 $('#date_reg').datepicker({format: 'dd/mm/yyyy'});
        

	
     $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      }); 

    </script>
  </body>
</html>
