<?php 
$i = 1;
if(count($members)){ 
?>
<h2 align="center">Members List</h2>
<table cellpadding="3" cellspacing="0" width="100%" style="font-size:9px">
	<thead>
    	<tr bgcolor="#F2F2F2">
    		<th style="border:1px solid #333;" width="5%" align="center">Sl</th>
            <th style="border:1px solid #33php3;" width="20%" align="center">Name</th>
        	<th style="border:1px solid #333;" width="20%" align="center">Barcode</th>
            <th style="border:1px solid #333;" width="20%" align="center">Address</th>
            <th style="border:1px solid #333;" width="10%" align="center">Blood Group</th>
        	<th style="border:1px solid #333;" width="13%" align="center">Contact</th>
            <th style="border:1px solid #333;" width="12%" align="center">Allowed</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
		
			foreach($members as $keys){
				
		?>
            <tr>
                <td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo $keys->name; ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo $keys->barcode; ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo $keys->address; ?></td>
                <td style="border:1px solid #333;" width="10%"><?php echo $keys->blood_groups; ?></td>
                <td style="border:1px solid #333;" width="13%" align="center"><?php echo $keys->mobile;?></td>
                <td style="border:1px solid #333;" width="12%"><?php echo $keys->max_books_issue; ?></td>
            </tr>
		<?php
				$i++;
			
			 } 
		
		?>
    </tbody>
</table>
<?php } ?>