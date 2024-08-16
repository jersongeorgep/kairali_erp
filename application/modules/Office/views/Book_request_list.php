<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/requestbooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/requestbooks/create-request');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($request)){ ?>
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Member Code</th>
                                    <th width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($request as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $cate->book_name; ?></td>
                                    <td><?php echo $cate->author_name; ?></td>
                                    <td><?php echo $cate->member_code; ?></td>
                                    <td><a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('office/requestbooks/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
                                </tr>
                               <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } 
						echo $this->pagination->create_links();
						?>
                    </div>
                </div>
            </div>