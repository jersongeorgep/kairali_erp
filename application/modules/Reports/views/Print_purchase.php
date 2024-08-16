<?php 
$i = 1;
if(count($bookpurchase)){ 
?>
<h2 align="center">Book Purchase Report</h2>
<table cellpadding="3" cellspacing="0" width="100%" style="font-size:9px">
	<thead>
    	<tr bgcolor="#F2F2F2">
    		<th style="border:1px solid #333;" width="5%" align="center">Sl</th>
            <th style="border:1px solid #333;" width="10%" align="center">Date</th>
            <th style="border:1px solid #33php3;" width="20%" align="center">Books</th>
        	<th style="border:1px solid #333;" width="20%" align="center">Barcode</th>
            <th style="border:1px solid #333;" width="20%" align="center">Author</th>
            <th style="border:1px solid #333;" width="15%" align="center">Reg No</th>
        	<th style="border:1px solid #333;" width="10%" align="center">Cost</th>
        </tr>
    </thead>
    <tbody>
    	<?php 
			foreach($bookpurchase as $keys){
				
		?>
            <tr>
                <td style="border:1px solid #333;" width="5%" align="center"><?php echo $i; ?></td>
                <td style="border:1px solid #333;" width="10%"><?php echo date('d-m-Y', strtotime($keys->created_at)); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m', 'name_eng', $keys->bookid); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m', 'barcode', $keys->bookid); ?></td>
                <td style="border:1px solid #333;" width="20%"><?php echo getsingledata('Books_m', 'author', $keys->bookid); ?></td>
                <td style="border:1px solid #333;" width="15%" align="center"><?php echo $keys->regno;?></td>
                <td style="border:1px solid #333;" width="10%" align="right"><?php echo $keys->praicecost; ?></td>
            </tr>
		<?php
				$i++;
			
			 } 
		?>
    </tbody>
</table>
<?php } ?>