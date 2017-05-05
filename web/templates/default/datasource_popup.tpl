    <div class="modal fade" id="datasource" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?php echo $c->get('trans')->t('New datasource') ?></h4>
                    </div>
                    <div class="modal-body">
                            <div class="container">
                                <div class="form-group">
                                    <label for="new_ds_name" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Configuration name') ?></label>
                                    <div class="col-sm-6">
                                        <input type="text" required="required" class="form-control" id="new_ds_name" name="new_ds_name" placeholder="<?php echo $c->get('trans')->t('Unique name') ?>" value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="src_ds_type" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Datasource type') ?></label>
                                    <div class="col-sm-6">
                                        <select name="src_ds_type" id="src_ds_type" class="form-control">
                                            <optgroup label="LDAP">
                                                <option value="ad">Active Directory</option>
                                                <option value="openLDAP">openLDAP</option>
                                                <option value="edir">Novell eDirectory</option>
                                                <option value="ldap_generic"><?php echo $c->get('trans')->t('Other') ?></option>
                                            </optgroup>
                                            <option value=""></option>
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $c->get('trans')->t('Close') ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo $c->get('trans')->t('Save changes') ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->