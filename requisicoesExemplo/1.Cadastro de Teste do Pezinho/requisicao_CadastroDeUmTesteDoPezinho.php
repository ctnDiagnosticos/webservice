<?php
/**
*   Endpoint principal
**/
//$urlBase = 'https://webservice.portalctn.com.br'; //PRODUÇÃO
$urlBase = 'https://homologacao.portalctn.com.br'; // HOMOLOGAÇÃO

// URL do serviço ou recurso que você está acessando
$url = $urlBase.'/testeDoPezinho/';

$parametrosParaEnvio = array(
    'laudos' => array(),
);
$parametrosParaEnvio['laudos'][] = array(
    'codigoProduto' => 5, //5 - Produto Ultra, Consulte antes a Lista de Produtos
    'nome' => 'Nome do Bebê',
    'nomeResponsavel' => 'Nome da Mãe',
    'dataNascimento' => '2024-03-01',
    'dataColeta' => '2024-03-11',
    'ig' => '40',
    'nomeResponsavelDois' => 'Nome do Pai',
    'transfusao' => false,
    'gemeos' => false,
    'sexo' => 'M',
    'pesoDoBebe' => 4.5,
    'cpfDoBebe' => '64823862023',
    'declaracaoNascimentoVivo' => null,
    'cep' => null,
    'endereco' => null,
    'bairro' => null,
    'cidade' => null,
    'estado' => null,
    'exames' => array( 
            18,  //18 - Pesquisa da Mutação 35delG da Conexina		
            13   //13 - Pesquisa de Mutação 6985A da MCAD
    ) //Consulte antes a Lista de Exames Complementares
);

// Inicia a sessão cURL
$ch = curl_init($url);

// Configurações da requisição
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parametrosParaEnvio));

// Configura o cabeçalho Authorization com o token Bearer
/**
*   Utilize a sua Chave Token CTN Encontrada na pagina do site https://portalctn.com.br/novo/areacliente/consultarRequisicoesWS.php
**/
$token = '<Inserir sua Chave Token CTN Aqui>';
$headers = array(
    'Accept: application/json',
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