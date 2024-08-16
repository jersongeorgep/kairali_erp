<?php 
$cashincometotal = cash_in_hand($closebalancedt);
$bankincometotal  = cash_at_bank($closebalancedt);
$cashexpensetotal = 0;
$bankexpencetotal = 0;

 
?>
<h4 class="card-title" align="center"><?php echo $pagename; ?> from <?php echo date('d-m-Y', strtotime($periodfrom)); ?> to <?php echo date('d-m-Y', strtotime($periodto)); ?></h4>
<table cellpadding="0" cellspacing="0" width="100%" >
        	<thead>
            	<tr bgcolor="#F2F2F2">
                	<th width="50%" align="center" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-top:1px #333333 solid;">Income</th>
                    <th width="50%" align="center" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-top:1px #333333 solid; border-right:1px #333333 solid;">Expenses</th>
				</tr>
			</thead>
            <tbody>
            	<tr>
                	<td width="50%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-top:1px #333333 solid;"><table width="100%" cellpadding="5" cellspacing="0" style="font-size:10px;">
                    	<thead>
                        	<tr bgcolor="#F2F2F2">
								<th width="18%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Date</th>
                                <th width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Perticulars</th>
                                <th width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Cash</th>
                                <th width="20%" style="border-right:1px #333333 solid; border-bottom:1px #333333 solid;" align="center">Bank</th>
                            </tr> 
                        </thead>
                        <tbody>
                        	<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;">Opening Bal. on (<?php echo date('d-m-Y', strtotime($closebalancedt)); ?>)</td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo number_format(cash_in_hand($closebalancedt),2,'.',','); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo number_format(cash_at_bank($closebalancedt),2,'.',','); ?></td>
                            </tr>
                            <?php if(count($tansactions)){ foreach($tansactions as $keyincome){ 
							if(getsingledata('Incomexpense_m','type',$keyincome->perticular_id)=='Income'){
								$cashincometotal += (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==0)? $keyincome->tran_amount : 0;
								$bankincometotal += (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==1)? $keyincome->tran_amount: 0;
							?>
							<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo date('d-m-Y', strtotime($keyincome->tran_date));?></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo getsingledata('Incomexpense_m','name',$keyincome->perticular_id);?></td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==0)? number_format($keyincome->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyincome->perticular_id)==1)? number_format($keyincome->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php } } }?>
                        </tbody>	                    
                    </table>
                    </td>
                    <td width="50%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-top:1px #333333 solid; border-right:1px #333333 solid;"><table cellpadding="5" cellspacing="0" style="font-size:10px">
                    	<thead>
                        	<tr bgcolor="#F2F2F2">
								<th width="18%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Date</th>
                                <th width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Perticulars</th>
                                <th width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Cash</th>
                                <th width="20%" style="border-right:1px #333333 solid; border-bottom:1px #333333 solid;" align="center">Bank</th>
                            </tr> 
                        </thead>
                        <tbody>
                        	<?php if(count($tansactions)){ foreach($tansactions as $keyexpense){ 
							if(getsingledata('Incomexpense_m','type',$keyexpense->perticular_id)=='Expense'){
								$cashexpensetotal += (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==0)? $keyexpense->tran_amount : 0;
								$bankexpencetotal += (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==1)? $keyexpense->tran_amount : 0;
							?>
							<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo date('d-m-Y', strtotime($keyexpense->tran_date));?></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo getsingledata('Incomexpense_m','name',$keyexpense->perticular_id);?></td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==0)? number_format($keyexpense->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo (getsingledata('Incomexpense_m','bank_item',$keyexpense->perticular_id)==1)? number_format($keyexpense->tran_amount,2,".",",") : number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php } } }?>
                            
                        </tbody>	                    
                    </table>
                    </td>
                </tr>
            </tbody>
            <tfoot>
            	<tr>
                	<th width="50%" align="center"><table cellpadding="5" cellspacing="0" style="font-size:11px">
                    		<tr>
								<td width="18%" style="border:1px #333333 solid;"></td>
                                <td width="44%" style="border:1px #333333 solid;"><b>Total</b></td>
                                <td width="18%" style="border:1px #333333 solid;" align="right"><b><?php echo number_format($cashincometotal,2,".",","); ?></b></td>
                                <td width="20%" style="border:1px #333333 solid;" align="right"><b><?php echo number_format($bankincometotal,2,".",","); ?></b></td>
                            </tr>               
                    	</table>
                    </th>
                    <th width="50%" align="center"><table cellpadding="5" cellspacing="0" style="font-size:11px">
                    		<tr>
								<td width="18%" style="border:1px #333333 solid;"></td>
                                <td width="44%" style="border:1px #333333 solid;"><b>Total</b></td>
                                <td width="18%" style="border:1px #333333 solid;" align="right"><b><?php echo number_format($cashexpensetotal,2,".",","); ?></b></td>
                                <td width="20%" style="border:1px #333333 solid;" align="right"><b><?php echo number_format($bankexpencetotal,2,".",","); ?></b></td>
                            </tr>
                            <tr>
                            	<td width="18%" style="border:1px #333333 solid;"></td>
                                <td width="44%" style="border:1px #333333 solid;">Closing Bal.</td>
                                <td width="18%" style="border:1px #333333 solid;" align="right"><?php echo number_format(($cashincometotal - $cashexpensetotal),2,".",",");?></td>
                                <td width="20%" style="border:1px #333333 solid;" align="right"><?php echo number_format(($bankincometotal - $bankexpencetotal),2,".",",");?></td>
                            </tr>               
                    	</table>
                    </th>
                </tr>
            </tfoot>
		</table>
