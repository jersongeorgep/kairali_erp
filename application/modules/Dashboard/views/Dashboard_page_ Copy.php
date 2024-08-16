
<!--Statistics cards Starts-->
			<div class="row">
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-blackberry">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><?php echo CountTable('Books_m', array('status'=>1)); ?></h3>
							<span>Books</span>
						</div>
						<div class="media-right white text-right">
							<i class="icon-pie-chart font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-ibiza-sunset">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><?php echo CountTable('Booksissueline_m', array('status'=>1)); ?></h3>
							<span>Books Issued</span>
						</div>
						<div class="media-right white text-right">
							<i class="icon-bulb font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>

			</div>
		</div>
	</div>
	
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-green-tea">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><?php echo CountTable('Members_m', array('status'=>1)); ?></h3>
							<span>Members</span>
						</div>
						<div class="media-right white text-right">
							<i class="icon-users font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-xl-3 col-lg-6 col-md-6 col-12">
		<div class="card gradient-pomegranate">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><?php echo CountTable('Damage_m', array('status'=>1)); ?></h3>
							<span>Damaged Books</span>
						</div>
						<div class="media-right white text-right">
							<i class="icon-wallet font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>
			</div>
		</div>
	</div>
</div>
			<!--Statistics cards Ends-->

        	
			<div class="row match-height">
	<div class="col-xl-12 col-lg-12 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Statistics</h4>
			</div>
			<div class="card-body">
				<div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2">				
				</div>
				<p class="font-medium-2 text-muted text-center pb-2">Monthly Books Issues</p>
			</div>
		</div>
	</div>
    
    <div class="col-xl-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Category Books</h4>
			</div>
			<div class="card-body">
				<div id="bar-chart" class="height-250 BarChartShadow BarChart">					
				</div>

				<div class="card-block">
					<div class="row">
						<?php 
						$colors = array('gradient-pomegranate', 'gradient-green-tea', 'gradient-blackberry', 'gradient-ibiza-sunset','gradient-flickr','gradient-cosmic-fusion');
						$i=0;
						if(count($categories)){ foreach($categories as $catkeys){ 
						if($i > 5){
							$i=0;
						}
						?>
                        <div class="col text-center">
							<span class="<?php echo $colors[$i];?> d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
							<span class="font-large-1 d-block mb-2"><?php echo countCategoryBooks($catkeys->id);?></span>
							<span><?php echo $catkeys->name; ?></span>
						</div>
                        <?php $i++; } } ?>
                    </div>
				</div>
                
                <p class="font-medium-2 text-muted text-center">Books Status</p>
			</div>
		</div>
	</div>
</div>

			<div class="row match-height">
	<div class="col-xl-4 col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title mb-0">Recent Members</h4>
			</div>
			<div class="card-body">
				<div class="card-block">
					<?php if(count($members)){ foreach($members as $keymembers){ ?>
                    <div class="media mb-1">
						<div class="media-body">
							<h4 class="font-medium-1 mt-1 mb-0"><?php echo $keymembers->name; ?></h4>
							<p class="text-muted font-small-3"><?php echo $keymembers->mobile; ?></p>
						</div>
						<div class="mt-1">
							<div class="mb-2 mr-sm-2 mb-sm-0">
                                <label class="" for="customcheckbox1"><?php echo $keymembers->blood_groups; ?></label>
                            </div>

						</div>
					</div>
					<?php } } ?>
                    
					<div class="action-buttons mt-2 text-center">
						<a href="<?php echo site_url('members/create-members');?>" class="btn btn-raised gradient-blackberry py-2 px-4 white mr-2">Add New</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-xl-8 col-lg-12 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Book to be return</h4>
			</div>
			<div class="card-body">
				<table class="table table-responsive-sm table-sm">
					<thead>
						<tr>
							<th>Book</th>
							<th>Author</th>
							<th>Issue to</th>
							<th>Mobile</th>
							<th>Delay</th>
						</tr>
					</thead>
					<tbody>
                    	<?php if($pendingbooks){ foreach($pendingbooks as $keybooks){ 
						$est_dt = getsingledata('Bookissue_m','est_return_date',$keybooks->issue_id);
							if(strtotime($est_dt) < strtotime(date('Y-m-d'))){
						?>
						<tr>
							<td><?php echo getsingledata('Books_m','name_eng',$keybooks->books_id); ?></td>
							<td><?php echo getsingledata('Books_m','author',$keybooks->books_id); ?></td>
							<td><?php echo getsingledata('Members_m','name',$keybooks->member_id); ?></td>
							<td><?php echo getsingledata('Members_m','mobile',$keybooks->member_id); ?></td>
							<td><?php echo funcdiff(date('Y-m-d'),$est_dt) ." Days"; ?></td>
						</tr>
						<?php 
							}
						} }?>
						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
    
	
</div>
	
<script>
	 // bar Chart Starts
    var Stackbarchart = new Chartist.Bar('#Stack-bar-chart', {
        labelGroup:[
			<?php for($i=0; $i<=11; $i++){
				echo '"'.$i.'",';	
			}?>
		],
		labels: [
			<?php for($i=0; $i<=11; $i++){
				echo '"'.date('M', strtotime("-".$i." month")).'",';	
			}?>
		],
        series: [
            [
			<?php for($i=0; $i<=11; $i++){
				echo getmonthlycount('Booksissueline_m', 'issue_date', date('m', strtotime("-".$i." month"))).',';	
			}?>
			],
            [
			<?php for($i=0; $i<=11; $i++){
				echo cal_days_in_month(CAL_GREGORIAN, date('m', strtotime("-".$i." month")),date('Y', strtotime("-".$i." month")) ).',';	
			}?>
			]
        ]
    }, {
            stackBars: true,
            fullWidth: true,
            axisX: {
                showGrid: false,
            },
            axisY: {
                showGrid: false,
                showLabel: false,
                offset: 0
            },
            chartPadding: 30
        });

    Stackbarchart.on('created', function (data) {
        var defs = data.svg.elem('defs');
        defs.elem('linearGradient', {
            id: 'linear',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(0, 201, 255,1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(17,228,183, 1)'
        });
    });
	
    Stackbarchart.on('draw', function (data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 5px',
                x1: data.x1 + 0.001
            });

        }
        else if (data.type === 'label') {
            data.element.attr({
                y: 270
            })
        }
		
    });


    // bar Chart Ends
	
	
	// Bar Chart Starts
    var barChart = new Chartist.Bar('#bar-chart', {
        labels: [
		<?php if(count($categories)){ foreach($categories as $catkeys){ ?> 
		<?php echo countCategoryBooks($catkeys->id).','; ?>
		 <?php  } } ?>
		],
        series: [[<?php if(count($categories)){ foreach($categories as $catkeys){ ?> 
		<?php echo '"'.countCategoryBooks($catkeys->name).'"'.','; ?>
		 <?php  } } ?>]]

    }, {
            axisX: {
                showGrid: false,
            },
            axisY: {
                showGrid: false,
                showLabel: false,
                offset: 0
            },
            low: 0,
            high: 60
        },
        [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ]);

    barChart.on('created', function (data) {
        var defs = data.svg.elem('defs');
        defs.elem('linearGradient', {
            id: 'gradient4',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(238, 9, 121,1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(255, 106, 0, 1)'
        });
        defs.elem('linearGradient', {
            id: 'gradient5',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(0, 75, 145,1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(120, 204, 55, 1)'
        });

        defs.elem('linearGradient', {
            id: 'gradient6',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(132, 60, 247,1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(56, 184, 242, 1)'
        });
        defs.elem('linearGradient', {
            id: 'gradient7',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
        }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(155, 60, 183,1)'
        }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(255, 57, 111, 1)'
        });
    });
    barChart.on('draw', function (data) {
        var barHorizontalCenter, barVerticalCenter, label, value;
        if (data.type === 'bar') {

            data.element.attr({
                y1: 195,
                x1: data.x1 + 0.001
            });

        }
    });
    //Bar Chart Ends	
   
</script>			

