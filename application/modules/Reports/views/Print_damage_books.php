<?php 
$i = 1;
if(count($bookdamage)){ 
?>
<h2 align="center">Damage Books Report</h2>
<table cellpadding="3" cellspacing="0" width="100%" style="font-size:9px">
	<thead>
    	<tr bgcolor="#F2F2F2">
    		<th style="border:1px solid #333;" width="5%" align="center">Sl</th>
            <th style="border:1px solid #333;" width="12%" align="center">Date</th>
            <th style="border:1px solid #33php3;" width="20%" align="center">Books</th>
        	<th style="border:1px solid #333;" width="20%" align="center">Barcode</th>
            <th style="border:1px solid #333;" width="20%" align="center">Author</th>
            <th style="border:1px solid #333;" width="20%" align="center">Damage Type</th>
            
        </tr>
    </thead>
    <tbody>
    	<?php 
			foreach($bookdamage as $keys){
				
		?>
            <tr>
                <td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
                <td style="border:1px solid #333;" width="12%"><?php echo date('d-m-Y',strtotime($keys->damage_date)); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m','name_eng',$keys->books_id); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m','barcode',$keys->books_id); ?></td>
                <td style="border:1px solid #333;" width="20%" align="center"><?php echo getsingledata('Books_m','author',$keys->books_id); ?></td>
                <td style="border:1px solid #333;" width="20%" align="center"><?php echo $keys->damage_type;?></td>
                
            </tr>
		<?php
				$i++;
			 } 
		?>
    </tbody>
</table>
<?php } ?>