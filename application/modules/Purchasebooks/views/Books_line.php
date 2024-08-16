<?php if(count($books)){ 
?>
<td><?php echo $books->barcode; ?><br /><?php echo $books->name_eng; ?> (<?php echo $books->name_mal; ?>) - <?php echo $books->author; ?></td>
    <td>
    <input type="hidden" name="bookid[]" value="<?php echo $books->id; ?>" />
    <input type="text" name="bookregno[]" class="form-control input-sm square" /></td>
    <td><input type="text" name="location_no[]" class="form-control input-sm square" value="" /></td>
    <td><select name="source_id[]" class="form-control square">
    <?php if(count($sources)){ foreach($sources as $keys){ ?>
    <option value="<?php echo $keys->id; ?>"><?php echo $keys->source_name; ?></option>
    <?php } }?>
    </select></td>
    <td><input type="text" name="bookscost[]" class="form-control input-sm square" value="<?php echo $books->price; ?>" /></td>
    <td><button type="button" onClick="deleteline(<?php echo $books->id; ?>)" id="btndelete_<?php echo $books->id; ?>" class="btn btn-danger btn-sm square"><i class="ft-delete"></i></button></td>
<?php  } ?>