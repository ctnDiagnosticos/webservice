# CTN Diagnósticos WebService

# **Requisitos para Cadastro de Teste do Pezinho**

## **Lista de Dados Requisitados por Laudo no Laboratório**

| **Obrigatório para Teste do Pezinho** | **Obrigatório para Recoleta** | **Campo Descrição**                  | **Codinome no Sistema**        | **Tipo**                                 | **Pode Ser Campo NULL** |
|---------------------------------------|--------------------------------|---------------------------------------|---------------------------------|------------------------------------------|--------------------------|
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Código de Credenciamento             | `codigoCredenciado`            | `INT`                                   | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Produto Requisitado                  | `codigoProduto`                | `INT`                                   | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Nome do Paciente                     | `nome`                         | `VARCHAR(max 250 dígitos)`              | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Nome da Mãe (Responsável Nº 1)       | `nomeResponsavel`              | `VARCHAR(max 250 dígitos)`              | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Data de Nascimento                   | `dataNascimento`               | `DATE(YYYY-mm-dd)`                      | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Data de Coleta                       | `dataColeta`                   | `DATE(YYYY-mm-dd)`                      | NÃO                      |
| $${\color{green}SIM}$$                                   | $${\color{green}SIM}$$                            | Idade Gestacional (Semanas)          | `ig`                           | `INT`                                   | NÃO                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\color{green}SIM}$$                            | Nome do Pai (Responsável Nº 2)       | `nomeResponsavelDois`          | `VARCHAR(max 250 dígitos)`              | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\color{green}SIM}$$                            | Transfusão                           | `transfusao`                   | `BOOLEAN (1 ou 0)`                      | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\color{green}SIM}$$                            | Gêmeos                               | `gemeos`                       | `BOOLEAN (1 ou 0)`                      | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\color{green}SIM}$$                            | Sexo do Paciente                     | `sexo`                         | `CHAR(max 1 dígito)` – “M” ou “F”       | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\color{green}SIM}$$                            | Peso do Bebê em Kg                   | `pesoDoBebe`                   | `FLOAT`                                 | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Exames Complementares                | `exames`                       | `ARRAY(INT)`                            | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | CPF do Bebê                          | `cpfDoBebe`                    | `VARCHAR(max 11 dígitos)`               | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Declaração de Nascimento Vivo        | `declaracaoNascimentoVivo`     | `VARCHAR(max 100 dígitos)`              | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Número do CEP                        | `cep`                          | `VARCHAR(max 8 dígitos)`                | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Endereço                             | `endereco`                     | `VARCHAR(max 250 dígitos)`              | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Bairro                               | `bairro`                       | `VARCHAR(max 250 dígitos)`              | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Cidade                               | `cidade`                       | `VARCHAR(max 250 dígitos)`              | SIM                      |
| $${\colorbox{black}{{\color{yellow}NÃO}}}$$                                   | $${\colorbox{black}{{\color{yellow}NÃO}}}$$                            | Estado                               | `estado`                       | `CHAR(max 2 dígitos)`                   | SIM                      |

---

### **Observações**
1. **Campos Obrigatórios**:
   - Os campos marcados como "NÃO" na coluna "Pode Ser Campo NULL" são obrigatórios e devem sempre ser preenchidos.
2. **Validação de Tipos**:
   - Certifique-se de que os valores enviados seguem os tipos especificados na tabela.
3. **Formato de Datas**:
   - As datas devem ser enviadas no formato `YYYY-mm-dd`.
