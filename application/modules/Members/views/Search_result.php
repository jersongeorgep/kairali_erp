<?php 
						if(count($members)){ ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>E-mail</th>
                                    <th>Blood Group</th>
                                    <th width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = 1;
							  foreach($members as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $cate->barcode; ?></td>
                                    <td><?php echo $cate->name; ?></td>
                                    <td><?php echo $cate->mobile; ?></td>
                                    <td><?php echo $cate->email; ?></td>
                                    <td><?php echo $cate->blood_groups; ?></td>
                                    <td><a href="<?php echo site_url('members/edit-members/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('members/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
                                </tr>
                               <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } 
						//echo $this->pagination->create_links();
						?>