<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <?php if(count($bookpurchase)){
			?>
        <table class="table table-striped table-bordered table-sm">
        	<thead>
            	<tr>
                	<th width="5%" 	align="center">Sl</th>
                    <th width="15%" align="center">Date</th>
                    <th width="20%" align="center">Books</th>
                    <th width="20%" align="center">Barcode</th>
                    <th width="20%" align="center">Author</th>
                    <th width="10%" align="center">Reg. No</th>
                    <th width="10%" align="center">Cost</th>
				</tr>
			</thead>
            <tbody>
            <?php 
			$i = 1;
		
			foreach($bookpurchase as $keys){
				
		?>
            <tr>
                <td width="5%" align="center"><?php echo $i; ?></td>
                <td width="10%"><?php echo date('d-m-Y', strtotime($keys->created_at)); ?></td>
                <td width="20%"><?php echo getsingledata('Books_m', 'name_eng', $keys->bookid); ?> (<?php echo getsingledata('Books_m', 'name_mal', $keys->bookid); ?>)</td>
                <td width="20%"><?php echo getsingledata('Books_m', 'barcode', $keys->bookid); ?></td>
                <td width="20%"><?php echo getsingledata('Books_m', 'author', $keys->bookid); ?></td>
                <td width="15%" align="center"><?php echo $keys->regno;?></td>
                <td width="10%"><?php echo $keys->praicecost; ?></td>
            </tr>
		<?php
				$i++;
			}
			  
		
		?>
    </tbody>
</table>
<?php } ?>
                    </div>
                </div>
            </div>