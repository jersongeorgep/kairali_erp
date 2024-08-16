<?php 
	$massages = "";
	if(isset($member)){ 
	$memberid = $member->id;
	$books_issued = getmanybydata('Booksissueline_m', array('member_id'=>$memberid, 'return_status'=>0));
		//echo $member->max_books_issue ;
	if(count($books_issued) > $member->max_books_issue){
		$massages = count($books_issued) ." books are pending to return.";
	}else{
?>
	<fieldset>
		<input type="hidden" name="member_id" value="<?php echo $member->id; ?>" />
	</fieldset>
	<fieldset>
		<label>Books</label>
    	<input type="text" class="form-control square" id="searchbook" onChange="getbooks(this.value, <?php echo $member->max_books_issue; ?>)" placeholder="Boonk Name / Barcode"  />
	</fieldset>
    <div>
    	<table class="table table-bordered table-sm table-striped">
        	<thead>
            	<tr>
                	<th width="40%">Book Name</th>
                    <th width="20%">Author</th>
                    <th width="10%">Action</th>
              	</tr>
 			</thead>
            <tbody id="bookslines">
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
		i--;
	}
</script>