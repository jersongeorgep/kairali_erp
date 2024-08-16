<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('bookissues');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('bookissues/add-books-issues');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                    	<?php 
						if(count($booksissue)){ ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Date</th>
                                    <th>Issue to</th>
                                    <th>Books</th>
                                    <th>Return</th>
                                    <th width="14%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($booksissue as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo date('d-m-Y', strtotime($cate->issue_date)); ?></td>
                                    <td><?php echo getsingledata('Members_m', 'name', $cate->member_id); ?></td>
                                    <td><?php echo countalldata('Booksissueline_m', array('issue_id'=>$cate->id,'return_status'=>0)); ?></td>
                                    <td><?php echo countalldata('Booksissueline_m', array('issue_id'=>$cate->id,'return_status'=>1)); ?></td>
                                    <td>
                                    	<a href="<?php echo site_url('Bookissues/view-issue-details/'.$cate->id);?>"class="btn btn-info btn-sm square"><i class="ft-eye"></i></a> 
                                    	<!--<a href="<?php echo site_url('bookissues/edit_books_issues/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a>-->
                                        <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('bookissues/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
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