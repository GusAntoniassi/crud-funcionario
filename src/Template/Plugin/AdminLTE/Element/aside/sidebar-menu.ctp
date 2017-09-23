<?php
use Cake\Core\Configure;
use Cake\Routing\Router;

$file = Configure::read('Theme.folder'). DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<ul class="sidebar-menu">
    <!-- Painel -->
    <li>
        <a href="<?php echo Router::url('/' ); ?>">
            <i class="fa fa-dashboard"></i> <span>Painel administrativo</span>
        </a>
    </li>
    <!-- Programadores -->
    <li>
        <a href="<?php echo Router::url(['controller' => 'programadores']); ?>">
            <i class="fa fa-code"></i> <span>Programadores</span>
        </a>
    </li>
    <!-- Analistas -->
    <li>
        <a href="<?php echo Router::url(['controller' => 'analistas']); ?>">
            <i class="fa fa-map"></i> <span>Analistas</span>
        </a>
    </li>
    <!-- Hobbies -->
    <li>
        <a href="<?php echo Router::url(['controller' => 'hobbies']); ?>">
            <i class="fa fa-music"></i> <span>Hobbies</span>
        </a>
    </li>
</ul>
<?php } ?>
