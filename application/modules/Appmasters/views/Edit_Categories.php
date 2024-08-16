<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Appmasters/Categories/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('Appmasters/Categories/create-categories');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('appmasters/categories/save-categories/'.$category->id); ?>">
                        	<fieldset>
                            	<label>Category Name</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name" autocomplete="off" value="<?php echo $category->name; ?>" />
                                	<div class="form-control-position"><i class="ft-edit info"></i></div>
								</div>
                            </fieldset>
                            <p></p>
                            <fieldset>
                            	<label>Malayalam</label>
                                <div class="position-relative has-icon-left">
                                	<input type="text" class="form-control square" name="name_mal" autocomplete="off" value="<?php echo $category->name_mal; ?>"/>
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