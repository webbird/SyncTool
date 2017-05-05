    <div class="modal fade" id="newflow" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo $c->get('trans')->t('New flow') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                         <form class="form-horizontal">
                             <div class="form-group">
                                <label for="new_conn_name" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Flow name') ?></label>
                                <div class="col-sm-6">
                                    <input type="text" required="required" class="form-control" id="new_conn_name" name="new_conn_name" placeholder="<?php echo $c->get('trans')->t('Unique name') ?>" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="src_ds" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Source') ?></label>
                                <div class="col-sm-6">
<?php if(is_array($c->get('datasources')) && count($c->get('datasources'))): ?>
                                    <select name="src_ds" id="src_ds" class="form-control">
<?php foreach($c->get('datasources') as $d): ?>
                                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
<?php endforeach; ?>
                                    </select>
<?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dest_ds" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Destination') ?></label>
                                <div class="col-sm-6">
<?php if(is_array($c->get('datasources')) && count($c->get('datasources'))): ?>
                                    <select name="dest_ds" id="dest_ds" class="form-control">
<?php foreach($c->get('datasources') as $d): ?>
                                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
<?php endforeach; ?>
                                    </select>
<?php endif; ?>
                                </div>
                            </div>
                         </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $c->get('trans')->t('Close') ?></button>
                    <button type="button" class="btn btn-primary"><?php echo $c->get('trans')->t('Save changes') ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->