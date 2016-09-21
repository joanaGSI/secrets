<!DOCTYPE html>
<?php
    require_once 'include/header1.php';
    require('connect.php');
?>

<html>
   
    <body>
        <table>
            <tr>
                <td>Titulo e descrição incompleta</td>
                <td>Imagem</td>
                
            </tr>
        <?php
            $meses = array(
                '01' => 'Janeiro',
                '02' => 'Fevereiro',
                '03' => 'Março',
                '04' => 'Abril',
                '05' => 'Maio',
                '06' => 'Junho',
                '07' => 'Julho',
                '08' => 'Agosto',
                '09' => 'Setembro',
                '10' => 'Outubro',
                '11' => 'Novembro',
                '12' => 'Dezembro'
            );
        
            $query = "SELECT * FROM entradas WHERE Status = true ORDER BY Data DESC"; //order by -> colocar o post mais recente em primeiro
            $sql = mysqli_query($link,$query, MYSQLI_STORE_RESULT); 

            $resultados = mysqli_num_rows($sql);//contar os resultados encontrados
            
            if($resultados <=0){
                echo '<h2>Nada Encontrado!</h2>';
            } else{
                while($res = mysqli_fetch_array($sql)){       
           
  
                    
                    ?> 
               
        <div id="boxPost">
            <tr>
            <h2><td> <?php echo $res['Titulo']; ?> </td></h2><br><br>
            <td><?php echo date('d', strtotime($res['Data']))." de ".$meses[date('m', strtotime($res['Data']))]." de ".date('Y', strtotime($res['Data'])); ?></td>
            <td><img id="this" src="imagens-posts/<?php echo $res['Imagem'];?>"></td>
                 </div>
           </tr>
             <?php }} ?>  
            
        </table>
      
        
        
        
    </body>
    
    
    
    
</html>