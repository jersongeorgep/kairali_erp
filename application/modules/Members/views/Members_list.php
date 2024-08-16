<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"> <a href="<?php echo site_url('members/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('members/create-members');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span> &nbsp; 
                    	<span class="pull-right" style="margin-left:5px; margin-right:5px;"><form role="search" class="navbar-form navbar-right mt-1">
                <div class="position-relative has-icon-right">
                  <input type="text" id="searchmember" placeholder="Search" class="form-control round" onChange="getmember(this.value)"/>
                  <div class="form-control-position"><i class="ft-search"></i></div>
                </div>
              </form></span> &nbsp;</h4>
                </div>
                <div class="card-body">
                    <div class="card-block" id="showresult">
                    	<?php 
						if(count($members)){ ?>
                        <table class="table table-striped table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>E-mail</th>
                                    <th>Blood Group</th>
                                    <th>DOJ</th>
                                    <th width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i = $slno + 1;
							  foreach($members as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $cate->barcode; ?></td>
                                    <td><?php echo $cate->name; ?></td>
                                    <td><?php echo $cate->mobile; ?></td>
                                    <td><?php echo $cate->email; ?></td>
                                    <td><?php echo $cate->blood_groups; ?></td>
                                    <th><?= (($cate->date_of_join)? date('d-m-Y', strtotime($cate->date_of_join)) : ""); ?></th>
                                    <td><a href="<?php echo site_url('members/edit-members/'.$cate->id);?>"class="btn btn-primary btn-sm square"><i class="ft-edit-2"></i></a> <a onClick="return confirm('Do you want to delete this record?')" href="<?php echo site_url('members/delete/'.$cate->id); ?>" class="btn btn-danger btn-sm square"><i class="ft-trash-2"></i></a></td>
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
            
            <script>
            function getmember(member){
			$.ajax({
				url:"<?php echo site_url('members/searchmembers/');?>"+member,
				success: function(result){
					$('#showresult').html(result);
				}
				});
			}
            </script>