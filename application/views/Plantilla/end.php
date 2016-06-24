
		<script src="<?php echo base_url();?>assets/js/jquery-3.0.0.js"></script>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/app.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.colVis.min.js"></script>

		<script>
			$(document).ready(function(){
				$('#tabla').DataTable({
		      "paging": true,
		      "lengthChange": true,
		      "searching": true,
		      "ordering": true,
		      "info": true,
		      "autoWidth": true
		    });
			});
		</script>
	</body>
</html>
