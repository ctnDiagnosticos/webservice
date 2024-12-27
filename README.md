# CTN Diagnósticos WebService

Este repositório contém exemplos e documentação para o webservice da CTN Diagnósticos. O serviço permite que os usuários enviem requisições para obter o laudo do teste do pezinho e consultem o laudo assim que ele for liberado.

## Visão Geral

O webservice foi desenvolvido para permitir que os usuários enviem solicitações para o laudo do teste do pezinho e verifiquem o status do laudo quando ele for liberado. Neste repositório, você encontrará exemplos de como interagir com os endpoints, bem como exemplos de respostas e retornos esperados para facilitar a integração com o serviço.

## Endpoint YAML

Este endpoint permite que você acesse a definição do serviço em formato YAML, útil para configurações, validações ou integrações automatizadas.

- **URL de Homologação**: [https://homologacao.portalctn.com.br/yaml](https://homologacao.portalctn.com.br/yaml)
- **URL de Produção**: [https://webservice.portalctn.com.br/yaml](https://webservice.portalctn.com.br/yaml)

### Como acessar

Para obter o arquivo YAML, basta fazer uma requisição `GET` para um dos endpoints acima. O arquivo retornado conterá a definição da API em formato YAML, que pode ser usado para configurar ferramentas de integração, geração de código ou outras necessidades relacionadas.