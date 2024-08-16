<?php 
$cashincometotal = cash_in_hand($closebalancedt);
$bankincometotal  = cash_at_bank($closebalancedt);
$cashexpensetotal = 0;
$bankexpencetotal = 0;
$slin = 0;
$slex = 0;
?>
<h4 align="center"><?php echo $pagename; ?>  For The Month of <?php echo date('F', strtotime($startdate)); ?></h4>
<table cellpadding="0" cellspacing="0" width="100%">
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
								<th width="18%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Sl No</th>
                                <th width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Perticulars</th>
                                <th width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Cash</th>
                                <th width="20%" style="border-right:1px #333333 solid; border-bottom:1px #333333 solid;" align="center">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo $slin += 1; ?></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;">Opening Bal. on (<?php echo date('d-m-Y', strtotime($closebalancedt)); ?>)</td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo number_format(cash_in_hand($closebalancedt),2,'.',','); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo number_format(cash_at_bank($closebalancedt),2,'.',','); ?></td>
                            </tr>
                            <?php if(count($incomeitems)){ $slin += 1; foreach($incomeitems as $keyincome){
								$cashincometotal += ($keyincome->bank_item == 0)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
								$bankincometotal += ($keyincome->bank_item == 1)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                                $cashincome = ($keyincome->bank_item == 0)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                                $bankincome = ($keyincome->bank_item == 1)? monthlyitemtotal($startdate, $lastdate, $keyincome->id):0;
                            ?>
                            <?php if($cashincome == 0 && $bankincome == 0){}else{ ?>
							<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo $slin; ?></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo $keyincome->name;?></td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo ($keyincome->bank_item == 0)? number_format(monthlyitemtotal($startdate, $lastdate, $keyincome->id),2,".",","):number_format(0,2,".",","); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo ($keyincome->bank_item == 1)? number_format(monthlyitemtotal($startdate, $lastdate, $keyincome->id),2,".",","):number_format(0,2,".",","); ?></td>
                            </tr>
                            
							<?php  $slin++; } }?>
                            <?php } ?>	
                        </tbody>	                    
                    </table>
                    </td>
                    <td width="50%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-top:1px #333333 solid; border-right:1px #333333 solid;"><table cellpadding="5" cellspacing="0" style="font-size:10px">
                    	<thead>
                        	<tr bgcolor="#F2F2F2">
								<th width="18%" style="border-left:1px #333333 solid; border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Sl No</th>
                                <th width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Perticulars</th>
                                <th width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="center">Cash</th>
                                <th width="20%" style="border-right:1px #333333 solid; border-bottom:1px #333333 solid;" align="center">Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if(count($Expenseitems)){ $slex += 1; foreach($Expenseitems as $keyexpense){ 
							$cashexpensetotal += ($keyexpense->bank_item==0)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
							$bankexpencetotal += ($keyexpense->bank_item==1)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
							$cahsexpence = ($keyexpense->bank_item==0)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
                            $bankexpence = ($keyexpense->bank_item==1)? monthlyitemtotal($startdate, $lastdate, $keyexpense->id): 0;
                            ?>
                            <?php if($cahsexpence == 0 && $bankexpence == 0 ){}else{ ?>
							<tr>
                            	<td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo $slex;?></td>
                                <td width="44%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;"><?php echo $keyexpense->name;?></td>
                                <td width="18%" style="border-bottom:1px #333333 solid; border-right:1px #333333 solid;" align="right"><?php echo ($keyexpense->bank_item==0)? number_format(monthlyitemtotal($startdate, $lastdate, $keyexpense->id),2,".",","): number_format(0,2,".",","); ?></td>
                                <td width="20%" style="border-bottom:1px #333333 solid;" align="right"><?php echo ($keyexpense->bank_item==1)? number_format(monthlyitemtotal($startdate, $lastdate, $keyexpense->id),2,".",","): number_format(0,2,".",","); ?></td>
                            </tr>	
							<?php  $slex++; } }?>
                            <?php } ?>
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
