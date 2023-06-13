  <!-- LlAMO A LA LIBRERIA QUE GENERA EL CODIGO QR -->
  <?php 
  
    require_once '../libs/phpqrcode/qrlib.php'; 

    /*Creacion de directorio temp */

    $dir = '../assets/img/temp/';

    if(!file_exists($dir)) mkdir($dir, 0777, true);

    function url_actual(){
      $url = "";
      
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
        $protocolo = "https://"; 
      else
        $protocolo = "http://"; 
      
      $url = $protocolo . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
      return  $url;
    }

    $file_name = $titleRevista.'.png';
    $path =  $dir."".$file_name;
    $tamnio = 10;
    $level = 'M';
    $frameSize = 3;
    $contenido = url_actual();

    /*CREACION DEL CODIGO QR EN FORMATO PNG */
    QRcode::png($contenido, $path, $level, $tamnio, $frameSize);
    
    $rutaImg = $dir."".$file_name;
    echo '<img class="QR_img" src="http://localhost/ojs-3.3.0-14/ojs-3.3.0-14/ModuloCertificado/assets/img/temp/'.$file_name.'"/>';

  ?>