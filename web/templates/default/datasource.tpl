<?php include 'header.tpl'; ?>
        <h2><?php echo $c->get('trans')->t('Configure datasource') ?>: <?php echo $c->get('source_name') ?></h2>
<?php if($this->c['source_type']): ?>
        <h3><?php echo $c->get('trans')->t('Datasource type') ?>: <?php echo $this->c['source_type'] ?></h3>
<?php endif; ?>
        <?php echo $this->f->getForm(); ?>
<?php include 'footer.tpl'; ?>