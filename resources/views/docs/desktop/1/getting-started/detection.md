---
title: Detecção de Região 
order: 006
---

# Detecção de Região

## Introdução

O Laravel Lusophone inclui um sistema inteligente de **detecção automática de região** que identifica o país do utilizador através de múltiplos métodos, adaptando automaticamente toda a aplicação ao contexto local sem qualquer intervenção manual.

## Como Funciona a Detecção

### Detecção Multi-método

O sistema utiliza uma cascata inteligente de métodos de detecção:

```php
// Ordem de prioridade da detecção:
1. Região forçada (configuração)
2. Sessão do utilizador (cache)
3. Header CF-IPCountry (Cloudflare)
4. Header X-Country-Code (AWS/outros)
5. Geolocalização por IP (IPInfo/MaxMind)
6. Header Accept-Language (navegador)
7. Região padrão (fallback)
```

### Detecção Inteligente por Ambiente

```php
// AMBIENTE LOCAL (desenvolvimento):
// → Detecta automaticamente como MZ (Moçambique)
// → Perfeito para desenvolvimento africano
// → Zero configuração necessária

// AMBIENTE PRODUÇÃO (online):
// → Detecta país real do utilizador
// → Usa IP geolocation + headers HTTP
// → Cache por sessão para performance
```

## Métodos de Detecção

### 1. Geolocalização por IP

```php
// Serviços suportados
'ip_services' => [
    'ipinfo' => env('IPINFO_TOKEN'),         // ipinfo.io (recomendado)
    'maxmind' => env('MAXMIND_LICENSE_KEY'), // MaxMind GeoIP2
    'cloudflare' => true,                    // Cloudflare headers
],

// Exemplo de resposta:
$info = Lusophone::getIpInfo('196.188.1.1'); // IP moçambicano
// [
//     'country' => 'MZ',
//     'region' => 'Maputo',
//     'city' => 'Maputo',
//     'timezone' => 'Africa/Maputo',
// ]
```

### 2. Headers HTTP

```php
// Headers suportados automaticamente:
'CF-IPCountry'      // Cloudflare
'X-Country-Code'    // AWS CloudFront, outros CDNs
'X-Real-IP'         // Nginx proxy
'X-Forwarded-For'   // Load balancers
'CloudFront-Viewer-Country' // AWS
```

### 3. Preferências do Navegador

```php
// Análise do header Accept-Language
'Accept-Language: pt-PT,pt;q=0.9,en;q=0.8'   → 'PT' (Portugal)
'Accept-Language: pt-BR,pt;q=0.9,en;q=0.7'   → 'BR' (Brasil)
'Accept-Language: pt,en;q=0.9'                → 'MZ' (padrão lusófono)
```

### 4. Detecção por Domínio

```php
// Configuração opcional por domínio
'domain_detection' => [
    'example.co.mz'  => 'MZ',    // Domínio moçambicano
    'example.pt'     => 'PT',    // Domínio português
    'example.com.br' => 'BR',    // Domínio brasileiro
    'example.co.ao'  => 'AO',    // Domínio angolano
],
```

## Configuração da Detecção

### Configurações Básicas

```php
// config/lusophone.php
'detection' => [
    'methods' => [
        'ip_geolocation' => true,    // Geolocalização IP
        'http_headers' => true,      // Headers HTTP
        'accept_language' => true,   // Preferências navegador
        'session' => true,           // Cache de sessão
        'domain' => true,            // Detecção por domínio
    ],
    
    'cache_ttl' => 3600,            // Cache por 1 hora
    'fallback_region' => 'MZ',      // Região padrão
],
```

### Serviços de Geolocalização

#### IPInfo.io (Recomendado)

```env
# .env
IPINFO_TOKEN=seu_token_aqui
```

```php
// Configuração
'ip_services' => [
    'ipinfo' => [
        'token' => env('IPINFO_TOKEN'),
        'timeout' => 3,              // 3 segundos timeout
        'cache_ttl' => 86400,        // Cache por 24h
    ],
],
```

#### MaxMind GeoIP2

```env
# .env  
MAXMIND_LICENSE_KEY=sua_chave_aqui
MAXMIND_DATABASE_PATH=/path/to/GeoLite2-Country.mmdb
```

```php
'ip_services' => [
    'maxmind' => [
        'license_key' => env('MAXMIND_LICENSE_KEY'),
        'database_path' => env('MAXMIND_DATABASE_PATH'),
        'auto_update' => true,       // Atualizar base dados automaticamente
    ],
],
```

## Utilização da Detecção

### Detecção Automática

```php
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

// Detecção automática (método principal)
$regiao = Lusophone::detectRegion();
// → 'MZ', 'PT', 'BR', 'AO', etc.

// Informações completas do país
$info = Lusophone::getCountryInfo();
// [
//     'code' => 'MZ',
//     'name' => 'Moçambique',
//     'currency' => ['code' => 'MZN', 'symbol' => 'MT'],
//     'phone_code' => '+258',
//     'locale' => 'pt_MZ',
// ]
```

### Detecção Manual

```php
// Forçar região específica
Lusophone::forceRegion('PT');

// Detectar baseado em IP específico
$regiao = Lusophone::detectFromIP('196.188.1.1');  // → 'MZ'

// Detectar baseado em header Accept-Language
$regiao = Lusophone::detectFromLanguage('pt-PT,pt;q=0.9');  // → 'PT'

// Limpar cache e re-detectar
Lusophone::clearDetectionCache();
$regiao = Lusophone::detectRegion();
```

### Verificações de Região

```php
// Verificar se é país lusófono
if (Lusophone::isLusophoneCountry('MZ')) {
    // É país lusófono
}

// Verificar região atual
if (Lusophone::detectRegion() === 'MZ') {
    // Utilizador está em Moçambique
}

// Obter todas as regiões suportadas
$regioes = Lusophone::getAvailableRegions();
// ['PT', 'BR', 'MZ', 'AO', 'CV', 'GW', 'ST', 'TL']
```

## Cache e Performance

### Sistema de Cache Inteligente

```php
// Cache automático por sessão
'cache' => [
    'region_detection_ttl' => 3600,      // 1 hora
    'store' => 'default',               // Laravel cache store
    'key_prefix' => 'lusophone_region_',
],

// Cache baseado em:
// - IP do utilizador  
// - Headers HTTP
// - Preferências de idioma
// - Sessão do navegador
```

### Performance Otimizada

```php
// Benchmark típico:
// ✅ Primeira detecção: ~50ms (com geolocalização IP)
// ✅ Detecções subsequentes: ~0.5ms (cache hit)
// ✅ Detecção local: ~0.1ms (sem network calls)
```

### Comandos de Cache

```bash
# Limpar cache de detecção
php artisan lusophone:clear-cache

# Estatísticas de cache
php artisan lusophone:cache-stats

# Saída esperada:
# 📊 Cache de Detecção Laravel Lusophone
# ✅ Regiões em cache: 1,247 utilizadores
# 📈 Taxa de acerto: 96.8%
# 🕐 TTL médio: 2,847 segundos restantes
# 💾 Tamanho: 45.2 KB
```

## Detecção por Contexto

### Detecção Baseada no Utilizador

```php
// app/Models/User.php
class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'preferred_region'];
    
    public function getRegionAttribute()
    {
        // 1. Região preferida do utilizador
        if ($this->preferred_region) {
            return $this->preferred_region;
        }
        
        // 2. Região detectada automaticamente
        return Lusophone::detectRegion();
    }
    
    public function setPreferredRegion($region)
    {
        $this->update(['preferred_region' => $region]);
        
        // Limpar cache para próxima detecção
        Lusophone::clearDetectionCache();
    }
}
```

### Middleware de Detecção

```php
// app/Http/Middleware/DetectLusophoneRegion.php
<?php

namespace App\Http\Middleware;

use Closure;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class DetectLusophoneRegion
{
    public function handle($request, Closure $next)
    {
        // Detectar região automaticamente
        $region = Lusophone::detectRegion();
        
        // Adicionar ao request para uso posterior
        $request->merge(['lusophone_region' => $region]);
        
        // Definir locale do Laravel
        app()->setLocale(Lusophone::getLocale($region));
        
        // Adicionar header de resposta
        $response = $next($request);
        $response->headers->set('X-Lusophone-Region', $region);
        
        return $response;
    }
}
```

```php
// Registrar middleware globalmente
// app/Http/Kernel.php
protected $middleware = [
    // ...
    \App\Http\Middleware\DetectLusophoneRegion::class,
];
```

## Debugging de Detecção

### Comando de Debug

```bash
# Comando completo de detecção
php artisan lusophone:detect

# Saída detalhada:
# 🌍 Laravel Lusophone - Detecção de Região
# 
# 📍 Ambiente: Produção (online)
# 🔍 IP detectado: 196.188.1.1
# 🌐 País por IP: MZ (Moçambique)
# 📱 Accept-Language: pt,en;q=0.9
# 🏷️ Headers relevantes:
#    ├── CF-IPCountry: MZ
#    ├── X-Forwarded-For: 196.188.1.1
#    └── User-Agent: Mozilla/5.0...
# 
# ✅ Região final: MZ (Moçambique)
# 💰 Moeda: MZN (Metical)
# 📞 Código telefónico: +258
# 🗣️ Locale: pt_MZ
# ⚡ Tempo de detecção: 23ms
# 💾 Cache: Sim (expires in 3547s)
```

### Debug com Opções

```bash
# Testar detecção com IP específico
php artisan lusophone:detect --ip=196.188.1.1

# Testar com headers específicos
php artisan lusophone:detect --header="CF-IPCountry:PT"

# Modo verbose (detalhado)
php artisan lusophone:detect --verbose

# Limpar cache antes do teste
php artisan lusophone:detect --fresh

# Testar todos os métodos
php artisan lusophone:detect --all-methods
```

### Logs de Detecção

```php
// Ativar logging detalhado
'detection' => [
    'log_attempts' => env('APP_DEBUG', false),
    'log_channel' => 'lusophone',
    'log_level' => 'info',
],
```

```php
// Ver logs de detecção
tail -f storage/logs/lusophone.log

// Exemplo de log:
// [2024-12-25 15:30:22] INFO: Detecção iniciada IP=196.188.1.1
// [2024-12-25 15:30:22] INFO: CF-IPCountry header: MZ
// [2024-12-25 15:30:22] INFO: Accept-Language: pt,en;q=0.9
// [2024-12-25 15:30:22] INFO: Região detectada: MZ (cache: 3600s)
```

## Detecção Personalizada

### Adicionar Método Personalizado

```php
// app/Providers/AppServiceProvider.php
use ArnaldoTomo\LaravelLusophone\Services\RegionDetector;

public function boot()
{
    // Adicionar método de detecção personalizado
    RegionDetector::extend('subdomain', function ($request) {
        $host = $request->getHost();
        
        // Detecção por subdomínio
        if (str_starts_with($host, 'mz.')) return 'MZ';
        if (str_starts_with($host, 'pt.')) return 'PT';
        if (str_starts_with($host, 'br.')) return 'BR';
        if (str_starts_with($host, 'ao.')) return 'AO';
        
        return null; // Não detectado por este método
    });
    
    // Adicionar detecção por parâmetro URL
    RegionDetector::extend('url_param', function ($request) {
        if ($region = $request->get('region')) {
            $valid = ['PT', 'BR', 'MZ', 'AO', 'CV', 'GW', 'ST', 'TL'];
            return in_array(strtoupper($region), $valid) ? strtoupper($region) : null;
        }
        
        return null;
    });
}
```

### Detecção por Base de Dados

```php
// Detecção baseada em dados do utilizador
RegionDetector::extend('user_preference', function ($request) {
    if (auth()->check()) {
        $user = auth()->user();
        
        // Região preferida do utilizador
        if ($user->preferred_region) {
            return $user->preferred_region;
        }
        
        // Região baseada no endereço de facturação
        if ($user->billing_country) {
            return $user->billing_country;
        }
        
        // Região do último pedido
        if ($lastOrder = $user->orders()->latest()->first()) {
            return $lastOrder->country;
        }
    }
    
    return null;
});
```

## Integração com CDNs

### Cloudflare

```php
// Headers automáticos do Cloudflare
'trusted_proxies' => [
    'cloudflare' => true,    // Confiar em headers do Cloudflare
],

// Headers disponíveis:
// CF-IPCountry: MZ, PT, BR, AO, etc.
// CF-Ray: Identificador único da request
// CF-Visitor: Protocolo (http/https)
```

### AWS CloudFront

```php
// Headers do CloudFront
'trusted_proxies' => [
    'aws' => true,           // Confiar em headers da AWS
],

// Headers disponíveis:
// CloudFront-Viewer-Country: MZ
// X-Forwarded-For: IP real do utilizador
// CloudFront-Is-Mobile-Viewer: true/false
```

### Configuração de Proxy Confiável

```php
// config/lusophone.php
'detection' => [
    'trusted_proxies' => [
        'cloudflare' => true,
        'aws' => true,
        'custom_ips' => [
            '198.41.128.0/17',   // Cloudflare range
            '162.158.0.0/15',    // Cloudflare range
        ],
    ],
],
```

## Casos de Uso Avançados

### E-commerce Multi-região

```php
// app/Services/EcommerceRegionService.php
<?php

namespace App\Services;

use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class EcommerceRegionService
{
    public function detectShippingRegion()
    {
        $region = Lusophone::detectRegion();
        
        // Mapear regiões para zonas de envio
        return match ($region) {
            'PT' => 'europe',
            'BR' => 'south_america', 
            'MZ', 'AO', 'CV', 'GW', 'ST' => 'africa',
            'TL' => 'asia_pacific',
            default => 'international',
        };
    }
    
    public function getAvailablePaymentMethods()
    {
        $region = Lusophone::detectRegion();
        
        return match ($region) {
            'PT' => ['multibanco', 'mbway', 'paypal', 'card'],
            'BR' => ['pix', 'boleto', 'card', 'paypal'],
            'MZ' => ['mpesa', 'emola', 'card', 'bank_transfer'],
            'AO' => ['multicaixa', 'card', 'bank_transfer'],
            default => ['card', 'paypal'],
        };
    }
    
    public function getCurrencyAndPricing($basePrice)
    {
        $region = Lusophone::detectRegion();
        $info = Lusophone::getCountryInfo($region);
        
        // Converter preços baseado na região
        $convertedPrice = $this->convertPrice($basePrice, $region);
        
        return [
            'amount' => $convertedPrice,
            'currency' => $info['currency'],
            'formatted' => Lusophone::formatCurrency($convertedPrice, $region),
        ];
    }
}
```

### Sistema de Gestão Regional

```php
// app/Services/RegionalManagementService.php
<?php

namespace App\Services;

use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class RegionalManagementService
{
    public function getRegionalSettings()
    {
        $region = Lusophone::detectRegion();
        
        return [
            'region' => $region,
            'country_info' => Lusophone::getCountryInfo($region),
            'business_hours' => $this->getBusinessHours($region),
            'holidays' => $this->getPublicHolidays($region),
            'tax_settings' => $this->getTaxSettings($region),
            'compliance' => $this->getComplianceRequirements($region),
        ];
    }
    
    private function getBusinessHours($region)
    {
        return match ($region) {
            'PT' => ['monday_friday' => '09:00-18:00', 'timezone' => 'Europe/Lisbon'],
            'BR' => ['monday_friday' => '09:00-18:00', 'timezone' => 'America/Sao_Paulo'],
            'MZ' => ['monday_friday' => '08:00-17:00', 'timezone' => 'Africa/Maputo'],
            'AO' => ['monday_friday' => '08:00-17:00', 'timezone' => 'Africa/Luanda'],
            default => ['monday_friday' => '09:00-17:00', 'timezone' => 'UTC'],
        };
    }
    
    private function getTaxSettings($region)
    {
        return match ($region) {
            'PT' => ['vat_rate' => 23, 'tax_number_field' => 'nif'],
            'BR' => ['tax_rate' => 'varies', 'tax_number_field' => 'cpf'],
            'MZ' => ['vat_rate' => 17, 'tax_number_field' => 'nuit'],
            'AO' => ['vat_rate' => 14, 'tax_number_field' => 'nif'],
            default => ['vat_rate' => 0, 'tax_number_field' => 'tax_id'],
        };
    }
}
```

## Testes de Detecção

### Testes Unitários

```php
// tests/Unit/RegionDetectionTest.php
<?php

namespace Tests\Unit;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Illuminate\Http\Request;

class RegionDetectionTest extends TestCase
{
    /** @test */
    public function it_detects_region_from_cloudflare_header()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_CF_IPCOUNTRY' => 'MZ'
        ]);
        
        $region = Lusophone::detectFromRequest($request);
        
        $this->assertEquals('MZ', $region);
    }
    
    /** @test */
    public function it_detects_region_from_accept_language()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'pt-PT,pt;q=0.9,en;q=0.8'
        ]);
        
        $region = Lusophone::detectFromRequest($request);
        
        $this->assertEquals('PT', $region);
    }
    
    /** @test */
    public function it_uses_fallback_region_when_detection_fails()
    {
        config(['lusophone.default_region' => 'AO']);
        
        $request = Request::create('/');
        
        $region = Lusophone::detectFromRequest($request);
        
        $this->assertEquals('AO', $region);
    }
    
    /** @test */
    public function it_caches_detection_results()
    {
        Lusophone::clearDetectionCache();
        
        // Primeira detecção
        $region1 = Lusophone::detectRegion();
        
        // Segunda detecção (deve vir do cache)
        $region2 = Lusophone::detectRegion();
        
        $this->assertEquals($region1, $region2);
        $this->assertTrue(Lusophone::hasCachedRegion());
    }
}
```

### Testes de Integração

```php
// tests/Feature/RegionDetectionIntegrationTest.php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class RegionDetectionIntegrationTest extends TestCase
{
    /** @test */
    public function middleware_detects_and_sets_locale()
    {
        $this->withHeaders(['CF-IPCountry' => 'PT'])
             ->get('/')
             ->assertStatus(200);
        
        $this->assertEquals('pt_PT', app()->getLocale());
    }
    
    /** @test */
    public function api_returns_region_information()
    {
        $this->withHeaders(['CF-IPCountry' => 'MZ'])
             ->getJson('/api/region-info')
             ->assertStatus(200)
             ->assertJson([
                 'region' => 'MZ',
                 'country' => 'Moçambique',
                 'currency' => 'MZN',
             ]);
    }
    
    /** @test */
    public function user_can_override_detected_region()
    {
        $user = User::factory()->create(['preferred_region' => 'BR']);
        
        $this->actingAs($user)
             ->withHeaders(['CF-IPCountry' => 'PT'])
             ->get('/dashboard');
        
        $this->assertEquals('BR', Lusophone::detectRegion());
    }
}
```

## Monitorização e Analytics

### Métricas de Detecção

```php
// app/Services/RegionAnalyticsService.php
<?php

namespace App\Services;

use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class RegionAnalyticsService
{
    public function trackRegionDetection($region, $method)
    {
        // Registar métricas
        $this->incrementCounter("region_detection.{$region}");
        $this->incrementCounter("detection_method.{$method}");
        
        // Log para analytics
        logger()->info('Region detected', [
            'region' => $region,
            'method' => $method,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
    
    public function getRegionStatistics()
    {
        return [
            'total_detections' => $this->getCounter('region_detection.*'),
            'by_region' => [
                'MZ' => $this->getCounter('region_detection.MZ'),
                'PT' => $this->getCounter('region_detection.PT'),
                'BR' => $this->getCounter('region_detection.BR'),
                'AO' => $this->getCounter('region_detection.AO'),
            ],
            'by_method' => [
                'cloudflare' => $this->getCounter('detection_method.cloudflare'),
                'ip_geolocation' => $this->getCounter('detection_method.ip_geolocation'),
                'accept_language' => $this->getCounter('detection_method.accept_language'),
            ],
        ];
    }
}
```

### Dashboard de Monitorização

```bash
# Comando para ver estatísticas
php artisan lusophone:region-stats

# Saída:
# 📊 Estatísticas Regionais - Últimas 24h
# 
# 🌍 Total de detecções: 12,547
# 
# 📈 Por região:
# ├── 🇲🇿 Moçambique: 4,123 (32.8%)
# ├── 🇵🇹 Portugal: 3,891 (31.0%)  
# ├── 🇧🇷 Brasil: 2,987 (23.8%)
# ├── 🇦🇴 Angola: 1,123 (8.9%)
# └── 🇨🇻 Outros: 423 (3.5%)
# 
# 🔍 Por método:
# ├── Cloudflare headers: 8,234 (65.6%)
# ├── IP Geolocation: 2,891 (23.1%)
# ├── Accept-Language: 1,234 (9.8%)
# └── Cache/Sessão: 188 (1.5%)
# 
# ⚡ Performance:
# ├── Tempo médio: 12ms
# ├── Taxa cache hit: 94.2%
# └── Falhas de detecção: 0.3%
```

## Próximos Passos

Agora que compreende a detecção de região do Laravel Lusophone:

1. **[Explore personalização avançada](customization.md)**
2. **[Prepare o deploy em produção](deployment.md)**  
3. **[Configure integrações externas](integrations.md)**
4. **[Otimize para alta performance](performance.md)**
5. **[Monitore e mantenha o sistema](monitoring.md)**

---

**Detecção configurada! 🎯 O sistema agora identifica automaticamente a localização dos seus utilizadores e adapta a experiência adequadamente.**
