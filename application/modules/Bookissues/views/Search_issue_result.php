<?php $i = 1;
foreach($booksissue as $cate){ 
							  ?>
                              <tr>
                              		<th scope="row"><?php echo $i; ?></th>
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