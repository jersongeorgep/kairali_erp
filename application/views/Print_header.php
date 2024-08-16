<?php 
$data = $this->Librarydetails_m->get(1);
?>
<table cellpadding="5" cellspacing="0" width="100%">
	<tbody> 
    	<tr>
        	<td width="50%"><img src="<?php echo site_url('app-assets/img/logos/logo_color.png');?>" width="50" /></td>
            <td width="50%">
            	<table cellpadding="0" cellspacing="0" width="100%">
                	<tbody>
                    	<tr>
                        	<td><p style="line-height:2px;">&nbsp;</p><p style="font-size:18px; font-weight:bold; line-height:20px; color:#009;"><?php echo strtoupper($data->fullname); ?></p></td>
                        </tr>
                        <tr>
                        	<td><p style="font-size:11px; color:#666";><?php echo $data->licenceno; ?></p></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>