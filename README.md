# CTN Diagnósticos WebService

# **Requisitos para Cadastro de Teste do Pezinho**

## **Lista de Dados Requisitados por Laudo no Laboratório**

| **Obrigatório para Teste do Pezinho** | **Obrigatório para Recoleta** | **Campo Descrição**                  | **Codinome no Sistema**        | **Tipo**                                 | **Pode Ser Campo NULL** |
|---------------------------------------|--------------------------------|---------------------------------------|---------------------------------|------------------------------------------|--------------------------|
| SIM                                   | SIM                            | Código de Credenciamento             | `codigoCredenciado`            | `INT`                                   | NÃO                      |
| SIM                                   | SIM                            | Produto Requisitado                  | `codigoProduto`                | `INT`                                   | NÃO                      |
| SIM                                   | SIM                            | Nome do Paciente                     | `nome`                         | `VARCHAR(max 250 dígitos)`              | NÃO                      |
| SIM                                   | SIM                            | Nome da Mãe (Responsável Nº 1)       | `nomeResponsavel`              | `VARCHAR(max 250 dígitos)`              | NÃO                      |
| SIM                                   | SIM                            | Data de Nascimento                   | `dataNascimento`               | `DATE(YYYY-mm-dd)`                      | NÃO                      |
| SIM                                   | SIM                            | Data de Coleta                       | `dataColeta`                   | `DATE(YYYY-mm-dd)`                      | NÃO                      |
| SIM                                   | SIM                            | Idade Gestacional (Semanas)          | `ig`                           | `INT`                                   | NÃO                      |
| NÃO                                   | SIM                            | Nome do Pai (Responsável Nº 2)       | `nomeResponsavelDois`          | `VARCHAR(max 250 dígitos)`              | SIM                      |
| NÃO                                   | SIM                            | Transfusão                           | `transfusao`                   | `BOOLEAN (1 ou 0)`                      | SIM                      |
| NÃO                                   | SIM                            | Gêmeos                               | `gemeos`                       | `BOOLEAN (1 ou 0)`                      | SIM                      |
| NÃO                                   | SIM                            | Sexo do Paciente                     | `sexo`                         | `CHAR(max 1 dígito)` – “M” ou “F”       | SIM                      |
| NÃO                                   | SIM                            | Peso do Bebê em Kg                   | `pesoDoBebe`                   | `FLOAT`                                 | SIM                      |
| NÃO                                   | NÃO                            | Exames Complementares                | `exames`                       | `ARRAY(INT)`                            | SIM                      |
| NÃO                                   | NÃO                            | CPF do Bebê                          | `cpfDoBebe`                    | `VARCHAR(max 11 dígitos)`               | SIM                      |
| NÃO                                   | NÃO                            | Declaração de Nascimento Vivo        | `declaracaoNascimentoVivo`     | `VARCHAR(max 100 dígitos)`              | SIM                      |
| NÃO                                   | NÃO                            | Número do CEP                        | `cep`                          | `VARCHAR(max 8 dígitos)`                | SIM                      |
| NÃO                                   | NÃO                            | Endereço                             | `endereco`                     | `VARCHAR(max 250 dígitos)`              | SIM                      |
| NÃO                                   | NÃO                            | Bairro                               | `bairro`                       | `VARCHAR(max 250 dígitos)`              | SIM                      |
| NÃO                                   | NÃO                            | Cidade                               | `cidade`                       | `VARCHAR(max 250 dígitos)`              | SIM                      |
| NÃO                                   | NÃO                            | Estado                               | `estado`                       | `CHAR(max 2 dígitos)`                   | SIM                      |

---

### **Observações**
1. **Campos Obrigatórios**:
   - Os campos marcados como "NÃO" na coluna "Pode Ser Campo NULL" são obrigatórios e devem sempre ser preenchidos.
2. **Validação de Tipos**:
   - Certifique-se de que os valores enviados seguem os tipos especificados na tabela.
3. **Formato de Datas**:
   - As datas devem ser enviadas no formato `YYYY-mm-dd`.
