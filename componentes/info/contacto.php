<?php
/* DIFF 3.0 By Difusion Grafica
 * Framework php dinámico
 */
?>

<div class="izquierda">
    <div class="widget">
        <h2>Contacto</h2>
        <form  action="<? echo $app->ruta_base; ?>/info/contactoEnviar" method="post" enctype="multipart/form-data">    
            <table width="100%">
                <tr>
                    <td width="58%">
                        <label style="width: 46px;">Nombre: </label>
                        <input class="required" type="text" name="nombre" style="width: 218px; margin-right: 50px;" />

                        <br/><br/>
                        <label style="width: 118px;">Teléfono de contacto: </label>
                        <input class="required number" type="text" name="telefono" style="width: 146px; margin-right: 50px;" />
                        <br/><br/>

                        <label style="width: 46px;">Email: </label>
                        <input class="required email" type="text" name="mail" style="width: 218px;" />

                        <br/><br/>
                        <label style="width: 56px;">Provincia: </label>
                        <input class="required" type="text" name="provincia" style="width: 208px; margin-right: 50px;" />
                        <br/><br/>

                        <label style="width: 62px;">Población: </label>
                        <input class="required" type="text" name="poblacion" style="width: 202px;" />


                        <br/><br/>                        

                    </td>
                    <td valign="top">
                        <h3 style="font-size:15px; margin-bottom: 5px;">HERMANDAD DE COLUMNA</h3>
                        <p style="font-size:14px; line-height: 15px;">
                            C/ San Marcos 47.<br/>
                            11100. San Fernando (Cádiz)<br/>
                            Apartado de Correos 278<br/><br/>
                            
                        </p>

                        

                    </td>
                </tr>
            </table>
            <label>Mensaje: </label>
                        <textarea cols="80" rows="12" class="required" name="texto"></textarea>

                        <input type="submit" value="Enviar" />

        </form>
    </div>
    <div class="widget">
        <h2>AGRADECIMIENTOS</h2>
        <div style="text-align: center;">
             <p>La Hermandad de Columna agradece a todos aquellas personas que han
colaborado en la realización de la página web de la Hermandad y en especial:</p>

<p>La Junta de Gobierno elegida en Cabildo en el año 2008, que he hecho
posible la publicación de la página web teniendo la Hermandad este nuevo canal
de comunicación.</p>

<p>En la información escrita, en varias secciones de la página a nuestro
hermano Manuel Molina Garcia.</p>
<p>En información escrita y Grafica a nuestro Hermano Manuel
Valverde Gutiérrez.</p>

<p>Al archivo Quijano por ceder imágenes de su archivo, y en especial a
Joaquín y Pablo Quijano por su colaboración con en esta Hermandad y con
el mundo cofrade en General.</p>

<p>Al Hermano Jesus Sánchez Cepillo por ceder gustosamente el
domino hermandaddecolumna.com.</p>

<p>En la información Grafica a Juan Carlos Campoy, Fernando
Fossati Aragón, Juan Manuel Salazar Carrasco, Jose María Nieto
Arias, Jose Luis Cardoso Macías, Isla Pasión, Miguel Ángel Sanz,
Jesus Rosales, Antonio Rosales Rincón, Jose Luis Monge Romero,
Miguel Ángel Lopez, Jose Alberto Ortiz, Foto Fabra.</p>

<p>A la empresa diseñadora de la página <a href="http://www.difusiongrafica.com" target="_blank">Difusión Gráfica.</a></p>

<p>Y nuestro Hermano Jose Carlos Fernandez Moscoso , por su dedicación y esmero en la presentación de esta página web el día 12 de Marzo de
2011.</p>

<p>GRACIAS</p>
        </div>
       
    </div>
</div>
