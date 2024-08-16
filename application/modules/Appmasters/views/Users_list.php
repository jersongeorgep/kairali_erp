<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('appmasters/users/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('appmasters/users/create-users');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($groupslists)){ ?>
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($groupslists as $gps){ 
							  ?>
                              <tr><th scope="row"><?php echo $i; ?></th>
                              <td><?php echo $gps->name; ?></td>
                              <td><a href="<?php echo site_url('appmasters/users/edit-users/'.$gps->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('appmasters/users/delete/'.$gps->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td></tr>
                              <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } 
						echo $this->pagination->create_links();
						?>
                    </div>
                </div>
            </div>