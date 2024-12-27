<?php
include_once __DIR__ . '/../verifica.php';
// URL do serviço ou recurso que você está acessando
$url = DADOS_ESTATICOS_CLIENTE_PERSONALIZADO::$webservice.'/testeDoPezinhoLaudo/';

$parametros = array();
$parametros['codigo'] = '2633304';
$parametros['semLogotipo'] = true;

// Adiciona os parâmetros à URL
$url .= '?' . http_build_query($parametros);

// Inicia a sessão cURL
$ch = curl_init($url);

// Configurações da requisição
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Configura o cabeçalho Authorization com o token Bearer
$token = '89f4cac0fa30cec8edd4310cec505662e8ff3021fd8525b47c6d33446161cc3b';
$headers = array(
    'Accept: application/json',
    'Authorization: Bearer ' . $token,
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Executa a requisição e obtém a resposta
$respostaJSON = curl_exec($ch);
//var_dump($respostaJSON);
//echo $respostaJSON;
//die();

// Verifica se houve algum erro durante a requisição
if(curl_errno($ch)){
    echo 'Erro cURL: ' . curl_error($ch);
}

// Obtém informações sobre a requisição (opcional)
$info = curl_getinfo($ch);

// Fecha a sessão cURL
curl_close($ch);

$resposta = json_decode($respostaJSON, true);
if(isset($resposta['status'])){
    switch($resposta['status']){
        case 'success':
            if(isset($resposta['data']) && $resposta['data'] != null){
                if(isset($resposta['data']['laudoPDFBase64'])){
                    $pdf = base64_decode($resposta['data']['laudoPDFBase64']);
                    header('Content-Type: application/pdf');
                    header('Content-Length: '.strlen($pdf));
                    header('Content-Disposition: inline; filename="Teste do Pezinho Laudo - '.$parametros['codigo'].'.pdf"');
                    header('Cache-Control: private, max-age=0, must-revalidate');
                    header('Pragma: public');
                    echo $pdf;
                    die();
                }else{
                    throw new Exception('Nenhum Laudo foi retornado pela API');
                }
            }else{
                throw new Exception('Erro dado não compreendido');
            }
        break;
        case 'fail':
            if(isset($resposta['message'])){
                throw new Exception('Erro: '.$resposta['message']);
            }else{
                throw new Exception('Erro: Erro desconhecido');
            }
        break;
        case 'error':
            if(isset($resposta['message'])){
                throw new Exception('Erro na API: '.$resposta['message']);
            }else{
                throw new Exception('Erro na API: Erro desconhecido');
            }
        break;
    }
}else{
    throw new Exception('Não foi possivel compreender a resposta da API');
}