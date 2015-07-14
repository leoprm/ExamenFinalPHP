			<footer class="main-footer">
	        	<div class="pull-right hidden-xs">
	          		<b>Version</b> 1.0
	        	</div>
	        	<strong>Copyright &copy; 2015 <a href="<?= ROOT_URL ?>">Mira en tu Interior</a></strong>
	      	</footer>
	    </div>

	    <script src="<?= ROOT_URL ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	    <script src="<?= ROOT_URL ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	    <script src="<?= ROOT_URL ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	    <script src='<?= ROOT_URL ?>assets/plugins/fastclick/fastclick.min.js'></script>
	    <script src="<?= ROOT_URL ?>assets/dist/js/app.min.js" type="text/javascript"></script>
	    <script src="<?= ROOT_URL ?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	    <script src="<?= ROOT_URL ?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
	    <!-- bootstrap color picker -->
	    <script src="<?= ROOT_URL ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        
	    <script>
	    	$(document).ready(function() {
	    		if( $('#dataTablesTable').length ){
	    	    	$('#dataTablesTable').dataTable();
	    		}
	    	/*colorpicker*/	
	    	$(".my-colorpicker1").colorpicker();	
	    	} );
	    </script>
	    <!-- funcion para confirmar eliminar producto-->
	    <script type="text/javascript">		
		function confirmation() {
    	if(confirm("Realmente desea eliminar?"))
    	{
       		return true;
    	}
    		return false;
		}
		</script>
  </body>
</html>