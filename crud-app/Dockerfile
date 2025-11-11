# .devcontainer/Dockerfile

FROM mcr.microsoft.com/devcontainers/php:8.3-bullseye

# 1. Instala as dependências de sistema (bibliotecas de cabeçalho) do SQLite
#    Isso é necessário para que o comando 'docker-php-ext-install' funcione.
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get -y install --no-install-recommends \
    libsqlite3-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Instala a extensão PHP (pdo_sqlite) usando o comando helper
#    O comando agora encontra os arquivos de cabeçalho necessários.
RUN docker-php-ext-install pdo_sqlite

# Nota: Usamos 'pdo_sqlite' aqui. 'sqlite3' é para a extensão procedural. 
#       Para Laravel (PDO), é mais seguro usar pdo_sqlite.