---
title: Configuration
order: 003
---

# Configuração

## Visão Geral

O Laravel Lusophone é projetado para funcionar **sem configuração** na maioria dos casos. No entanto, oferece opções avançadas para personalizar o comportamento conforme as suas necessidades específicas.

## Ficheiro de Configuração

### Publicar Configuração

```bash
php artisan vendor:publish --tag=lusophone-config
```

Isto criará o ficheiro `config/lusophone.php`:

```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Detecção Automática Inteligente
    |--------------------------------------------------------------------------
    |
    | Quando ativada, a biblioteca detecta automaticamente:
    | - AMBIENTE LOCAL: Padrão Moçambique (MZ)
    | - AMBIENTE ONLINE: Auto-detecção via IP/headers do utilizador
    |
    */
    'auto_detect' => env('LUSOPHONE_AUTO_DETECT', true),

    /*
    |--------------------------------------------------------------------------
    | Definir Locale Automaticamente
    |--------------------------------------------------------------------------
    |
    | Automaticamente definir Laravel's locale baseado na região detectada.
    | Quando ativado, a biblioteca chamará App::setLocale() automaticamente.
    | Perfeito para integração com Breeze e Jetstream.
    |
    */
    'auto_set_locale' => env('LUSOPHONE_AUTO_SET_LOCALE', true),

    /*
    |--------------------------------------------------------------------------
    | Região Padrão
    |--------------------------------------------------------------------------
    |
    | Região padrão para desenvolvimento local e cenários de fallback.
    | Alterado para MZ (Moçambique) como ambiente primário de desenvolvimento.
    | Regiões suportadas: PT, BR, MZ, AO, CV, GW, ST, TL
    |
    */
    'default_region' => env('LUSOPHONE_DEFAULT_REGION', 'MZ'),

    /*
    |--------------------------------------------------------------------------
    | Forçar Região
    |--------------------------------------------------------------------------
    |
    | Forçar uma região específica, útil para testes ou aplicações 
    | de país único. Quando definido, isto substitui toda a auto-detecção.
    |
    */
    'force_region' => env('LUSOPHONE_FORCE_REGION'),

    /*
    |--------------------------------------------------------------------------
    | Integração Breeze & Jetstream
    |--------------------------------------------------------------------------
    |
    | Ativar integração perfeita com Laravel Breeze e Jetstream.
    | Isto adapta automaticamente mensagens de autenticação e validação.
    |
    */
    'integrations' => [
        'breeze' => [
            'enabled' => env('LUSOPHONE_BREEZE_INTEGRATION', true),
            'override_auth_translations' => true,
            'override_validation_translations' => true,
            'override_pagination_translations' => true,
            'override_password_translations' => true,
        ],

        'jetstream' => [
            'enabled' => env('LUSOPHONE_JETSTREAM_INTEGRATION', true),
            'override_team_translations' => true,
            'override_profile_translations' => true,
            'override_api_translations' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sistema de Tradução Universal
    |--------------------------------------------------------------------------
    |
    | Controla o novo sistema que traduz automaticamente TODOS os __() calls.
    | NOVO: Agora intercepta e traduz qualquer texto, não apenas validações.
    |
    */
    'universal_translation' => [
        'enabled' => env('LUSOPHONE_UNIVERSAL_TRANSLATION', true),
        'cache_translations' => true,
        'fuzzy_matching' => true,
        'fallback_to_english' => true,
        'log_missing_translations' => env('APP_DEBUG', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações de Cache
    |--------------------------------------------------------------------------
    |
    | Controla como a biblioteca cached detecções de região e traduções
    | para melhor performance.
    |
    */
    'cache' => [
        'region_detection_ttl' => 3600, // 1 hora
        'translation_ttl' => 86400,     // 24 horas
        'store' => 'default',           // Laravel cache store
    ],

    /*
    |--------------------------------------------------------------------------
    | Configurações de Detecção
    |--------------------------------------------------------------------------
    |
    | Controla como a detecção de região funciona.
    |
    */
    'detection' => [
        'methods' => [
            'ip_geolocation' => true,
            'http_headers' => true,
            'accept_language' => true,
            'session' => true,
        ],
        
        'ip_services' => [
            'ipinfo' => env('IPINFO_TOKEN'),
            'maxmind' => env('MAXMIND_LICENSE_KEY'),
            'cloudflare' => true, // Headers do CloudFlare
        ],

        'trusted_proxies' => [
            'cloudflare' => true,
            'aws' => true,
        ],
    ],
];
```

## Configurações de Ambiente (.env)

### Configurações Básicas

```env
# Ativar detecção automática (recomendado)
LUSOPHONE_AUTO_DETECT=true

# Definir locale do Laravel automaticamente
LUSOPHONE_AUTO_SET_LOCALE=true

# Região padrão para desenvolvimento
LUSOPHONE_DEFAULT_REGION=MZ

# Sistema de tradução universal
LUSOPHONE_UNIVERSAL_TRANSLATION=true
```

### Configurações Avançadas

```env
# Forçar região específica (desativa detecção automática)
LUSOPHONE_FORCE_REGION=PT

# Integração com Breeze
LUSOPHONE_BREEZE_INTEGRATION=true

# Integração com Jetstream  
LUSOPHONE_JETSTREAM_INTEGRATION=true

# Logging de traduções em falta (apenas desenvolvimento)
LUSOPHONE_LOG_MISSING_TRANSLATIONS=true
```

### Configurações de Produção

```env
# Produção otimizada
LUSOPHONE_AUTO_DETECT=true
LUSOPHONE_AUTO_SET_LOCALE=true
LUSOPHONE_UNIVERSAL_TRANSLATION=true
LUSOPHONE_LOG_MISSING_TRANSLATIONS=false

# Tokens para serviços de geolocalização (opcionais)
IPINFO_TOKEN=seu_token_aqui
MAXMIND_LICENSE_KEY=sua_chave_aqui
```

## Configurações por Ambiente

### Desenvolvimento Local

```php
// config/lusophone.php
'default_region' => 'MZ', // Moçambique para desenvolvimento africano
'auto_detect' => false,   // Usar região padrão
'universal_translation' => [
    'log_missing_translations' => true, // Debug traduções
],
```

### Staging/Testing

```php
'default_region' => 'PT',
'force_region' => 'PT',   // Testes consistentes
'cache' => [
    'region_detection_ttl' => 60, // Cache menor para testes
],
```

### Produção

```php
'auto_detect' => true,    // Detecção completa
'cache' => [
    'region_detection_ttl' => 3600,  // Cache otimizado
    'translation_ttl' => 86400,
],
'universal_translation' => [
    'log_missing_translations' => false, // Sem logging
    'cache_translations' => true,        // Cache ativo
],
```

## Configurações Regionais Específicas

### Aplicação Focada em Moçambique

```env
LUSOPHONE_DEFAULT_REGION=MZ
LUSOPHONE_FORCE_REGION=MZ
APP_LOCALE=pt_MZ
```

```php
// config/app.php
'locale' => 'pt_MZ',
'fallback_locale' => 'pt',
```

### Aplicação Multi-país (Recomendada)

```env
LUSOPHONE_AUTO_DETECT=true
LUSOPHONE_DEFAULT_REGION=MZ
APP_LOCALE=pt
```

### Aplicação Apenas Portugal

```env
LUSOPHONE_FORCE_REGION=PT  
APP_LOCALE=pt_PT
```

## Integração com Frameworks

### Laravel Breeze

```php
// config/lusophone.php
'integrations' => [
    'breeze' => [
        'enabled' => true,
        'override_auth_translations' => true,    // Login/registo
        'override_validation_translations' => true, // Mensagens de erro
        'override_pagination_translations' => true, // Paginação
        'override_password_translations' => true,   // Reset palavra-passe
    ],
],
```

### Laravel Jetstream

```php
'integrations' => [
    'jetstream' => [
        'enabled' => true,
        'override_team_translations' => true,    // Gestão de equipas
        'override_profile_translations' => true, // Perfil do utilizador
        'override_api_translations' => true,     // Tokens de API
    ],
],
```

### APIs e SPAs

```php
// Para APIs que retornam JSON localizado
'auto_set_locale' => true,
'universal_translation' => [
    'enabled' => true,
    'fallback_to_english' => false, // Sempre português
],
```

## Cache e Performance

### Configuração de Cache

```php
'cache' => [
    'region_detection_ttl' => 3600,    // 1 hora
    'translation_ttl' => 86400,        // 24 horas  
    'store' => 'redis',                // Usar Redis se disponível
],
```

### Otimização para Alto Tráfego

```env
# Use Redis para cache
CACHE_DRIVER=redis
LUSOPHONE_CACHE_STORE=redis

# Cache mais longo
LUSOPHONE_REGION_CACHE_TTL=7200
LUSOPHONE_TRANSLATION_CACHE_TTL=172800
```

### Benchmark de Performance

```bash
# Teste de performance
php artisan lusophone:benchmark

# Saída esperada:
# ✅ Detecção de região: 0.8ms (com cache)
# ✅ Tradução universal: 0.3ms (com cache)  
# ✅ Formatação moeda: 0.1ms
# ✅ Validação documento: 1.2ms
```

## Debugging e Desenvolvimento

### Ativar Logging Detalhado

```env
LOG_LEVEL=debug
LUSOPHONE_LOG_MISSING_TRANSLATIONS=true
```

### Comandos de Debug

```bash
# Ver configuração atual
php artisan lusophone:config

# Testar detecção com debug
php artisan lusophone:detect --debug

# Ver traduções em falta
php artisan lusophone:missing-translations

# Limpar cache
php artisan lusophone:clear-cache
```

### Logging Personalizado

```php
// config/logging.php
'channels' => [
    'lusophone' => [
        'driver' => 'daily',
        'path' => storage_path('logs/lusophone.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],
],
```

```php
// No seu Service Provider
use Illuminate\Support\Facades\Log;

// Registrar listener para traduções em falta
Event::listen('lusophone.missing_translation', function ($event) {
    Log::channel('lusophone')->info('Tradução em falta:', [
        'key' => $event->key,
        'region' => $event->region,
        'context' => $event->context,
    ]);
});
```

## Configurações Avançadas

### Personalizar Detecção de Região

```php
// app/Providers/AppServiceProvider.php
use ArnaldoTomo\LaravelLusophone\Services\RegionDetector;

public function boot()
{
    // Adicionar lógica personalizada de detecção
    RegionDetector::extend('custom_domain', function ($request) {
        $domain = $request->getHost();
        
        return match (true) {
            str_ends_with($domain, '.co.mz') => 'MZ',
            str_ends_with($domain, '.pt') => 'PT',
            str_ends_with($domain, '.com.br') => 'BR',
            str_ends_with($domain, '.co.ao') => 'AO',
            default => null,
        };
    });
}
```

### Personalizar Formatação de Moeda

```php
// app/Providers/AppServiceProvider.php
use ArnaldoTomo\LaravelLusophone\Services\CurrencyFormatter;

public function boot()
{
    // Personalizar formatação para Moçambique
    CurrencyFormatter::extend('MZ', function ($amount, $options = []) {
        // Usar separador personalizado
        $formatted = number_format($amount, 2, ',', '.');
        return $formatted . ' MT'; // Formato: 1.500,50 MT
    });
    
    // Formatação empresarial
    CurrencyFormatter::extend('business', function ($amount, $region) {
        $currencies = [
            'MZ' => 'MZN',
            'PT' => 'EUR', 
            'BR' => 'BRL',
            'AO' => 'AOA',
        ];
        
        $formatted = number_format($amount, 2, ',', ' ');
        return $formatted . ' ' . $currencies[$region];
    });
}
```

### Hooks e Eventos

```php
// Registrar listeners para eventos do Laravel Lusophone
use ArnaldoTomo\LaravelLusophone\Events\RegionDetected;
use ArnaldoTomo\LaravelLusophone\Events\TranslationMissing;
use ArnaldoTomo\LaravelLusophone\Events\ValidationFailed;

// app/Providers/EventServiceProvider.php
protected $listen = [
    RegionDetected::class => [
        'App\Listeners\LogRegionDetection',
        'App\Listeners\SetUserPreferences',
    ],
    
    TranslationMissing::class => [
        'App\Listeners\LogMissingTranslation',
        'App\Listeners\NotifyDevelopers',
    ],
    
    ValidationFailed::class => [
        'App\Listeners\LogValidationAttempts',
    ],
];
```

### Middleware Personalizado

```php
// app/Http/Middleware/EnsureLusophoneRegion.php
<?php

namespace App\Http\Middleware;

use Closure;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class EnsureLusophoneRegion
{
    public function handle($request, Closure $next, $allowedRegions = null)
    {
        $currentRegion = Lusophone::detectRegion();
        
        if ($allowedRegions) {
            $allowed = explode(',', $allowedRegions);
            
            if (!in_array($currentRegion, $allowed)) {
                abort(403, 'Região não suportada para esta funcionalidade.');
            }
        }
        
        // Adicionar região aos dados do request
        $request->merge(['lusophone_region' => $currentRegion]);
        
        return $next($request);
    }
}
```

```php
// Usar no routing
Route::middleware(['lusophone.region:MZ,PT,AO'])->group(function () {
    Route::get('/nif-validation', 'TaxController@validateNif');
});
```

## Configurações por Funcionalidade

### Sistema de Tradução Universal

```php
'universal_translation' => [
    'enabled' => true,
    
    // Cache de traduções para performance
    'cache_translations' => true,
    'cache_ttl' => 86400, // 24 horas
    
    // Matching inteligente
    'fuzzy_matching' => true,
    'similarity_threshold' => 0.8, // 80% similaridade
    
    // Fallbacks
    'fallback_to_english' => true,
    'fallback_chain' => ['pt_MZ', 'pt', 'en'],
    
    // Logging
    'log_missing_translations' => env('APP_DEBUG', false),
    'log_successful_matches' => false,
    
    // Exclusões
    'exclude_keys' => [
        'app.name',
        'app.url', 
        'custom.api_keys.*',
    ],
    
    // Contextos especiais
    'contexts' => [
        'business' => 'formal',
        'casual' => 'informal', 
        'technical' => 'precise',
    ],
],
```

### Validação Avançada

```php
'validation' => [
    // Configurações por país
    'country_configs' => [
        'MZ' => [
            'nuit' => [
                'length' => 9,
                'algorithm' => 'simple_checksum',
                'format' => '/^\d{9}$/',
            ],
            'phone' => [
                'formats' => ['+258XXXXXXXXX', '8XXXXXXXX', '2XXXXXXXX'],
                'mobile_prefixes' => ['82', '83', '84', '85', '86', '87'],
            ],
        ],
        
        'PT' => [
            'nif' => [
                'length' => 9,
                'algorithm' => 'nif_portugal',
                'format' => '/^\d{9}$/',
            ],
            'phone' => [
                'formats' => ['+351XXXXXXXXX', '9XXXXXXXX', '2XXXXXXXX'],
                'mobile_prefixes' => ['91', '92', '93', '96'],
            ],
        ],
    ],
    
    // Mensagens personalizadas
    'custom_messages' => [
        'lusophone_tax_id' => [
            'MZ' => 'O :attribute deve ser um NUIT moçambicano válido.',
            'PT' => 'O :attribute deve ser um NIF português válido.',
            'BR' => 'O :attribute deve ser um CPF brasileiro válido.',
        ],
    ],
],
```

### Formatação Regional

```php
'formatting' => [
    // Formatos de número
    'number_formats' => [
        'MZ' => [
            'decimal_separator' => ',',
            'thousands_separator' => '.',
            'currency_position' => 'after', // 1.500,50 MT
        ],
        'PT' => [
            'decimal_separator' => ',',
            'thousands_separator' => ' ',
            'currency_position' => 'after', // 1 500,50 €
        ],
        'BR' => [
            'decimal_separator' => ',',
            'thousands_separator' => '.',
            'currency_position' => 'before', // R$ 1.500,50
        ],
    ],
    
    // Formatos de data
    'date_formats' => [
        'MZ' => 'd/m/Y',     // 25/12/2024
        'PT' => 'd-m-Y',     // 25-12-2024  
        'BR' => 'd/m/Y',     // 25/12/2024
        'AO' => 'd/m/Y',     // 25/12/2024
    ],
],
```

## Testes e Validação da Configuração

### Comando de Validação

```bash
# Validar toda a configuração
php artisan lusophone:validate-config

# Saída esperada:
# ✅ Configuração válida
# ✅ Extensões PHP instaladas
# ✅ Cache funcionando
# ✅ Detecção de região ativa
# ✅ Traduções carregadas
# ⚠️ Aviso: Token IPInfo não configurado (opcional)
```

### Testes Unitários para Configuração

```php
// tests/Feature/LusophoneConfigTest.php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class LusophoneConfigTest extends TestCase
{
    /** @test */
    public function it_loads_configuration_correctly()
    {
        $config = config('lusophone');
        
        $this->assertTrue($config['auto_detect']);
        $this->assertEquals('MZ', $config['default_region']);
        $this->assertTrue($config['auto_set_locale']);
    }
    
    /** @test */ 
    public function it_respects_forced_region()
    {
        config(['lusophone.force_region' => 'PT']);
        
        $region = Lusophone::detectRegion();
        
        $this->assertEquals('PT', $region);
    }
    
    /** @test */
    public function it_validates_all_supported_regions()
    {
        $supportedRegions = ['PT', 'BR', 'MZ', 'AO', 'CV', 'GW', 'ST', 'TL'];
        
        foreach ($supportedRegions as $region) {
            $this->assertTrue(Lusophone::isLusophoneCountry($region));
        }
    }
}
```

### Scripts de Deployment

```bash
#!/bin/bash
# scripts/deploy-lusophone.sh

echo "🚀 Deployment Laravel Lusophone"

# 1. Verificar requisitos
php artisan lusophone:check-requirements

# 2. Publicar configurações se necessário
if [ ! -f config/lusophone.php ]; then
    php artisan vendor:publish --tag=lusophone-config --quiet
fi

# 3. Cache de configuração para produção
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan lusophone:cache-translations
fi

# 4. Validar configuração
php artisan lusophone:validate-config

# 5. Teste rápido
php artisan lusophone:detect --quiet

echo "✅ Laravel Lusophone configurado com sucesso!"
```

## Exemplos de Configuração Completa

### Configuração para E-commerce Multi-país

```php
<?php
// config/lusophone.php para e-commerce

return [
    'auto_detect' => true,
    'auto_set_locale' => true,
    'default_region' => 'MZ', // Mercado principal
    
    'integrations' => [
        'breeze' => ['enabled' => true],
        'jetstream' => ['enabled' => false], // Não usar Jetstream
    ],
    
    'universal_translation' => [
        'enabled' => true,
        'cache_translations' => true,
        'fuzzy_matching' => true,
        'contexts' => [
            'product' => 'commercial',
            'checkout' => 'formal',
            'support' => 'friendly',
        ],
    ],
    
    'formatting' => [
        'currency_precision' => 2, // Sempre 2 casas decimais
        'show_currency_code' => true, // "1.500,50 MZN" em vez de "MT"
    ],
    
    'validation' => [
        'strict_mode' => true, // Validação rigorosa para transações
        'require_phone_verification' => true,
    ],
];
```

### Configuração para Sistema Governamental

```php
<?php
// config/lusophone.php para sistema governamental

return [
    'auto_detect' => true,
    'force_region' => env('GOV_REGION', 'MZ'), // Forçar país específico
    'auto_set_locale' => true,
    
    'universal_translation' => [
        'enabled' => true,
        'contexts' => [
            'legal' => 'formal',
            'public' => 'accessible',
            'internal' => 'technical',
        ],
        'fallback_to_english' => false, // Apenas português
    ],
    
    'validation' => [
        'government_mode' => true, // Validações oficiais
        'audit_validation_attempts' => true, // Log tentativas
    ],
    
    'formatting' => [
        'use_official_currency_names' => true, // "Metical" não "MT"
        'date_format_official' => true, // Formato oficial do país
    ],
];
```

## Migração e Atualização

### Migrar de Versões Anteriores

```bash
# Backup configuração atual
cp config/lusophone.php config/lusophone.backup.php

# Atualizar package
composer update arnaldotomo/laravel-lusophone

# Republicar configuração
php artisan vendor:publish --tag=lusophone-config --force

# Comparar mudanças
diff config/lusophone.backup.php config/lusophone.php

# Validar configuração nova
php artisan lusophone:validate-config
```

### Changelog de Configuração

```markdown
# Mudanças na configuração por versão

## v1.0.4 → v1.0.5
- Adicionado: `universal_translation.fuzzy_matching`
- Adicionado: `formatting.currency_precision`
- Mudança: `default_region` agora padrão 'MZ' (antes 'PT')

## v1.0.3 → v1.0.4  
- Adicionado: `integrations.jetstream`
- Adicionado: `cache.translation_ttl`
- Removido: `deprecated_option` (descontinuada)
```

## Próximos Passos

Agora que compreende as configurações do Laravel Lusophone:

1. **[Aprenda sobre validações universais](validation.md)**
2. **[Explore formatação de moedas](formatting.md)**
3. **[Personalize traduções](translations.md)**
4. **[Configure detecção de região](detection.md)**
5. **[Implemente em produção](deployment.md)**

---

**Configuração concluída! 🎛️ Agora tem controlo total sobre o comportamento do Laravel Lusophone.**
