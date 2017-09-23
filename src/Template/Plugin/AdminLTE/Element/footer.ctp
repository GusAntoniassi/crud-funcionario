<?php
use Cake\Core\Configure;

$file = Configure::read('Theme.folder') . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'footer.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<footer class="main-footer">
    <strong>Desenvolvido por <a href="https://github.com/GusAntoniassi" target="_blank">Gustavo Antoniassi</a>.</strong>
    Template AdminLTE por <a href="http://almsaeedstudio.com" target="_blank">Almsaeed Studio</a>,
    adaptado para o CakePHP por <a href="https://github.com/maiconpinto/cakephp-adminlte-theme" target="_blank">Maicon Pinto</a>.
</footer>
<?php } ?>
