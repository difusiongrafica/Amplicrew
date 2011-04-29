<?

if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = $_GET['id'];
    $i = new imagen($id);
    $i->verRecorte(600,305);
}