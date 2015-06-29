<?php $this->load->view('includes/withouttable');?>
    <div class="page-wrapper">
		
		<div class="span12">
			<section id="wizard">
			  <div class="page-header">
	            <h1>Basic Pills Wizard</h1>
	          </div>
	
				<div id="rootwizard">
					<ul class="nav nav-pills">
					  	<li class=""><a href="#tab1" data-toggle="tab">First</a></li>
						<li class=""><a href="#tab2" data-toggle="tab">Second</a></li>
						<li class=""><a href="#tab3" data-toggle="tab">Third</a></li>
						<li class=""><a href="#tab4" data-toggle="tab">Forth</a></li>
						<li class=""><a href="#tab5" data-toggle="tab">Fifth</a></li>
						<li class="active"><a href="#tab6" data-toggle="tab">Sixth</a></li>
						<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
					</ul>
					<div class="tab-content">
					    <div class="tab-pane" id="tab1">
					      1
					    </div>
					    <div class="tab-pane" id="tab2">
					      2
					    </div>
						<div class="tab-pane" id="tab3">
							3
					    </div>
						<div class="tab-pane" id="tab4">
							4
					    </div>
						<div class="tab-pane" id="tab5">
							5
					    </div>
						<div class="tab-pane active" id="tab6">
							6
					    </div>
						<div class="tab-pane" id="tab7">
							7
					    </div>
						<ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">First</a></li>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="next last" style="display:none;"><a href="#">Last</a></li>
						  	<li class="next"><a href="#">Next</a></li>
						</ul>
					</div>	
				</div>
			
			</section>
 		</div>
	</div>
    <!--<script src="<?php echo base_url();?>pillscss/jquery.js"></script>
	<script src="<?php echo base_url();?>pillscss/bootstrap.js"></script>-->
	
	<!-- jQuery -->
    <script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
    
	<script src="<?php echo base_url();?>pillscss/bootstrap.js"></script>
    
	<!-- Bootstrap Wizard JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/bootstrap-wizard.js"></script>
	
	<!-- Prettify JavaScript -->	
	<script src="<?php echo base_url();?>assets/prettify/run_prettify.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
	<script>
	$(document).ready(function() {
	  	$('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-pills'});	
		window.prettyPrint && prettyPrint()
	});	
	</script>
  

</body></html>