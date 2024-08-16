<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/incomeexpense');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/incomeexpense/create-inex-items');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($inexitems)){ ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="5%"></th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($inexitems as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo ($cate->type=="Income")? '<i class="ft-chevrons-up success"></i>' : '<i class="ft-chevrons-down danger"></i>'; ?></td>
                                    <td><?php echo $cate->name; ?></td>
                                    <td><?php echo $cate->type; ?></td>
                                    <td><a href="<?php echo site_url('office/incomeexpense/edit_inex_items/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('office/incomeexpense/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
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