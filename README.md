# Desafio Técnico: CRUD de Transações Financeiras

## Objetivo
Desenvolver uma aplicação web para gerenciar transações financeiras, permitindo o cadastro, listagem, edição e exclusão de receitas e despesas. O mesmo formulário deve ser usado para registrar tanto receitas quanto despesas, com um campo que indique o tipo de transação e outro que diferencie entre despesa (valor negativo) e receita (valor positivo).

---

## Funcionalidades da Aplicação
### Cadastro de Transações
- Um único formulário deve ser utilizado para registrar tanto receitas quanto despesas.
- Deve haver um campo para indicar se a transação é uma despesa ou receita.
- Se a transação for uma despesa, o valor deve ser salvo como negativo no banco de dados.
- Deve ser possível categorizar a transação com tipos como **Aluguel**, **Pagamento**, **Prolabore**, etc.

### Listagem de Transações
- Listar todas as transações, com a possibilidade de filtrar por tipo (receita ou despesa).

### Edição de Transações
- Permitir a edição das transações cadastradas.

### Exclusão de Transações
- Permitir a exclusão de transações cadastradas.

---

## Tecnologias
- **Backend:** Qualquer framework PHP (ex.: Laravel, CodeIgniter).
- **Frontend:** Angular (versão 16 ou superior).
- **Banco de Dados:** MySQL ou PostgreSQL.

---

## Estrutura de Pastas
A organização dos arquivos deve seguir a estrutura abaixo:

projeto/ │

  ├── banco/ : Scripts de criação das tabelas do banco de dados (ex.: transação e tipo de transação). 
  
  │ 
  
  ├── backend/
   Código do backend em PHP.
   
  │
  
  └── frontend/ 
   Código do frontend em Angular.

---

   ## Requisitos de Entrega
- Enviar os scripts de criação do banco de dados em anexo na pasta **`banco/`**.
- Subir todo o código no GitHub, organizado na estrutura de pastas descrita acima.

## Critérios de Avaliação
- Implementação correta das funcionalidades.
- Qualidade e organização do código.
- Uso adequado de boas práticas de desenvolvimento.
- Estrutura correta das pastas e envio do script SQL.
- Documentação do código e instruções para rodar o projeto.
  
        
   
