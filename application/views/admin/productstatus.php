<?php
	if($this->session->userdata('roleid')!=1){
		// echo site_url('login');
		print "<script>window.location.href='".site_url('login')."';</script>";
	}
?>
<?php $this->load->view('includes/adminconfiguration');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
				<div class="panel-heading">Product Status</div>
				<div class="panel-body">
				<?php echo $output; ?>
			</div>
			</div> 
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>

</body>

</html>