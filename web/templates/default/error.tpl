<?php include __dir__.'/header.tpl'; ?>
    <div class="container-fluid" role="main"><br /><br /><br />
        <div class="row">
            <div class="col-md-3">
             
            </div>
            <div class="col-md-6 alert alert-danger">
                <?php echo $exception->getMessage() ?>
            </div>
        </div>
    </div>
