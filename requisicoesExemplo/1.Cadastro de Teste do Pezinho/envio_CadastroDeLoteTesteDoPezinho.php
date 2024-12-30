<?php
/**
 * Este arquivo realiza o cadastro em lote de requisições no sistema 
 * de triagem de exames da CTN Diagnósticos.
 * 
 * O objetivo é permitir que os usuários enviem informações de várias amostras 
 * em uma única requisição, incluindo dados como nome do bebê, responsáveis, 
 * exames solicitados e outras informações relevantes. 
 * 
 * Como resultado, o sistema retorna os códigos de identificação de cada cadastro 
 * realizado. Além disso, caso seja informada a data de previsão de recebimento 
 * em algum dos cadastros, o sistema também fornece a previsão de liberação dos exames.
 * 
 * Para utilizar esta integração, é necessário acessar o endpoint da API da CTN Diagnósticos 
 * com um token de autorização válido, que pode ser obtido no portal do cliente após login: 
 * https://portalctn.com.br/novo/areacliente/consultarRequisicoesWS.php
 */

// -------------------------------
// CONFIGURAÇÃO DO WEB SERVICE
// -------------------------------
try {
    /**
     * Define a URL base do webservice.
     * Escolha entre a URL de produção ou homologação, comentando/descomentando as linhas conforme necessário.
     */
    //$urlBase = 'https://webservice.portalctn.com.br'; //PRODUÇÃO
    $urlBase = 'https://homologacao.portalctn.com.br'; // HOMOLOGAÇÃO

    // Define o recurso específico que será acessado no endpoint.
    $url = $urlBase.'/testeDoPezinho/';

    // -------------------------------
    // CONFIGURAÇÃO DOS PARÂMETROS
    // -------------------------------
    /**
     * Configura os parâmetros que serão enviados na requisição.
     * O array 'laudos' contém informações sobre os laudos de teste.
     */
    $parametrosParaEnvio = array('laudos' => array());

    /**
     * Consulte a documentação completa no repositório oficial:
     * https://github.com/ctnDiagnosticos/webservice/blob/main/requisicoesExemplo/1.Cadastro%20de%20Teste%20do%20Pezinho/README.md
     */

    // Adiciona o primeiro laudo ao array de parâmetros.
    $parametrosParaEnvio['laudos'][] = array(
        'codigoProduto' => 5, // Código do produto (ex.: 5 - Produto Básico). Consulte a lista de produtos previamente.
        'nome' => 'Nome do Bebê',
        'nomeResponsavel' => 'Nome da Mãe',
        'dataNascimento' => '2024-03-01',
        'dataColeta' => '2024-03-11',
        'previsaoDataDeRecebimento' => '2024-03-13', // Data usada para previsão de liberação.
        'ig' => '40', // Idade gestacional do bebê.
        'nomeResponsavelDois' => 'Nome do Pai',
        'transfusao' => false, // Indica se houve transfusão de sangue.
        'gemeos' => false, // Indica se o bebê faz parte de uma gestação gemelar.
        'sexo' => 'M', // Sexo do bebê (M/F).
        'pesoDoBebe' => 4.5, // Peso do bebê em kg.
        'cpfDoBebe' => '64823862023', // CPF do bebê.
        'declaracaoNascimentoVivo' => null, // Informação opcional (ex.: número de declaração de nascimento vivo).
        'cep' => null, // CEP do endereço (opcional).
        'endereco' => null, // Endereço (opcional).
        'bairro' => null, // Bairro (opcional).
        'cidade' => null, // Cidade (opcional).
        'estado' => null, // Estado (opcional).
        'exames' => array(
            18,  // Código 18 - Pesquisa da Mutação 35delG da Conexina.
            13   // Código 13 - Pesquisa de Mutação 6985A da MCAD.
        ) // Consulte previamente a lista de exames complementares.
    );

    // Adiciona o segundo laudo ao array de parâmetros.
    $parametrosParaEnvio['laudos'][] = array(
        'codigoProduto' => 4, // Código do produto (ex.: 4 - Produto Master).
        'nome' => 'Nome do Bebê',
        'nomeResponsavel' => 'Nome da Mãe',
        'dataNascimento' => '2024-02-01',
        'dataColeta' => '2024-02-11',
        'previsaoDataDeRecebimento' => null, // Não fornecido para este exemplo.
        'ig' => '40',
        'nomeResponsavelDois' => 'Nome do Pai',
        'transfusao' => false,
        'gemeos' => false,
        'sexo' => 'F',
        'pesoDoBebe' => 2.6,
        'cpfDoBebe' => '00000000000',
        'declaracaoNascimentoVivo' => null,
        'cep' => null,
        'endereco' => null,
        'bairro' => null,
        'cidade' => null,
        'estado' => null,
        'exames' => array() // Nenhum exame adicional especificado.
    );

    // -------------------------------
    // CONFIGURAÇÃO DO cURL
    // -------------------------------
    // Inicia a sessão cURL para realizar a requisição ao webservice.
    $ch = curl_init($url);

    // Configurações básicas da requisição cURL.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parametrosParaEnvio));

    // Define o cabeçalho da requisição com o token de autorização.
    $token = 'Inserir sua Chave Token CTN Aqui';
    $retornoTipo = 'application/json'; // Tipo de retorno esperado json.
    //$retornoTipo = 'application/xml'; //xml
    //$retornoTipo = 'text/html'; //html
    $headers = array(
        'Accept: '.$retornoTipo,
        'Authorization: Bearer ' . $token,
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Executa a requisição e obtém a resposta.
    $respostaJSON = curl_exec($ch);

    // Verifica erros na execução da requisição.
    if (curl_errno($ch)) {
        throw new Exception('Erro cURL: ' . curl_error($ch));
    }

    // Fecha a sessão cURL.
    curl_close($ch);

    // -------------------------------
    // PROCESSAMENTO DA RESPOSTA
    // -------------------------------
    /**
     * Processa a resposta caso o tipo de retorno seja JSON.
     * Decodifica a resposta e verifica o status retornado pela API.
     */
    $resposta = json_decode($respostaJSON, true);
    if (isset($resposta['status'])) {
        switch ($resposta['status']) {
            case 'success': // Caso de sucesso.
                if (isset($resposta['data']) && $resposta['data'] != null) {
                    echo '<pre>' . print_r($resposta['data'], true) . '</pre>';
                } else {
                    throw new Exception('Erro dado não compreendido');
                }
                break;
            case 'fail': // Falha na requisição.
                if (isset($resposta['message'])) {
                    throw new Exception('Erro: ' . print_r($resposta['message'], true));
                } else {
                    throw new Exception('Erro: Erro desconhecido');
                }
                break;
            case 'error': // Erro na API.
                if (isset($resposta['message'])) {
                    throw new Exception('Erro na API: ' . $resposta['message']);
                } else {
                    throw new Exception('Erro na API: Erro desconhecido');
                }
                break;
        }
    } else {
        throw new Exception('Não foi possível compreender a resposta da API');
    }
} catch (Exception $ex) {
    // Captura e exibe mensagens de erro.
    var_dump($ex->getMessage());
}