

<?php 
$i = 1;
if(count($members)){ 
?>
<div style="width:800px;">
<table cellpadding="0" cellspacing="0" width="100%" style="font-size:8px" >
	<tbody>
    <?php  foreach($members as $keys){ ?>
		<tr>
        	<td width="50%" align="center"><img src="<?php echo site_url('reports/set_barcode/'.$keys->barcode); ?>" width="200" height="50"/></td>
            <td width="50%">
				<table cellpadding="5" cellspacing="0" width="100%">
                	<tr>
                    	<td width="30%"><img  src="<?php echo site_url('app-assets/img/logos/logo_black_wight.png');?>" width="80%" /></td>
                        <td width="70%">
                        	<table cellpadding="3" cellspacing="0" width="100%">
                            	<tr>
                                	<td align="center"><h2 style="padding:0px; margin:2px;"><?php echo $Library->fullname; ?></h2><span style="padding-top:-30px;"><?php echo $Library->address; ?></span></td>
                                </tr>
                                <tr>
                                	<td align="center"><span style="padding-top:-30px; text-transform: uppercase; font-weight:bold; background-color:#333; color:#FFF; padding:5px;">Membership Card</span> </td>
                                </tr>
                                <tr>
                                	<td><span style="font-weight:bold;">Name: <?php echo ucfirst($keys->name); ?></span></td>
                                </tr>
                                <tr>
                                	<td style="font-size:11px">Address : <?php echo $keys->address; ?></td>
                                </tr>
                                <tr>
                                	<td style="font-size:12px">Contact : <?php echo $keys->mobile; ?></td>
                                </tr>
                                <tr>
                                	<td style="font-size:12px">Blood Group : <?php echo $keys->blood_groups; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
		</tr>
        <tr>
        	<td colspan="2" style="border-top:1px dotted #999;"></td>
        </tr>
	<?php $i++; } ?>
    </tbody>
</table>
</div>
<?php } ?>