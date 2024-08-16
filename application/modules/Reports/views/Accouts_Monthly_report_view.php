<?php 
$cashincometotal = cash_in_hand($closebalancedt);
$bankincometotal  = cash_at_bank($closebalancedt);
$cashexpensetotal = 0;
$bankexpencetotal = 0;
$slin = 0;
$slex = 0;
?>
<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?> <small>, For The Month of <?php echo date('F', strtotime($startdate)); ?></small> <span class="pull-right"><a href="<?php echo site_url('office/transactions');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('reports/accountsreport/nalvazhi-report');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
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
								<th width="18%">Sl No</th>
                                <th width="44%">Perticulars</th>
                                <th width="18%">Cash</th>
                                <th width="20%">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td><?php echo $slin += 1; ?></td>
                                <td>Opening Bal. on (<?php echo date('d-m-Y', strtotime($closebalancedt)); ?>)</td>
                                <td align="right"><?php echo number_format(cash_in_hand($closebalancedt),2,'.',','); ?></td>
                                <td align="right"><?php echo number_format(cash_at_bank($closebalancedt),2,'.',','); ?></td>
                            </tr>
                            <?php if(count($incomeitems)){ $slin += 1; foreach($incomeitems as $keyincome){

								$cashincometotal += ($keyincome->bank_item == 0)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
								$bankincometotal += ($keyincome->bank_item == 1)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                                
                                $cashIncomeItem = ($keyincome->bank_item == 0)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                                $bankIncomeItem = ($keyincome->bank_item == 1)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                                 

                                if($cashIncomeItem != 0 || $bankIncomeItem !=0):
							?>
							<tr>
                            	<td><?php echo $slin; ?></td>
                                <td><?php echo $keyincome->name;?></td>
                                <td align="right"><?php echo ($keyincome->bank_item == 0)? number_format(monthlyitemtotal($startdate, $lastdate, $keyincome->id),2,".",","):number_format(0,2,".",","); ?></td>
                                <td align="right"><?php echo ($keyincome->bank_item == 1)? number_format(monthlyitemtotal($startdate, $lastdate, $keyincome->id),2,".",","):number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php  $slin++; 
                            endif;
                            } 
                            
                            }
                            ?>
                        </tbody>	                    
                    </table>
                    </td>
                    <td>
                    <table class="table table-bordered table-sm" style="font-size:13px">
                    	<thead>
                        	<tr>
								<th width="18%">Sl No</th>
                                <th width="44%">Perticulars</th>
                                <th width="18%">Cash</th>
                                <th width="20%">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(count($Expenseitems)){ $slex += 1; foreach($Expenseitems as $keyexpense){ 
							$cashexpensetotal += ($keyexpense->bank_item==0)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
							$bankexpencetotal += ($keyexpense->bank_item==1)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;

                            $cashExpenseItem = ($keyexpense->bank_item==0)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
                            $bankExpenseItem = ($keyexpense->bank_item==0)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
                            if($cashExpenseItem != 0 || $bankExpenseItem != 0):
							?>
							<tr>
                            	<td><?php echo $slex;?></td>
                                <td><?php echo $keyexpense->name;?></td>
                                <td align="right"><?php echo ($keyexpense->bank_item==0)? number_format(monthlyitemtotal($startdate, $lastdate, $keyexpense->id),2,".",","): number_format(0,2,".",","); ?></td>
                                <td align="right"><?php echo ($keyexpense->bank_item==1)? number_format(monthlyitemtotal($startdate, $lastdate, $keyexpense->id),2,".",","): number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php  $slex++; 
                            endif;
                            } }?>
                            
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