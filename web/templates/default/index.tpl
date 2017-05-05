<?php include 'header.tpl'; ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 strong">
                                <?php echo $c->get('trans')->t('Build ID') ?>
                            </div>
                            <div class="col-sm-8">
                                1.0.0
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php echo $c->get('trans')->t('Computer Name') ?>
                            </div>
                            <div class="col-sm-8">
                                <?php echo php_uname('n'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php echo $c->get('trans')->t('Platform') ?>
                            </div>
                            <div class="col-sm-8">
                                <?php echo php_uname(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php echo $c->get('trans')->t('PHP Version') ?>
                            </div>
                            <div class="col-sm-8">
                                <?php echo PHP_VERSION; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php echo $c->get('trans')->t('Current Date') ?>
                            </div>
                            <div class="col-sm-8">
                                <?php echo date('c'); ?>
                            </div>
                        </div>
                    </div>
                </div>
<?php include 'footer.tpl'; ?>