<?php ob_start(); // Aqui começa a consulta no banco de dados
include("config.php"); // conexão com o BD

// Banco de dados, sem limitação de resultados, para a paginação

$consulta = $pdo->query("SELECT * FROM vaga where status='liberado' ORDER BY id DESC");

$numero = $consulta->rowCount();

$i = 0;

$row = '{';

$row .= '"data": [';


while ($linha = $consulta->fetch())

{

      $titulo = $linha['titulo'];
      $id = $linha['id']; 
      $empresa = $linha['empresa'];
      
       $row .= '[';
       
       $row .= '"<a href=\'consultavaga.php?id='.$id.'\'><span aria-hidden=\'true\'></span><h6>'.$titulo.'</h6></a>",';

       $row .= '"<a><span aria-hidden=\'true\'></span><h6><span class=\'badge badge-info\' title=\'Empresa\'>'.$empresa.'</span></h6></a>"';

       $row .= ']';

       $i++;

       if ($i == $numero) { $row .= "";} else {$row .= ",";}

     }

     $row .= ']';

     $row .= "}";


     echo $row;



     ?>