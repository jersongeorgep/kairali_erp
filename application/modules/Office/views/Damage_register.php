<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/damagebooks');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/damagebooks/add-damage-books');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($damage)){ ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Date</th>
                                    <th>Book Name</th>
                                    <th>Damage Type</th>
                                    <th width="14%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($damage as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo date('d-m-Y', strtotime($cate->damage_date)); ?></td>
                                    <td><?php echo getsingledata('Books_m','name_eng',$cate->books_id); ?>(<?php echo getsingledata('Books_m','name_mal',$cate->books_id); ?>)</td>
                                    <td><?php echo $cate->damage_type; ?></td>
                                    <td> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('office/damagebooks/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
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