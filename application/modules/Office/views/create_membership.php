<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo $pagename; ?><span class="pull-right"><a href="<?php echo site_url('office/transactions'); ?>" class="btn btn-info square"><i class="ft-list"></i></a> <a href="<?php echo site_url('office/transactions/create-transaction'); ?>" class="btn btn-success square"><i class="ft-file-plus"></i></a></span></h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <form class="form" method="post" action="<?php echo site_url('office/membership/save-membership'); ?>">
                <fieldset>
                    <label>Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text square"><span class="fa fa-calendar-o"></span></span>
                        </div>
                        <input type='date' name="collection_date" class="form-control square" value="<?php echo date('Y-m-d'); ?>" placeholder="Date" />
                    </div>
                </fieldset>
                <fieldset>
                    <label>Months</label>
                    <select class="form-control square" name="collcted_for_months[]" multiple required>
                        <?php  for($i = 1; $i < 13; $i++){ ?>
                            <option value="<?= get_month_fullname($i); ?>"><?= get_month_fullname($i); ?></option>
                            <?php } ?>
                    </select>
                </fieldset>
                <p></p>
                <fieldset>
                    <label>Member</label>
                    <select class="form-control square" name="member_id" required>
                        <option value="">--Select--</option>
                        <?php if (count($members)) { ?>
                            <?php foreach ($members as $items) { ?>
                                <option value="<?php echo $items->id; ?>"><?php echo $items->barcode; ?>&nbsp;&nbsp;<?php echo $items->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </fieldset>
                <p></p>

                <fieldset>
                    <label>Amount</label>
                    <div class="position-relative has-icon-left">
                        <input type="text" class="form-control square" name="amount" autocomplete="off" />
                        <div class="form-control-position"><i class="icon-wallet info"></i></div>
                    </div>
                </fieldset>
                <p></p>
                <fieldset>
                    <button type="submit" class="btn btn-danger square"><i class="ft-save"></i> Save</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>