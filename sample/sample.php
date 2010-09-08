<?php
require_once 'templater/templater.class.php';

$Tpl = new NyaaTemplater( $this->Conf );
$Tpl->set('title', 'Test Title');
$Tpl->setTemplateDir( dirname(__FILE__) );
echo $Tpl->fetch('file://sample.html');
?>
