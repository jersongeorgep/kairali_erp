<?php if(count($books)) { 
	if(getBookCopies($books->id) < 1){
	}else{
?>
<td><?php echo $books->name_eng; ?> (<?php echo $books->name_mal; ?>) <br /> <?php echo $books->barcode; ?></td>
    <td><?php echo $books->author; ?><input type="hidden" name="bookid[]" value="<?php echo $books->id; ?>" /></td>
    <td><button type="button" onClick="deleteline(<?php echo $books->id; ?>)" id="btndelete_<?php echo $books->id; ?>" class="btn btn-danger btn-sm square"><i class="ft-delete"></i></button></td>
<?php } } ?>