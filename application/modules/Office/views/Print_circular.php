<table cellpadding="5" cellspacing="" width="100%">
	<tr>
    	<td colspan="2" align="center"><h1 style="text-decoration:underline">CIRCULAR</h1></td>
    </tr>
    <tr>
    	<td align="left">No : <?php echo $circular->cir_number;?></td>
        <td align="right">Date : <?php echo date('d-m-Y', strtotime($circular->cir_date));?></td>
    </tr>
    <tr>
    	<td colspan="2" align="left"><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;<i>Sub:- <b><?php echo $circular->cir_subject;?></b></i><br /></p></td>
    </tr>
    <tr>
    	<td colspan="2" align="left">Dear Members,</td>
    </tr>
    <tr>
    	<td colspan="2" align="left"><?php echo $circular->cir_text;?></td>
    </tr>
     <tr>
    	<td colspan="2" align="right">Yours faithfully, <br /><br /> Secretory</td>
    </tr>
</table>