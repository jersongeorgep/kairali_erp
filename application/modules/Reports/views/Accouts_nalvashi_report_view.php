<?php 
$cashincometotal = cash_in_hand($closebalancedt);
$bankincometotal  = cash_at_bank($closebalancedt);
$cashexpensetotal = 0;
$bankexpencetotal = 0;

 
?>
<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?> <small>From <?php echo date('d-m-Y', strtotime($periodfrom)); ?> to <?php echo date('d-m-Y', strtotime($periodto)); ?></small> <span class="pull-right"><a href="<?php echo site_url('office/transactions');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('reports/accountsreport/nalvazhi-report');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <table class="table table-sm">
        	<thead>
            	<tr>
                	<th width="50%" align="center">Income</th>
                    <th width="50%" align="center">Expenses</th>
				</tr>
			</thead>
            <tbody>
            	<tr>
                	<td>
                    <table class="table table-bordered table-sm" style="font-size:13px">
                    	<thead>
                        	<tr>
								<th width="18%">Date</th>
                                <th width="44%">Perticulars</th>
                                <th width="18%">Cash</th>
                                <th width="20%">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td></td>
                                <td>Opening Bal. on (<?php echo date('d-m-Y', strtotime($closebalancedt)); ?>)</td>
                                <td align="right"><?php echo number_format(cash_in_hand($closebalancedt),2,'.',','); ?></td>
                                <td align="right"><?php echo number_format(cash_at_bank($closebalancedt),2,'.',','); ?></td>
                            </tr>
                            <?php if(count($tansactions)){ foreach($tansactions as $keyincome){ 
							if(getsingledata('Incomexpense_m','type',$keyincome->perticular_id)=='Income'){
								$cashincometotal += (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==0)? $keyincome->tran_amount : 0;
								$bankincometotal += (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==1)? $keyincome->tran_amount : 0;
							?>
							<tr>
                            	<td><?php echo date('d-m-Y', strtotime($keyincome->tran_date));?></td>
                                <td><?php echo getsingledata('Incomexpense_m','name',$keyincome->perticular_id);?></td>
                                <td align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==0)? number_format($keyincome->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                                <td align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==1)? number_format($keyincome->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php } } }?>
                        </tbody>	                    
                    </table>
                    </td>
                    <td>
                    <table class="table table-bordered table-sm" style="font-size:13px">
                    	<thead>
                        	<tr>
								<th width="18%">Date</th>
                                <th width="44%">Perticulars</th>
                                <th width="18%">Cash</th>
                                <th width="20%">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(count($tansactions)){ foreach($tansactions as $keyexpense){ 
							if(getsingledata('Incomexpense_m','type',$keyexpense->perticular_id)=='Expense'){
								$cashexpensetotal += (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==0)? $keyexpense->tran_amount: 0;
								$bankexpencetotal += (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==1)? $keyexpense->tran_amount: 0;
							?>
							<tr>
                            	<td><?php echo date('d-m-Y', strtotime($keyexpense->tran_date));?></td>
                                <td><?php echo getsingledata('Incomexpense_m','name',$keyexpense->perticular_id);?></td>
                                <td align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==0)? number_format($keyexpense->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                                <td align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==1)? number_format($keyexpense->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php } } }?>
                            
                        </tbody>	                    
                    </table>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            	<tr>
                	<th width="50%" align="center">
                    	<table class="table table-bordered table-sm" style="font-size:13px">
                    		<tr>
								<td width="18%"></td>
                                <td width="44%"><b>Total</b></td>
                                <td width="18%" align="right"><b><?php echo number_format($cashincometotal,2,".",","); ?></b></td>
                                <td width="20%" align="right"><b><?php echo number_format($bankincometotal,2,".",","); ?></b></td>
                            </tr>               
                    	</table>
                    </th>
                    <th width="50%" align="center">
                    	<table class="table table-bordered table-sm" style="font-size:13px">
                    		<tr>
								<td width="18%"></td>
                                <td width="44%"><b>Total</b></td>
                                <td width="18%" align="right"><b><?php echo number_format($cashexpensetotal,2,".",","); ?></b></td>
                                <td width="20%" align="right"><b><?php echo number_format($bankexpencetotal,2,".",","); ?></b></td>
                            </tr>
                            <tr>
                            	<td></td>
                                <td>Closing Bal.</td>
                                <td align="right"><?php echo number_format(($cashincometotal - $cashexpensetotal),2,".",",");?></td>
                                <td align="right"><?php echo number_format(($bankincometotal - $bankexpencetotal),2,".",",");?></td>
                            </tr>               
                    	</table>
                    </th>
                </tr>
            </tfoot>
		</table>
		</div>
	</div>
</div>