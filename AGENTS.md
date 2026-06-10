# AGENTS.md - Regras e Configurações de IA/Dev

Este documento define regras essenciais de contribuição, padrões de comunicação e estrutura do projeto. As IAs devem ler e aplicar rigidamente as regras definidas aqui.

## 🗣️ Regra de Idioma Restrita (Mandatory)
**All communication, code reviews, PR titles/descriptions, and commit messages must be strictly in Brazilian Portuguese (pt-BR).**

## 🏗️ Mapeamento da Arquitetura e Pastas

A estrutura raiz deste repositório serve para gerenciar de forma isolada e simultânea múltiplas versões do PHP. Abaixo está a responsabilidade de cada diretório/arquivo principal:

*   **`www*/` (ex: `www56`, `www73`, `www80`):** Contém os códigos-fonte da aplicação, configurações (`composer.json`, `config.ini`) específicas para aquela versão do PHP. É a aplicação propriamente dita que é executada pelos containers.
*   **`k6/`:** Diretório dedicado a testes de performance e carga da aplicação utilizando a ferramenta k6.
*   **`events/`:** Arquivos ou scripts utilitários relacionados ao disparo ou processamento de eventos do sistema (como demonstrado por arquivos de testes ou cópias).
*   **`sh/`:** Scripts shell utilitários e de entrypoint usados na criação, configuração, inicialização do container de banco de dados, e manutenção do ecossistema Docker (ex: `configure-app`, `configure-db`, `clear-www`).
*   **`docker-compose-*.yml`**: Diferentes arquivos de composição do Docker que facilitam rodar e isolar configurações de ambiente específicas ou versões exatas do PHP com MariaDB e Nginx.

## 📌 Padrão de Commits e Pull Requests

Todos os Commits e Pull Requests devem **obrigatoriamente** seguir o formato abaixo, combinando um Emoji representativo, o ID da tarefa correspondente (Jira) e a mensagem da ação.

### Formato

`[Emoji] [ID-da-Tarefa-Jira] Mensagem clara do que foi feito`

*Exemplos práticos:*
*   `🐛 [EIC-123] Corrige erro de validação no formulário`
*   `✨ [EIC-124] Adiciona nova rota de exportação`
*   `📝 [EIC-000] Atualiza documentação e padroniza repositório`

### Tabela de Referência de Emojis

| Emoji | Uso                                                                   |
| :---: | :-------------------------------------------------------------------- |
|   ✨   | Criação de novas funcionalidades (Features).                          |
|   🐛   | Correção de falhas ou bugs.                                           |
|   ♻️   | Refatoração de código que não adiciona recurso nem corrige bug.        |
|   📝   | Adição ou atualização de documentação (README, AGENTS, etc).         |
|   🔧   | Ajustes em arquivos de configuração (.env, docker-compose, configs).  |
|   ✅   | Adição ou correção de testes (K6, unitários, etc).                    |
|   🚀   | Melhorias de performance ou deploy inicial.                           |
