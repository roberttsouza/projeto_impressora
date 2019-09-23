<?php

include_once('conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
 
    <title>Gerar Excel</title>
</head>
<body>

<?php

//nome do arquivo que será importado
$arquivo = 'Relatorio_Excel.xls';

//criar a tabela em HTML no formado ta planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="15"><b>Planilha relatorio de impressoras</b></tr>';
$html .= '</tr>';



$html .= '<tr>';
$html .= '<td><b>IP</b></td>';
$html .= '<td><b>Serie</b></td>';
$html .= '<td><b>Grade comando</b></td>';
$html .= '<td><b>Batalhão</b></td>';
$html .= '<td><b>Companhia</b></td>';
$html .= '<td><b>Tipo</b></td>';
$html .= '<td><b>Municipio</b></td>';
$html .= '<td><b>Log</b></td>';
$html .= '<td><b>CEP</b></td>';
$html .= '<td><b>Rua</b></td>';
$html .= '<td><b>Bairro</b></td>';
$html .= '<td><b>Cidade</b></td>';
$html .= '<td><b>Uf</b></td>';
$html .= '<td><b>Complemento</b></td>';
$html .= '<td><b>Ultima atualização</b></td>';  
$html .= '</tr>';

//SELECIONAR ITENS DA TABELA 

$result_impressora = "SELECT * FROM reg_impressora";
$resultado_impressora = mysqli_query($conn, $result_impressora);

while($row_impressora = mysqli_fetch_assoc($resultado_impressora)){

$html .= '<tr>';
$html .= '<td>'.$row_impressora["ip"].'</td>';
$html .= '<td>'.$row_impressora["serie"].'</td>';
$html .= '<td>'.$row_impressora["igdep"].'</td>';
$html .= '<td>'.$row_impressora["batalhao"].'</td>';
$html .= '<td>'.$row_impressora["companhia"].'</td>';
$html .= '<td>'.$row_impressora["tipo"].'</td>';
$html .= '<td>'.$row_impressora["municipio"].'</td>';
$html .= '<td>'.$row_impressora["logR"].'</td>';
$html .= '<td>'.$row_impressora["cep"].'</td>';
$html .= '<td>'.$row_impressora["rua"].'</td>';
$html .= '<td>'.$row_impressora["bairro"].'</td>';
$html .= '<td>'.$row_impressora["cidade"].'</td>';
$html .= '<td>'.$row_impressora["uf"].'</td>';
$html .= '<td>'.$row_impressora["complemento"].'</td>';
$date = date('d/m/y H:i:s',strtotime($row_impressora["data"]));
$html .= '<td>' .$date.'</td>';
$html .= '</tr>';

}


    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Envia o conteúdo do arquivo  
    echo $html;  
    exit;
    
    ?>
</body>
</html>