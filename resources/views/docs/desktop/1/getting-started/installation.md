---
title: Instalação
order: 002
---

# Instalação

## Requisitos

Antes de instalar o Laravel Lusophone, certifique-se de que o seu ambiente atende aos seguintes requisitos:

### Requisitos Mínimos
- **PHP**: 8.1 ou superior
- **Laravel**: 10.x, 11.x ou 12.x
- **Extensões PHP**:
  - `ext-bcmath` - Para cálculos de validação precisos
  - `ext-json` - Para processamento de dados de localização

### Ambientes Testados
- **Desenvolvimento**: Linux, macOS, Windows
- **Produção**: Ubuntu 20.04+, CentOS 8+, Amazon Linux 2
- **Containers**: Docker, Laravel Sail
- **Cloud**: AWS, Google Cloud, Azure, DigitalOcean

## Instalação Via Composer

### 1. Instalação Básica

```bash
composer require arnaldotomo/laravel-lusophone
```

### 2. Verificação da Instalação

```bash
php artisan vendor:publish --tag=lusophone-config
```

Será criado o arquivo `config/lusophone.php` com as configurações padrão.

### 3. Teste Rápido

```bash
php artisan lusophone:detect
```

**Saída esperada:**
```
🌍 Laravel Lusophone - Detecção de Região

✅ Região detectada: MZ (Moçambique)
📍 Ambiente: Local (desenvolvimento)
💰 Moeda: MZN (Metical)
📞 Formato telefone: +258 XX XXX XXXX
🆔 Validação fiscal: NUIT (9 dígitos)

🎯 Teste de validação:
✅ NUIT válido: 123456789
✅ Telefone válido: +258 823456789
✅ Formatação moeda: 1.500,50 MT
```

## Configuração Automática vs Manual

### ⚡ Configuração Automática (Recomendada)

```bash
php artisan lusophone:setup
```

**Este comando irá:**
1. Publicar ficheiros de configuração
2. Publicar traduções (opcional)
3. Detectar o seu ambiente
4. Configurar região padrão apropriada
5. Testar a integração

**Saída interativa:**
```
🚀 Configuração do Laravel Lusophone

? Qual é o seu ambiente principal de desenvolvimento?
  1. Moçambique (MZ) - Recomendado para desenvolvimento africano
  2. Portugal (PT) - Para desenvolvimento europeu
  3. Brasil (BR) - Para desenvolvimento brasileiro
  4. Detectar automaticamente

? Publicar ficheiros de idioma personalizáveis? (Y/n) n
? Integrar automaticamente com Laravel Breeze/Jetstream? (Y/n) y

✅ Configuração concluída com sucesso!
```

### 🔧 Configuração Manual

Se preferir configurar manualmente:

#### Publicar Configurações
```bash
php artisan vendor:publish --tag=lusophone-config
```

#### Publicar Traduções (Opcional)
```bash
php artisan vendor:publish --tag=lusophone-lang
```

#### Configurar .env
```env
# Detecção automática (recomendado)
LUSOPHONE_AUTO_DETECT=true

# Região padrão para desenvolvimento local
LUSOPHONE_DEFAULT_REGION=MZ

# Definir locale automaticamente
LUSOPHONE_AUTO_SET_LOCALE=true

# Forçar região específica (opcional - para testes)
# LUSOPHONE_FORCE_REGION=PT
```

## Integração com Laravel Breeze

### Instalação Simultânea (Novo Projeto)

```bash
# 1. Criar projeto Laravel
composer create-project laravel/laravel meu-projeto
cd meu-projeto

# 2. Instalar Breeze
composer require laravel/breeze --dev
php artisan breeze:install blade

# 3. Instalar Laravel Lusophone
composer require arnaldotomo/laravel-lusophone

# 4. Configurar
php artisan lusophone:setup --breeze

# 5. Compilar assets
npm install && npm run build

# 6. Testar
php artisan serve
```

### Projeto Existente com Breeze

```bash
# Instalar Laravel Lusophone
composer require arnaldotomo/laravel-lusophone

# Configurar com integração Breeze
php artisan lusophone:setup --breeze

# As views de autenticação serão automaticamente traduzidas!
```

**Resultado da Integração:**
- ✅ Login/registo traduzido automaticamente
- ✅ Mensagens de validação em português
- ✅ Formulários adaptados culturalmente
- ✅ Emails de recuperação de palavra-passe localizados

## Integração com Laravel Jetstream

### Com Livewire

```bash
# Instalar Jetstream primeiro
composer require laravel/jetstream
php artisan jetstream:install livewire

# Instalar Laravel Lusophone
composer require arnaldotomo/laravel-lusophone
php artisan lusophone:setup --jetstream

# Compilar
npm install && npm run build
```

### Com Inertia.js

```bash
# Instalar Jetstream com Inertia
composer require laravel/jetstream
php artisan jetstream:install inertia

# Instalar Laravel Lusophone
composer require arnaldotomo/laravel-lusophone
php artisan lusophone:setup --jetstream --inertia

# Compilar
npm install && npm run build
```

**Funcionalidades Jetstream Localizadas:**
- ✅ Dashboard traduzido
- ✅ Gestão de perfil localizada
- ✅ Gestão de equipas adaptada culturalmente
- ✅ API tokens com terminologia regional
- ✅ Configurações de conta em português

## Verificação da Instalação

### 1. Teste de Detecção
```bash
php artisan lusophone:detect --verbose
```

### 2. Teste de Validação
```bash
php artisan lusophone:detect --test-validation
```

### 3. Teste de Formatação
```bash
php artisan lusophone:detect --test-currency
```

### 4. Teste Completo
```bash
php artisan lusophone:detect --full-test
```

## Resolução de Problemas

### Erro: "Class 'ArnaldoTomo\LaravelLusophone\...' not found"

```bash
# Limpar cache do Composer
composer dump-autoload

# Limpar cache do Laravel
php artisan config:clear
php artisan cache:clear
```

### Erro: Extensões PHP em falta

#### Ubuntu/Debian
```bash
sudo apt-get install php8.1-bcmath php8.1-json
```

#### CentOS/RHEL
```bash
sudo yum install php81-bcmath php81-json
```

#### macOS (Homebrew)
```bash
brew install php@8.1
pecl install bcmath
```

#### Windows (XAMPP/WAMP)
Editar `php.ini` e descomentar:
```ini
extension=bcmath
extension=json
```

### Problema: Detecção de região incorreta

#### Em desenvolvimento local:
```env
# Force uma região específica
LUSOPHONE_FORCE_REGION=MZ
```

#### Em produção:
```bash
# Verificar headers HTTP
php artisan lusophone:detect --debug
```

### Problema: Traduções não aparecem

```bash
# Publicar e reconfigurar
php artisan vendor:publish --tag=lusophone-lang --force
php artisan config:clear
php artisan view:clear
```

## Configuração Avançada

### Ambiente Docker

**Dockerfile:**
```dockerfile
FROM php:8.1-fpm

# Instalar extensões necessárias
RUN docker-php-ext-install bcmath

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar aplicação
WORKDIR /var/www
COPY . .

# Instalar dependências
RUN composer install --no-dev --optimize-autoloader
```

### Laravel Sail

**Adicionar ao `docker-compose.yml`:**
```yaml
services:
    laravel.test:
        environment:
            - LUSOPHONE_DEFAULT_REGION=MZ
            - LUSOPHONE_AUTO_DETECT=true
```

### Configuração de Produção

**Otimizações recomendadas:**
```env
# Produção
APP_ENV=production
LUSOPHONE_AUTO_DETECT=true
LUSOPHONE_AUTO_SET_LOCALE=true

# Cache de configuração
```

```bash
# Deploy de produção
php artisan config:cache
php artisan route:cache  
php artisan view:cache
composer install --no-dev --optimize-autoloader
```

## Próximos Passos

Agora que tem o Laravel Lusophone instalado:

1. **[Configure as opções avançadas](configuration.md)**
2. **[Aprenda a usar validações universais](validation.md)**  
3. **[Explore formatação de moedas e números](formatting.md)**
4. **[Personalize traduções](translations.md)**
5. **[Implemente detecção de região](detection.md)**

---

**Instalação concluída! 🎉 A sua aplicação Laravel agora suporta todos os países lusófonos automaticamente.**
