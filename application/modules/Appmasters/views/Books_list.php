<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Appmasters/books/uploadexcell');?>" class="btn btn-danger square" ><i class="ft-upload"></i></a> <a href="<?php echo site_url('appmasters/books/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('appmasters/books/create-books');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span>&nbsp;
                    <span class="pull-right" style="margin-left:5px; margin-right:5px;"><form role="search" class="navbar-form navbar-right mt-1">
                <div class="position-relative has-icon-right">
                  <input type="text" id="searchbooks" placeholder="Search" class="form-control round" onChange="getbooks(this.value)"/>
                  <div class="form-control-position"><i class="ft-search"></i></div>
                </div>
              </form></span> &nbsp;</h4>
                </div>
                <div class="card-body">
                    <div class="card-block table-responsive" id="showresult">
                    	<?php 
						if(count($bookslist)){ ?>
                        <table class="table table-striped table-bordered table-sm" style="font-size:11px">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th  width="15%">Stock No.</th>
                                    <th>Lan</th>
                                    <th>Malayalam</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Code</th>
                                    <th>Location</th>
                                    <th>Source</th>
                                    <th>DOP</th>
                                    <th>Cost</th>
                                    <th>Publishers</th>
                                    <th>Barcode</th>
                                    <th width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($bookslist as $gps){ 
							  ?>
                              <tr><th scope="row"><?php echo $i; ?></th>
                              <td><?php echo $gps->barcode; ?></td>
                              <td><?php echo $gps->language; ?></td>
                              <td><?php echo $gps->name_mal; ?></td>
                              <td><?php echo $gps->author; ?></td>
                              <td><?php echo getbydata('Categories_m','name', $gps->cateid, 'name_mal'); ?></td>
                              <td><?php echo $gps->cateid; ?></td>
                              <td><?php echo getbydata('Purchasebooksline_m','bookid',$gps->id, 'location'); ?></td>
                              <td><?php echo $gps->source; ?></td>
                              <td><?php echo $gps->purchase_date; ?></td>
                              <td><?php echo $gps->price; ?></td>
                              <td><?php echo $gps->book_publishers; ?></td>
                              <td><?= ($gps->barcode_number) ? $gps->barcode_number : '<button type="buttom" class="btn btn-sm btn-info square" onclick="open_barcode_window('.$gps->id.')"><i class="fa fa-barcode"></button>'; ?></td>
                              <td><a href="<?php echo site_url('appmasters/books/edit-books/'.$gps->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('appmasters/books/delete/'.$gps->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td></tr>
                              <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } 
						echo $this->pagination->create_links();
						?>
                    </div>
                </div>
            </div>

            <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Scan Barcode</h4>
                        </div>
                        <form action="" method="post" id="update_barcode">
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="barcode_number">Barcode</label>
                                                <textarea class="form-control"  name="barcode_number" id="barcode_number"></textarea>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <script>
            function getbooks(books){
			$.ajax({
				url:"<?php echo site_url('appmasters/books/searchbooks/');?>"+books,
				success: function(result){
					$('#showresult').html(result);
				}
				});
			}

            function open_barcode_window(book_id){
                var url = base_url + 'appmasters/books/update_barcode/'+book_id;
                $('#update_barcode').attr('action', url);
                $('#myModal').appendTo("body").modal('show');
                $('#barcode_number').focus();
            }

            
            </script>