<?php include 'header.tpl'; ?>
    <div class="container-fluid" role="main"><br /><br /><br />
        <h2><?php echo $c->get('trans')->t('Configure connection') ?>: <?php echo $c->get('conn_name') ?></h2>
<?php if($this->c['conn_type']): ?>
        <h3><?php echo $c->get('trans')->t('Connection type') ?>: <?php echo $this->c['conn_type'] ?></h3>
<?php endif; ?>
        <?php echo $this->f->getForm(); ?>
    </div>
<?php include 'footer.tpl'; ?>