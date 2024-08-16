<div class="card">
	<div class="card-header">
    	<h4 class="card-title"><?php echo $pagename; ?></h4>
	</div>
    <div class="card-body">
    	<div class="card-block">
        <?php if(count($members)){
			?>
        <table class="table table-striped table-bordered table-sm">
        	<thead>
            	<tr>
                	<th width="5%">#</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Address</th>
                    <th>Blood Group</th>
                    <th>Mobile</th>
        			<th width="7%">Allow Books</th>
				</tr>
			</thead>
            <tbody>
            <?php 
			$i = 1;
			foreach($members as $keys){
				
		?>
            <tr>
                <td align="center"><?php echo $i; ?></td>
                <td ><?php echo $keys->name; ?></td>
                <td ><?php echo $keys->barcode; ?></td>
                <td ><?php echo $keys->address; ?></td>
                <td ><?php echo $keys->blood_groups; ?></td>
                <td ><?php echo $keys->mobile; ?></td>
                <td align="center"><?php echo $keys->max_books_issue; ?></td>
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