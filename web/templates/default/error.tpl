<?php include __dir__.'/header.tpl'; ?>
    <div class="alert alert-danger">
        <?php echo $exception->getMessage() ?>
    </div>
<?php include __dir__.'/footer.tpl'; ?>