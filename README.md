# CTN Diagnósticos WebService

Este repositório contém o código-fonte para o webservice da CTN Diagnósticos. O serviço permite que os usuários enviem requisições para obter o laudo do teste do pezinho e consultem o laudo assim que ele for liberado.

## Visão Geral

O webservice foi desenvolvido para fornecer uma interface eficiente e segura para o envio de requisições de laudo do teste do pezinho, um exame essencial para diagnóstico precoce de doenças em recém-nascidos. Após o envio da solicitação, o usuário pode acompanhar o status do laudo e obter os resultados quando estiverem disponíveis.

## Endpoint YAML

Este endpoint permite que você acesse a definição do serviço em formato YAML, útil para configurações, validações ou integrações automatizadas.

- **URL de Homologação**: [https://homologacao.portalctn.com.br/yaml](https://homologacao.portalctn.com.br/yaml)
- **URL de Produção**: [https://webservice.portalctn.com.br/yaml](https://webservice.portalctn.com.br/yaml)

### Como acessar

Para obter o arquivo YAML, basta fazer uma requisição `GET` para um dos endpoints acima. O arquivo retornado conterá a definição da API em formato YAML, que pode ser usado para configurar ferramentas de integração, geração de código ou outras necessidades relacionadas.