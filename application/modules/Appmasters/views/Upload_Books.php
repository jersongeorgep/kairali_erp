<div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('Appmasters/Categories/');?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('Appmasters/Categories/create-categories');?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form class="form" method="post" action="<?php echo site_url('appmasters/books/upload_excel'); ?>" enctype="multipart/form-data">
                        	<fieldset>
                            	<label>Upload <small>(Excel file .xsl)</small></label>
                                <div class="position-relative has-icon-left">
                                	<input type="file" class="form-control square" name="uploadexcel" autocomplete="off" />
                                	<div class="form-control-position"><i class="ft-upload info"></i></div>
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