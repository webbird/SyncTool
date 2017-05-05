<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="c">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SyncTool</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse col-md-offset-2">
          <ul class="nav navbar-nav">
            <li<?php if($c->get('route_name')==''): ?> class="active"<?php endif; ?>><a href="/"><?php echo $c->get('trans')->t('Home') ?></a></li>
            <li class="dropdown<?php if($c->get('route_name')=='datasource'): ?> active<?php endif; ?>">
                <a href="#datasources" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $c->get('trans')->t('Datasources') ?></a>
                <ul class="dropdown-menu">
                    <li><a id="dscreate" data-toggle="modal" data-target="#datasource" href=""><?php echo $c->get('trans')->t('Create new') ?></a></li>
<?php if(is_array($datasources) && count($datasources)): ?>
                    <li role="separator" class="divider"></li>
                    <li>
                        <select class="form-control">
<?php foreach($datasources as $d): ?>
                            <option value="<?php echo $d ?>"><?php echo $d ?></option>
<?php endforeach; ?>
                        </select>
                    </li>
<?php endif; ?>
                </ul>
            </li>
            <li class="dropdown<?php if($c->get('route_name')=='connection'): ?> active<?php endif; ?>">
                <a href="#connections" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $c->get('trans')->t('Connections') ?></a>
                <ul class="dropdown-menu">
                    <li><a id="dscreate" data-toggle="modal" data-target="#newconnection" href=""><?php echo $c->get('trans')->t('Create new') ?></a></li>
                </ul>
            </li>
            <li><a href="/logs"><?php echo $c->get('trans')->t('Logs') ?></a></li>
            <li><a href="/help"><?php echo $c->get('trans')->t('Help') ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
