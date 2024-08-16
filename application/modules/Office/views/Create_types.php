<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/types');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/types/create-types');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('office/types/save-types'); ?>">
                        	<fieldset>
                            	<label>Type Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="types_name" autocomplete="off" required />
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
            
            