<?php      
header("Content-Type: application/json; charset=UTF-8");

//Conexao
    $host = "sql486.main-hosting.eu";  
    $user = "u384787522_helio";  
    $password = "2Et*MNY1oJul";  
    $db_name = "u384787522_tswebdev";  

      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $ano = date("Y");
 //   echo "ano atual = ".$ano."\n";
 //   echo "ano - 2   = ".$ano - 2;
 //   echo "\n";

//Leitura 
        /* HELIO ALTERADO LINHA ABAIXO */
    $query = "select * from DashServicos where ano >= $ano - 3 ";  //seleciona tabela DashServicos

    $result = mysqli_query($con,$query);  //todos os dados
    $count = mysqli_num_rows($result);  //quantos registros leu
    
    //$retorno['teste'][] = 'teste';

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            
                     $retorno['DashServicos'][] = $row;                               //Tarefas("pai")
                     //$retorno[] = $row;
            }
         print json_encode($retorno);

    }
    mysqli_close($con);
  

?>  