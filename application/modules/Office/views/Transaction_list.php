<div class="row">
<div class="col-sm-8">
<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/transactions');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/transactions/create-transaction');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($transactions)){ ?>
                        <table class="table table-striped table-bordered table-sm" style="font-size:13px">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Date</th>
                                    <th>Particulars</th>
                                    <th width="20%">Amount</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($transactions as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo date('d-m-Y',strtotime($cate->tran_date)); ?></td>
                                    <td><?php echo getsingledata('Incomexpense_m','name',$cate->perticular_id); ?></td>
                                    <td align="right"><span class="pull-left">(<?php echo (getsingledata('Incomexpense_m','type',$cate->perticular_id)=="Income")? "<i class='ft-plus success'></i>":"<i class='ft-minus danger'></i>";?>)</span><?php echo number_format($cate->tran_amount,'2'); ?></td>
                                    <td><a href="<?php echo site_url('office/transactions/edit-transaction/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('office/transactions/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
                                </tr>
                               <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } 
						echo $this->pagination->create_links();
						?>
                    </div>
                </div>
            </div>
</div>
<div class="col-sm-4">
<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reports</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-12">
		<div class="card gradient-blackberry">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><small><i class="fa fa-rupee"></i></small> <?php echo number_format(cash_in_hand(),2,".",","); ?></h3>
							<span>Cash-in-Hand</span>
						</div>
						<div class="media-right white text-right">
							<i class="icon-wallet font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">					
				</div>
			</div>
		</div>
	</div>
    
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
		<div class="card gradient-green-tea">
			<div class="card-body">
				<div class="card-block pt-2 pb-0">
					<div class="media">
						<div class="media-body white text-left">
							<h3 class="font-large-1 mb-0"><small><i class="fa fa-rupee"></i></small> <?php echo number_format(cash_at_bank(),2,'.',','); ?></h3>
							<span>Cash at Bank</span>
						</div>
						<div class="media-right white text-right">
							<i class="fa fa-bank font-large-1"></i>
						</div>
					</div>
				</div>
				<div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">				
				</div>
			</div>
		</div>
	</div>
    
	<div class="col-xl-12 col-lg-12 col-md-12 col-12">
		<a href="<?php echo site_url('reports/accountsreport/nalvazhi_report');?>" class="btn btn-danger square">Daily Report</a> <a href="<?php echo site_url('reports/accountsreport/monthlyreport');?>" class="btn btn-success square">Monthly Report</a>
	</div>
</div>
                    </div>
                </div>
            </div>
</div>
</div>