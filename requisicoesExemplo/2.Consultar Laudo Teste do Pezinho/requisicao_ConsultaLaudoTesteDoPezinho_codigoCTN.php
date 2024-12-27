<?php
try{
    /**
    *   Endpoint principal
    **/
    $urlBase = 'https://webservice.portalctn.com.br'; //PRODUÇÃO
    // !$urlBase = 'https://homologacao.portalctn.com.br'; // não é possivel utilizar o modo Homologação para visualizar laudo em PDF

    // URL do serviço ou recurso que você está acessando
    $url = $urlBase.'/testeDoPezinho/laudo/';

    $parametros = array();
    $parametros['tipoDeCodigo'] = 'CTN';
    //$parametros['tipoDeCodigo'] = 'WS'; //codigo recebido pelo WS
    $parametros['codigo'] = '2600000';
    $parametros['semLogotipo'] = true;

    // Adiciona os parâmetros à URL
    $url .= '?' . http_build_query($parametros);

    // Inicia a sessão cURL
    $ch = curl_init($url);

    // Configurações da requisição
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Configura o cabeçalho Authorization com o token Bearer
    $token = 'Inserir sua Chave Token CTN Aqui';
    $retornoTipo = 'application/json'; //json
    //$retornoTipo = 'application/xml'; //xml
    //$retornoTipo = 'text/html'; //html
    $headers = array(
        'Accept: '.$retornoTipo,
        'Authorization: Bearer ' . $token,
    );

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Executa a requisição e obtém a resposta
    $respostaJSON = curl_exec($ch);

    // Verifica se houve algum erro durante a requisição
    if(curl_errno($ch)){
        throw new Exception('Erro cURL: ' . curl_error($ch));
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
                    echo '<pre>'.print_r($resposta['data'], true).'</pre>';
                }else{
                    throw new Exception('Erro dado não compreendido');
                }
            break;
            case 'fail':
                if(isset($resposta['message'])){
                    throw new Exception('Erro: '.print_r($resposta['message'], true));
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
}catch(Exception $ex){
    var_dump($ex->getMessage());
}