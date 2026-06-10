# Sistema Core

Repositório base para o desenvolvimento e manutenção do sistema utilizando múltiplas versões do PHP.

[![PHP](https://github.com/likesistemas/sistema-core/actions/workflows/docker-publish.yml/badge.svg)](https://github.com/likesistemas/sistema-core/actions/workflows/docker-publish.yml)

## 📌 O que é o projeto
Este projeto fornece a infraestrutura necessária (em Docker) para executar aplicações em diferentes versões do PHP (5.6, 7.3, 7.4, 8.0, 8.1, etc.). Ele foi projetado para facilitar o desenvolvimento local com ambientes isolados e consistentes, gerenciando as versões por meio de variáveis de ambiente.

## 🚀 Tecnologias utilizadas
- PHP (Múltiplas versões)
- Docker
- Docker Compose
- MariaDB (Banco de dados)
- Nginx (Servidor Web)
- k6 (Testes de Carga/Performance)

## ⚙️ Pré-requisitos
Certifique-se de que sua máquina possui as seguintes ferramentas instaladas:
- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [k6](https://k6.io/docs/getting-started/installation/) (Apenas se for executar os testes localmente)

## 💻 Como rodar o projeto localmente

Para iniciar o projeto, você deve utilizar o `docker compose` exportando (ou fornecendo inline) a variável de ambiente `PHP_VERSION`. A pasta `www${PHP_VERSION}` será montada como o diretório `/var/src/` e `/var/www/public/`.

Exemplo para iniciar o ambiente com PHP 8.0:
```bash
PHP_VERSION=80 docker compose up -d
```
Ou, alternativamente, usar um arquivo `.yml` específico (se disponível e preferível):
```bash
docker compose -f docker-compose-80.yml up -d
```

O ambiente será iniciado com os containers de `app` (PHP), `nginx` e `mysql`.

## 🧪 Como executar os testes
Os testes de performance/carga são executados utilizando a ferramenta `k6`.

1. Suba o ambiente da versão desejada (ex: PHP 7.3):
```bash
docker compose -f docker-compose-73.yml up --build -d
```

2. Execute o teste utilizando o `k6`:
```bash
k6 run -e PHP_VERSION=73 --vus 40 --duration 30s k6/index.js
```
