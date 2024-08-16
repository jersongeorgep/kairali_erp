<?php 
$data = $this->Librarydetails_m->get(1);
?>
<hr />
<table cellpadding="1" cellspacing="0" width="100%" align="center">
	<tbody>
    	<tr>
        	<td><p style="font-size:11px; color:#666";><?php echo $data->address; ?></p></td>
		</tr>
        <tr>
        	<td><p style="font-size:11px; color:#666";><?php echo $data->phone; ?>, <?php echo $data->mobile; ?></p></td>
		</tr>
    </tbody>
</table>