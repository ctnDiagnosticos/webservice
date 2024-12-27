# Webservice da CTN Diagnósticos

Este repositório contém exemplos e documentação para o webservice da CTN Diagnósticos. O serviço foi projetado para facilitar a integração com o processo de análise laboratorial, especialmente para o **teste do pezinho**, oferecendo um fluxo prático e bem definido.

## Visão Geral

O webservice foi desenvolvido para permitir que os credenciados enviem solicitações para o laudo do teste do pezinho e verifiquem o status do laudo quando ele for liberado. Neste repositório, você encontrará exemplos de como interagir com os endpoints, bem como exemplos de respostas e retornos esperados para facilitar a integração com o serviço.

Com este webservice, os usuários podem:

1. **Cadastrar uma Requisição**: Registrar uma solicitação de laudo, informando os dados necessários para a análise.
2. **Consultar o Status de Liberação**: Acompanhar o andamento da análise e verificar se o laudo já foi liberado.
3. **Obter o Laudo Finalizado**: Quando o laudo estiver disponível, acessar as informações detalhadas ou o PDF final.

### Formatos de Retorno

Para todas as opções acima, os dados retornados pelo webservice estão disponíveis nos seguintes formatos:

- **JSON**: Ideal para integrações modernas devido à sua flexibilidade e popularidade.
- **XML**: Compatível com sistemas legados que requerem estrutura padronizada.
- **HTML**: Uma visualização amigável para facilitar a interpretação por desenvolvedores.

### Categorias de Retorno para "Obter o Laudo Finalizado"

Dentro da opção "Obter o Laudo Finalizado", os usuários podem escolher entre duas categorias de retorno:

1. **Dados Estruturados**:
   - Retorna todos os dados do laudo de forma detalhada, permitindo que o programador monte o laudo conforme suas necessidades específicas.

2. **PDF no Modelo CTN**:
   - Um laudo formatado no padrão da CTN Diagnósticos, codificado em Base64 para transporte seguro e armazenamento eficiente.

Essas categorias garantem flexibilidade tanto para automações quanto para visualizações diretas.

### Documentação Detalhada

Para facilitar o uso, cada tipo de requisição neste repositório possui um diretório específico com um **README detalhado**. Esse README inclui:
- Descrição dos parâmetros exigidos pela requisição.
- Exemplos de chamadas para os endpoints.
- Respostas esperadas em JSON, XML e HTML.
- Casos de uso práticos e informações adicionais sobre a lógica do retorno.

Explore os diretórios para encontrar instruções detalhadas e exemplos práticos que ajudarão na integração com o webservice.

## Endpoint YAML

Este endpoint permite que você acesse a definição do serviço em formato YAML, útil para configurações, validações ou integrações automatizadas.

- **URL de Homologação**: [https://homologacao.portalctn.com.br/yaml](https://homologacao.portalctn.com.br/yaml)
- **URL de Produção**: [https://webservice.portalctn.com.br/yaml](https://webservice.portalctn.com.br/yaml)

### Como acessar

Para obter o arquivo YAML, basta abrir no seu navegador um dos endpoints acima. O arquivo retornado conterá a definição da API em formato YAML, que pode ser usado para configurar ferramentas de integração, geração de código ou outras necessidades relacionadas.