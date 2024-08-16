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
                                	<td colspan="8"><form role="search" class="navbar-form navbar-right mt-1">
                                    <div class="position-relative has-icon-right">
                                      <input type="text" id="searchfield" placeholder="Search" class="form-control round" onChange="get_search_result(this.value)"/>
                                      <div class="form-control-position"><i class="ft-search"></i></div>
                                    </div>
                                  </form></td>
                                </tr>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="1%"></th>
                                    <th>Date</th>
                                    <th>Code</th>
                                    <th>Issue to</th>
                                    <th>Books</th>
                                    <th>Return</th>
                                    <th width="14%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="showresult">
                              <?php 
							  $i = $slno + 1;
							  foreach($booksissue as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i;
									?></th>
                                    <td><?php echo($cate->trans_type == 0)?'<i class="ft-check-circle success"></i>':'<i class="ft-check-square danger"></i>';?></td>
                                    <td><?php echo date('d-m-Y', strtotime($cate->issue_date)); ?></td>
                                    <td><?php echo getsingledata('Members_m', 'barcode', $cate->member_id); ?></td>
                                    <td><?php echo getsingledata('Members_m', 'name', $cate->member_id); ?></td>
                                    <td><?php echo countalldata('Booksissueline_m', array('issue_id'=>$cate->id,'return_status'=>0)); ?></td>
                                    <td><?php echo countalldata('Booksissueline_m', array('issue_id'=>$cate->id,'return_status'=>1)); ?></td>
                                    <td>
                                    	<a href="<?php echo site_url('Bookissues/view-issue-details/'.$cate->id);?>"class="btn btn-info btn-sm square"><i class="ft-eye"></i></a> 
                                    	<!--<a href="<?php echo site_url('bookissues/edit_books_issues/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a>-->
                                        <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('bookissues/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
                                </tr>
                               <?php $i++; 
							   
							   autoReturn($cate->id);
							   } ?>
                            </tbody>
                        </table>
                        <?php } 
						echo $this->pagination->create_links();
						?>
                    </div>
                </div>
            </div>
            
            <script>
            function get_search_result(value){
				if(value == ""){
					location.reload(true);
				}else{
					$.ajax({
						url:"<?php echo site_url('Bookissues/bookissues/get-search-result/');?>"+ value,
						success: function(result){
							$('#showresult').html(result);
						}	
					});
				}
			}
            </script>