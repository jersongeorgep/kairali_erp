<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <?php if(count($bookissue)){
			?>
        <table class="table table-striped table-bordered table-sm">
        	<thead>
            	<tr>
                	<th width="5%" 	align="center">Sl</th>
                    <th width="10%" align="center">Date</th>
                    <th width="20%" align="center">Books</th>
                    <th width="20%" align="center">Author</th>
                    <th width="20%" align="center">Barcode</th>
                    <th width="15%" align="center">Issue to</th>
                    <th width="10%" align="center">Status</th>
				</tr>
			</thead>
            <tbody>
            <?php 
			$i = 1;
		
			foreach($bookissue as $keys){
				
		?>
            <tr>
                <td width="5%" align="center"><?php echo $i; ?></td>
                <td width="10%"><?php echo date('d-m-Y', strtotime($keys->issue_date)); ?></td>
                <td width="20%"><?php echo getsingledata('Books_m', 'name_mal', $keys->books_id); ?></td>
                <td width="20%"><?php echo getsingledata('Books_m', 'author', $keys->books_id); ?></td>
                <td width="20%"><?php echo getsingledata('Members_m', 'barcode', $keys->member_id);?></td>
                <td width="15%" align="center"><?php echo getsingledata('Members_m', 'name', $keys->member_id);?></td>
                <td width="10%"><?php echo (($keys->return_status) == 1)?"Returned" : "Pending"; ?></td>
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