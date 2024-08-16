<?php 
	$massages = "";
	if(isset($member)){ 
	$memberid = $member->id;
	$books_issued = getmanybydata('Booksissueline_m', array('member_id'=>$memberid, 'return_status'=>0));
	if(count($books_issued) > $member->max_books_issue){
		$massages = count($books_issued) ." books are pending to return.";
	}else{
?>
	<fieldset>
		<input type	="hidden" name="member_id" value="<?php echo $member->id; ?>" />
	</fieldset>
	<div>
    	<table class="table table-bordered table-sm table-striped">
        	<thead>
            	<tr>
                	<th width="5%"></th>
					<th width="1%"></th>
                	<th width="45%">Book Name</th>
                    <th width="20%">Author</th>
              	</tr>
 			</thead>
            <tbody id="bookslines">
            <?php if(count($books_issued)){ 
					foreach($books_issued as $keys){
			?>
            	<tr>
                	<td align="center"><input type="checkbox" name="lineitems[]" value="<?php echo $keys->id; ?>" /></td>
					<td><?php echo(getsingledata('Bookissue_m','trans_type',$keys->issue_id) == 0)?'<i class="ft-check-circle success"></i>':'<i class="ft-check-square danger"></i>';?></td>
				    <td><?php echo getsingledata('Books_m','name_mal',$keys->books_id); ?><br /><small><?php echo getsingledata('Books_m','barcode',$keys->books_id); ?></small></td>
                    <td><?php echo getsingledata('Books_m','author',$keys->books_id); ?></td>
                </tr>
            <?php		
					}
			} ?>
            </tbody>
		</table>
    </div>
<?php }  ?>

<?php } else { ?> 
		<div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span aria-hidden="true">×</span>
		</button>
        <strong>Oh snap!</strong> Member is not available in our database. Please Create New Membership
	</div>	
<?php } ?>

<script>

	var i = <?php echo count($books_issued); ?> ;
	function getbooks(books, maxissue){
		if(i  >= maxissue){
			$('#searchbook').attr('disabled','disabled');
		}else{
			$.ajax({
				url:"<?php echo site_url('bookissues/getbooks/');?>"+books,
				success: function(result){
					$('#bookslines').append('<tr>' + result +'</tr>');
					$('#searchbook').val("");
					i++;
				}
			});
		}
		
	}
	
	function deleteline(id){
		$('#btndelete_'+id).closest("tr").remove();	
	}
</script>