<?php 
						if(count($bookslist)){ ?>
                        <table class="table table-striped table-bordered table-sm" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Stock No.</th>
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
							  $i = 1;
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
						//echo $this->pagination->create_links();
						?>