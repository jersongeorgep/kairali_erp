<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/circulars');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/circulars/create_circular');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($circulars)){ ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Date</th>
                                    <th>Number</th>
                                    <th>Subject</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($circulars as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo date('d-m-Y',strtotime($cate->cir_date)); ?></td>
                                    <td><?php echo $cate->cir_number; ?></td>
                                    <td><?php echo $cate->cir_subject; ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo site_url('office/circulars/view_circular/'.$cate->id);?>"class="btn btn-success btn-sm square"><i class="ft-eye"></i></a> 
                                        <a target="_blank" href="<?php echo site_url('office/circulars/printcircular/'.$cate->id);?>"class="btn btn-warning btn-sm square"><i class="ft-printer"></i></a> 
                                        <a href="<?php echo site_url('office/circulars/edit-circular/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> 
                                        <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('office/circulars/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
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