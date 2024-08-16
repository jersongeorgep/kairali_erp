<?php 
$currentdate = date('d-m-Y');
$selecteddate = "01" ."-". $monthdata ."-" . $yeardata;
						if(count($types)){ ?>
                        <table class="table table-striped table-bordered table-sm" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th width="5%" class="center">#</th>
                                    <th width="2%"></th>
                                    <th>Paper / Magazine</th>
                                    <?php for($i=0; $i < date('t', strtotime($selecteddate));$i++) { ?>
                                    <th><?php echo ($i+1); ?></th>
                                    <?php } ?>              
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
							  $i 	=	1;
							  $k	=	1;
							  foreach($types as $cate){ 
							  	$papers = $this->Papermagazine_m->get_many_by(array('type_id'=>$cate->id, 'status'=>1))
							  ?>
                              <tr>
                              		<th scope="row"></th>
                                    <th></th>
                                    <td><b><?php echo $cate->types_name; ?></b></td>
                                    <td colspan="<?php echo date('t', strtotime($selecteddate)); ?>"><input type="hidden" name="monthdays" value="<?php echo date('t', strtotime($selecteddate)); ?>" /></td> 
                                    
                                </tr>
                                <?php if(count($papers)){  foreach($papers as $pema){ ?>
                                <tr>
                              		<th scope="row"><?php echo $k; ?></th>
                                    <th><input type="checkbox" id="selectall_<?php echo $k; ?>" onChange="selectallrow(<?php echo $k; ?>, <?php echo date('t', strtotime($selecteddate)); ?>)" /></th>
                                    <td><?php echo $pema->paper_magazine; ?></td>
                                    <?php for($j=0; $j < date('t', strtotime($selecteddate));$j++) { 
									$dailydate = date('Y-m-d', strtotime(($j+1)."-".$monthdata."-".$yeardata));
									?>
                                    <td><input type="checkbox" id="magazinedt_<?php echo $k; ?>_<?php echo $j; ?>" name="magazinedt[]" value="<?php echo $dailydate ."_". $pema->id; ?>" /></td>
                                    <?php } ?>
                                    
                                </tr>
								<?php $k++; } }?>
                               <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } ?>
						
                        	<fieldset class="pull-right">
                            	<button type="submit" class="btn btn-success square"><i class="fa fa-save"></i> Save</button>
                            </fieldset>
                        
                        <script>
                        	function selectallrow(rowid,days){
								row = document.getElementById('selectall_'+rowid);
								if(row.checked){
									for(k=0; k < days; k++){
										selectrow = document.getElementById('magazinedt_'+rowid+"_"+k);
										selectrow.checked = true;
									}
								}else{
									for(k=0; k < days; k++){
									selectrow = document.getElementById('magazinedt_'+rowid+"_"+k);
									selectrow.checked = false;
									}
								}
							}
                        </script>