<br/><br/>
<hr/>
<?
$n = new contenido($app->id);
if (count($n->img)):
?>

<? foreach ($n->img as $i): ?>
        <img src="<? echo $i->ruta; ?>" alt="" class="img-i" width="227" /><br/>
<? endforeach; ?>

<? endif; ?>