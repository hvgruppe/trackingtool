<?php ini_set('display_errors', 1); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reports</title>
    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" />
	<!-- Bootstrap Responsive CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- MetisMenu CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.css" />
	<!-- Data Table CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/css/jquery.dataTables.css" />
    <!-- Timeline CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>dist/css/timeline.css" />
	<!-- Multi Select CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/multiselect/css/bootstrap-multiselect.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>dist/css/sb-admin-2.css" />
	<!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<style>
		.clsalerttext{
			border-color: #a94442;
			box-shadow : 0 1px 1px rgba(0, 0, 0, 0.075) inset;
			outline : 0 none;
		}
	</style>
</head>

<body>
    <div id="wrapper">
		
		<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href=<?php echo site_url('store/homepage');?>>
					<img src="<?php echo base_url();?>img/gizmoland.png" alt="gizmoland" />
				</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
       
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>-->
                        <li><a href=<?php echo site_url('login');?>><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-top:90px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=<?php echo site_url('admin/homepage');?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Configuration <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
									<a href=<?php echo site_url('admin/fullfillment');?>>Fullfillment</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/disposition');?>>Disposition</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/productcondition');?>>Product Condition</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/productstatus');?>>Product Status</a>
								</li>
								<li>
									<a href=<?php echo site_url('admin/brand');?>>Brand</a>
								</li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href=<?php echo site_url('admin/feedback');?>><i class="fa fa-edit"></i> Feedback</a>
                        </li>
						<li>
                            <a href=<?php echo site_url('admin/reports');?> ><i class="fa fa-table"></i> Feedback Reports</a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('admin/dashboard');?>>Reimbursement Report</a>
                        </li>
                        <li>
                            <a href=<?php echo site_url('admin/caselog');?>>Case Log Report</a>
                        </li>
						<li>
                            <a href=<?php echo site_url('admin/productreceive');?>>Product Not Yet Received</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
        	<div id="chartContainer">FusionCharts XT will load here!</div>
        </div>
        <div class="dataTableDetails" style="display:none;">
        	<table cellpadding="0" cellspacing="0" border="0"  id="example" style="width:100%;" class="table table-striped table-bordered">
              		<thead class="alignCenter">
                 		<tr>
                 			<th class="headerclass">Tracking Id</th>         
				          	<th class="headerclass">Description</th>
				          	<th class="headerclass">Category</th>
				          	<th class="headerclass">UPC</th>
                 		</tr>
              		</thead>
              		<tbody></tbody>
              		<tfoot  class="alignCenter headerclass">
	                	<tr>
				          	<th class="headerclass">Tracking Id</th>         
				          	<th class="headerclass">Description</th>
				          	<th class="headerclass">Category</th>
				          	<th class="headerclass">UPC</th>
				        </tr>
              		</tfoot>
              	</table> 
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<!-- jQuery -->
    <script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	

	<!-- Bootstrap Core JavaScript -->
    
	<script src="<?php echo base_url();?>pillscss/bootstrap.js"></script>
    
	<!-- Bootstrap Wizard JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/bootstrap-wizard.js"></script>
	
	<!-- Multi Select CSS -->
	<script src="<?php echo base_url();?>assets/multiselect/js/bootstrap-multiselect.js"></script>
		

	<script src="<?php echo base_url();?>assets/datatables/js/jquery.dataTables.js"></script>

	<!-- Prettify JavaScript -->	
	<script src="<?php echo base_url();?>assets/prettify/run_prettify.js"></script>
	
	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
	
    <script src="<?php echo base_url();?>assets/fusioncharts/fusioncharts.js"></script>
    <script src="<?php echo base_url();?>assets/fusioncharts/fusioncharts.charts.js"></script>
    <script src="<?php echo base_url();?>assets/fusioncharts/fusioncharts.powercharts.js"></script>
    <script src="<?php echo base_url();?>assets/fusioncharts/themes/fusioncharts.theme.fint.js"></script>

    <script type="text/javascript">

    var revenueChart;

	FusionCharts.ready(function(){
	    revenueChart = new FusionCharts({
	        "type": "multilevelpie",
	        "renderAt": "chartContainer",
	        "viewMode" : "1",
	        "width": "800",
	        "height": "600"
	    });

	  	 var url = "caselog/fetchChart";
	    revenueChart.setXMLUrl(url);
	    revenueChart.render();
		
	});

	function loadAutomatically()
	{	
	    var url = "fetchChart";
	    revenueChart.setJSONUrl(url);
	    revenueChart.render();
	}
</script>

	<script>
	var clientTable;
	$(document).ready(function() {

	  	$('#rootwizard').bootstrapWizard({'tabClass': 'nav nav-pills'});	
		window.prettyPrint && prettyPrint();
	
		
		$("#fromdate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
			
		$("#todate").datepicker({
			dateFormat:"dd-mm-yy",
			yearRange: '1920:2020',
			minDate: "01-01-1920",
			maxDate: "01-01-2020",
			changeMonth: true,
			changeYear: true
		});
		/*
		$('#fullfillment').multiselect({
			multiple:true,
			noneSelectText:"Select Fullfillment",
			selectedList:-1
		}).multiselectfilter();*/
		
		$('#designation').multiselect({
            checkboxName: 'designationselect[]',
			noneSelectText:"Select Designation"
        });
		
		$('#interest').multiselect({
            checkboxName: 'interestselect[]',
			noneSelectText:"Select Brand"
        });
		
		/*$('#disposition').multiselect({
            checkboxName: 'dispositionselect[]',
			noneSelectText:"Select Disposition"
        });*/
		
		
		$('#experience').multiselect({
            checkboxName: 'experienceselect[]',
			noneSelectText:"Select Remark"
        });
		
		$('#professional').multiselect({
            checkboxName: 'professionalselect[]',
			noneSelectText:"Select Remark"
        });
		
		$('#knowby').multiselect({
            checkboxName: 'knowbyselect[]',
			noneSelectText:"Select"
        });
		
		$('#product').multiselect({
            checkboxName: 'productselect[]',
			noneSelectText:"Select Brand"
        });
		
	});	
	
	
	function validateFormFields(){
		var fullfillment = $("#fullfillment").val();
		var fromdate = $("#fromdate").val();
		var todate = $("#todate").val();
		
		var errorstr = "";
		var valid = true;
		
		if (fromdate > todate)
		{
			errorstr += "<div class='alert alert-danger'>From Date should be early than to Date</div><BR/>";
			$('#divfromdate').addClass('has-error');
			valid = false;
		}
		/*
		if(fullfillment == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select fullfillment!</div><BR/>";
			$('#divfullfillment').addClass('has-error');
			$('#divtodate').addClass('has-error');
			valid = false;
		}*/
		
		
		if(fromdate == '')
		{
			errorstr += "<div class='alert alert-danger'>Please select From date!</div><BR/>";
			$('#divfromdate').addClass('has-error');
			valid = false;
		}
		
		
		if(todate == '')
		{
			errorstr += "<div class='alert alert-danger'>Please enter to date!</div><BR/>";
			$('#divtodate').addClass('has-error');
			valid = false;
		}
		
		
		if(!valid)
		{
			$(".modal-body").html(errorstr);
			$('#myModal').modal('toggle');
		}
		return valid;
	}
	
	$(":input").keypress(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
		
		inid = "#"+$(this).attr('id');
		$(inid).removeClass('clsalerttext');
	});
	
	$(":input").mousedown(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
		
		inid = "#"+$(this).attr('id');
		$(inid).removeClass('clsalerttext');
	});
	
	$("select").mousedown(function() {
		//$('div').removeClass('has-error');
		eleid = "#div"+$(this).attr('id');
		$(eleid).removeClass('has-error');
	});
	
	function myJS(details)
	{
		$(".dataTableDetails").show();
        var det = details.split(",");
        var startTime = det[0];
        var currTime = det[1];
        var brand = '';
        if(det[2])
        	brand = det[2];

        //var url = "/dashboard/showDataTableForDashboard?startTime=" + startTime + "&currTime=" + currTime  + "&brand=" + brand
        $('#example').dataTable().fnDestroy();
        clientTable = $('#example').DataTable({
		    	"ajax":{
             		"url":"caselog/showDataTableForCase",
             		type:"POST",
					data:{"startTime":startTime,"currTime":currTime,"brand":brand},
             	},
		        "columnDefs": [
		            
		        ],
		        "bPaginate": false,
		        "sScrollY": "auto",
		        "sScrollX": "100%",
		        //"bFilter": false,
		        "order": [[ 1, 'desc' ]],
		        "columns": [
		        	{ "data": "ordernumber" },  
                    { "data": "description" },
                    { "data": "category" },
                    { "data": "upc" }
                    //{ "data": "rowid"}
                ]
		    });

         $("body, html").animate({ 
			            scrollTop: $('.dataTableDetails').offset().top 
			        }, 600);
        /*
        $.ajax({
			url:"dashboard/showDataTableForDashboard",
			type:"POST",
			data:{"startTime":startTime,"currTime":currTime,"brand":brand},
			success:function(msg){
				alert(msg)
			}
		});*/
	}
	</script>
  
</body>

</html>