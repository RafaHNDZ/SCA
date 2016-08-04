
		<script src="<?php echo base_url();?>assets/js/jquery-3.0.0.js"></script>
		<script>
			$(document).ready(function() {
							// will first fade out the loading animation
				jQuery("#status").fadeOut();
							// will fade out the whole DIV that covers the website.
				jQuery("#preloader").delay(1000).fadeOut("slow");
			});
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

	<!--<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script> -->
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/app.js"></script>
	</body>
</html>
