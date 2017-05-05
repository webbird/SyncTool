    <div class="modal fade" id="newconnection" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><?php echo $c->get('trans')->t('New connection') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                         <form class="form-horizontal">
                             <div class="form-group">
                                <label for="new_conn_name" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Connection name') ?></label>
                                <div class="col-sm-6">
                                    <input type="text" required="required" class="form-control" id="new_conn_name" name="new_conn_name" placeholder="<?php echo $c->get('trans')->t('Unique name') ?>" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="src_conn_type" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Datasource type for source') ?></label>
                                <div class="col-sm-6">
                                    <select name="src_conn_type" id="src_conn_type" class="form-control">
                                        <option value="ldap">LDAP (Microsoft Active Directory, openLDAP, Novell eDirectory, ...)</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dest_conn_type" class="col-sm-2 control-label"><?php echo $c->get('trans')->t('Datasource type for destination') ?></label>
                                <div class="col-sm-6">
                                    <select name="dest_conn_type" id="dest_conn_type" class="form-control">
                                        <option value="ldap">LDAP (Microsoft Active Directory, openLDAP, Novell eDirectory, ...)</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
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