<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/papermagazine');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/papermagazine/create-papermagazine');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('office/papermagazine/save-papermagazine/'.$papermagazine->id); ?>">
                        	<fieldset>
                            	<label>Paper Magazine Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="paper_magazine" autocomplete="off" required value="<?php echo $papermagazine->paper_magazine; ?>" />
                                	<div class="form-control-position"><i class="ft-edit info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Types</label>
                                <div class="position-relative has-icon-left">
                                	<select class="form-control square" name="type_id" required>
                                		<option value="0">- Select -</option>
                                    	<?php if(count($types)){ foreach($types as $keys){
											if($keys->id == $papermagazine->type_id){
												$select = "selected";
											}else{
												$select = "";
											}
											 ?>
                                        	<option value="<?php echo $keys->id; ?>" <?php echo $select; ?>><?php echo $keys->types_name; ?></option>
                                        <?php } }?>
                                	</select>
                                    
                                	<div class="form-control-position"><i class="ft-edit info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<button type="submit" class="btn btn-danger square" ><i class="ft-save"></i> Save</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            
            