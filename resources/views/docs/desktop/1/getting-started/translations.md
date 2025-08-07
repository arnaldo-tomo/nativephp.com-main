---
title: Traduções 
order: 005
---
# Sistema de Traduções Universal

## Introdução

O Laravel Lusophone inclui um **sistema de tradução revolucionário** que intercepta automaticamente **todas** as chamadas `__()` do Laravel e traduz o texto para português regional. Não é apenas validação - é tradução completa e automática de toda a aplicação.

## Tradução Automática Universal

### Como Funciona

O sistema intercepta automaticamente todas as traduções do Laravel:

```php
// Laravel padrão (inglês)
{{ __("You're logged in!") }}
{{ __("Welcome back") }}
{{ __("Save changes") }}
{{ __("Dashboard") }}
{{ __("Profile") }}

// Resultado automático por região:
// 🇵🇹 Portugal:
// → "Está autenticado!"
// → "Bem-vindo de volta"  
// → "Guardar alterações"
// → "Painel de controlo"
// → "Perfil"

// 🇧🇷 Brasil:
// → "Você está logado!"
// → "Bem-vindo de volta"
// → "Salvar alterações"
// → "Dashboard"
// → "Perfil"

// 🇲🇿 Moçambique:
// → "Está conectado!"
// → "Bem-vindo de volta"
// → "Salvar alterações"
// → "Dashboard" 
// → "Perfil"
```

### Zero Configuração Necessária

```php
// ANTES: Precisava criar arquivo de tradução para cada frase
// resources/lang/pt/messages.php
return [
    'welcome' => 'Bem-vindo',
    'profile' => 'Perfil',
    // ... centenas de linhas
];

// AGORA: Funciona automaticamente
{{ __("Welcome") }}     // → "Bem-vindo"
{{ __("Profile") }}     // → "Perfil" 
{{ __("Dashboard") }}   // → "Dashboard"
// Zero configuração!
```

## Traduções Contextuais

### Adaptação Cultural Automática

O sistema adapta a terminologia ao contexto cultural de cada país:

```php
// Contexto: Tecnologia/Telecomunicações
__('Phone')
// 🇵🇹 Portugal: "Telemóvel"
// 🇧🇷 Brasil: "Celular"  
// 🇲🇿 Moçambique: "Celular" (influência brasileira)
// 🇦🇴 Angola: "Telefone"

__('Email')
// 🇵🇹 Portugal: "Correio electrónico" 
// 🇧🇷 Brasil: "E-mail"
// 🇲🇿 Moçambique: "Email" (moderno)
// 🇦🇴 Angola: "Correio electrónico"

// Contexto: Aplicações Web
__('Login')
// 🇵🇹 Portugal: "Iniciar sessão"
// 🇧🇷 Brasil: "Entrar" 
// 🇲🇿 Moçambique: "Entrar"
// 🇦🇴 Angola: "Iniciar sessão"
```

### Formalidade Automática

```php
// Contexto empresarial (formal)
__('Welcome to our platform')
// 🇵🇹 Portugal: "Bem-vindo à nossa plataforma"
// 🇧🇷 Brasil: "Bem-vindo à nossa plataforma" 
// 🇲🇿 Moçambique: "Bem-vindo à nossa plataforma"

// Contexto casual (informal)  
__('Hey there!')
// 🇵🇹 Portugal: "Olá!"
// 🇧🇷 Brasil: "Oi!"
// 🇲🇿 Moçambique: "Olá!"
```

## Base de Dados de Traduções

### 500+ Frases Comuns Incluídas

O Laravel Lusophone inclui traduções para:

#### Interface de Aplicações
```php
__('Dashboard')           // → "Painel" / "Dashboard"
__('Settings')           // → "Configurações" / "Definições" 
__('Profile')            // → "Perfil"
__('Notifications')      // → "Notificações"
__('Search')             // → "Pesquisar" / "Procurar"
__('Filter')             // → "Filtrar"
__('Sort')               // → "Ordenar"
__('Export')             // → "Exportar"
__('Import')             // → "Importar"
__('Delete')             // → "Eliminar" / "Excluir"
```

#### Ações e Botões
```php
__('Save')               // → "Guardar" / "Salvar"
__('Cancel')             // → "Cancelar"
__('Submit')             // → "Enviar" / "Submeter"
__('Continue')           // → "Continuar"
__('Back')               // → "Voltar"
__('Next')               // → "Seguinte" / "Próximo"
__('Previous')           // → "Anterior"
__('Finish')             // → "Concluir" / "Finalizar"
__('Close')              // → "Fechar"
__('Open')               // → "Abrir"
```

#### Estados e Status
```php
__('Active')             // → "Ativo"
__('Inactive')           // → "Inativo"
__('Pending')            // → "Pendente"
__('Completed')          // → "Concluído" / "Completado"
__('Failed')             // → "Falhado" / "Falhou"
__('Success')            // → "Sucesso"
__('Error')              // → "Erro"
__('Warning')            // → "Aviso"
__('Loading')            // → "Carregando" / "A carregar"
```

#### Formulários e Validação
```php
__('Required')           // → "Obrigatório"
__('Optional')           // → "Opcional"
__('Invalid')            // → "Inválido"
__('Valid')              // → "Válido"
__('Name')               // → "Nome"
__('Email')              // → "Email" / "Correio electrónico"
__('Password')           // → "Palavra-passe" / "Senha"
__('Confirm Password')   // → "Confirmar palavra-passe" / "Confirmar senha"
```

#### E-commerce
```php
__('Add to Cart')        // → "Adicionar ao carrinho" / "Adicionar ao cesto"
__('Cart')               // → "Carrinho" / "Cesto"
__('Checkout')           // → "Finalizar compra" / "Checkout"
__('Price')              // → "Preço"
__('Quantity')           // → "Quantidade"
__('Total')              // → "Total"
__('Subtotal')           // → "Subtotal"
__('Tax')                // → "Imposto" / "Taxa"
__('Shipping')           // → "Envio" / "Entrega"
```

## Personalização de Traduções

### Ficheiros de Idioma Regionais

```php
// resources/lang/pt_PT/app.php (Portugal)
<?php

return [
    'phone' => 'Telemóvel',
    'email' => 'Correio electrónico',
    'login' => 'Iniciar sessão',
    'logout' => 'Terminar sessão',
    'save' => 'Guardar',
    'delete' => 'Eliminar',
    'search' => 'Procurar',
    'settings' => 'Definições',
    'mobile' => 'Telemóvel',
    'website' => 'Sítio web',
];
```

```php
// resources/lang/pt_BR/app.php (Brasil)  
<?php

return [
    'phone' => 'Celular',
    'email' => 'E-mail', 
    'login' => 'Entrar',
    'logout' => 'Sair',
    'save' => 'Salvar',
    'delete' => 'Excluir',
    'search' => 'Pesquisar',
    'settings' => 'Configurações',
    'mobile' => 'Celular',
    'website' => 'Site',
];
```

```php
// resources/lang/pt_MZ/app.php (Moçambique)
<?php

return [
    'phone' => 'Celular',        // Influência brasileira
    'email' => 'Email',          // Moderno, internacional
    'login' => 'Entrar',         // Informal
    'logout' => 'Sair',
    'save' => 'Salvar',          // Influência brasileira
    'delete' => 'Eliminar',      // Influência portuguesa  
    'search' => 'Pesquisar',     // Brasileiro
    'settings' => 'Configurações', // Brasileiro
    'mobile' => 'Celular',
    'website' => 'Website',      // Internacional
];
```

### Publicar e Personalizar Traduções

```bash
# Publicar ficheiros de idioma para personalização
php artisan vendor:publish --tag=lusophone-lang

# Estrutura criada:
# resources/lang/
# ├── pt/           # Português universal (fallback)
# ├── pt_PT/        # Português de Portugal
# ├── pt_BR/        # Português do Brasil
# ├── pt_MZ/        # Português de Moçambique
# ├── pt_AO/        # Português de Angola
# └── pt_CV/        # Português de Cabo Verde
```

### Adicionar Traduções Personalizadas

```php
// resources/lang/pt_MZ/custom.php
<?php

return [
    // Terminologia específica da sua aplicação
    'dashboard' => 'Painel Principal',
    'user_management' => 'Gestão de Utilizadores',
    'financial_report' => 'Relatório Financeiro',
    
    // Contexto empresarial moçambicano
    'nuit' => 'NUIT',
    'taxpayer' => 'Contribuinte',
    'invoice' => 'Factura',
    'receipt' => 'Recibo',
    
    // Contexto bancário
    'account_number' => 'Número de conta',
    'bank_transfer' => 'Transferência bancária',
    'mobile_money' => 'Mobile Money',
    'mpesa' => 'M-Pesa',
    
    // Contexto educacional  
    'student' => 'Estudante',
    'teacher' => 'Professor',
    'course' => 'Curso',
    'grade' => 'Nota',
];
```

## Directivas Blade Avançadas

### Tradução Condicional por Região

```blade
{{-- Tradução automática --}}
{{ __('Welcome') }}

{{-- Forçar tradução regional --}}
@translate('Welcome', 'PT')           {{-- "Bem-vindo" --}}
@translate('Welcome', 'BR')           {{-- "Bem-vindo" --}}  
@translate('Welcome', 'MZ')           {{-- "Bem-vindo" --}}

{{-- Tradução contextual --}}
@contextual('login', 'formal')        {{-- "Iniciar sessão" --}}
@contextual('login', 'casual')        {{-- "Entrar" --}}

{{-- Conteúdo regional específico --}}
@regional('payment_methods', 'MZ')
    <p>Aceitamos M-Pesa, cartão bancário e transferência bancária.</p>
@endregional

@regional('payment_methods', 'PT')
    <p>Aceitamos Multibanco, cartão de crédito e transferência bancária.</p>
@endregional

@regional('payment_methods', 'BR')
    <p>Aceitamos PIX, cartão de crédito e boleto bancário.</p>
@endregional
```

### Pluralização Inteligente

```blade
{{-- Pluralização automática por região --}}
@choice('messages.items', $count)

{{-- resources/lang/pt_PT/messages.php --}}
'items' => '{0} Nenhum item|{1} Um item|[2,*] :count itens'

{{-- resources/lang/pt_BR/messages.php --}}  
'items' => '{0} Nenhum item|{1} Um item|[2,*] :count itens'

{{-- resources/lang/pt_MZ/messages.php --}}
'items' => '{0} Nenhum item|{1} Um item|[2,*] :count itens'
```

### Formatação com Tradução

```blade
{{-- Combinar tradução + formatação --}}
<div class="price">
    {{ __('Price') }}: @currency($produto->preco)
</div>

{{-- Resultado por região: --}}
{{-- PT: "Preço: 1 500,50 €" --}}
{{-- BR: "Preço: R$ 1.500,50" --}}
{{-- MZ: "Preço: 1.500,50 MT" --}}

{{-- Campo com label traduzido --}}
@field('tax_id')
{{-- PT: "NIF" --}}
{{-- BR: "CPF" --}}  
{{-- MZ: "NUIT" --}}
```

## Integração com Laravel Breeze

### Tradução Automática das Views

```blade
{{-- resources/views/auth/login.blade.php --}}
<x-guest-layout>
    <x-auth-card>
        <div>
            <h2>{{ __('Log in') }}</h2>  {{-- Traduzido automaticamente --}}
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- Resultado automático por região: --}}
{{-- PT: "Iniciar sessão", "Correio electrónico", "Palavra-passe", "Esqueceu a palavra-passe?" --}}
{{-- BR: "Entrar", "E-mail", "Senha", "Esqueceu sua senha?" --}}
{{-- MZ: "Entrar", "Email", "Senha", "Esqueceu a senha?" --}}
```

## Integração com Laravel Jetstream

### Dashboard Traduzido

```blade
{{-- resources/views/dashboard.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Dashboard') }}</h2>
    </x-slot>

    <div>
        <div>
            {{ __("You're logged in!") }}
        </div>
    </div>
</x-app-layout>

{{-- Resultado automático: --}}
{{-- PT: "Painel", "Está autenticado!" --}}
{{-- BR: "Dashboard", "Você está logado!" --}}  
{{-- MZ: "Dashboard", "Está conectado!" --}}
```

### Gestão de Perfil

```blade
{{-- resources/views/profile/show.blade.php --}}
<div>
    <div>
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
            @livewire('profile.update-profile-information-form')
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif
    </div>
</div>

{{-- Os componentes Livewire são automaticamente traduzidos --}}
```

## Sistema de Cache de Traduções

### Cache Inteligente

```php
// Configuração de cache de traduções
'universal_translation' => [
    'cache_translations' => true,
    'cache_ttl' => 86400,        // 24 horas
    'cache_key_prefix' => 'lusophone_trans_',
    
    // Cache por região
    'cache_per_region' => true,
    
    // Invalidação automática
    'auto_invalidate' => true,
],
```

### Comandos de Cache

```bash
# Limpar cache de traduções
php artisan lusophone:clear-translations

# Pré-carregar traduções comuns
php artisan lusophone:cache-translations

# Estatísticas de cache
php artisan lusophone:translation-stats

# Saída esperada:
# 📊 Estatísticas de Traduções Laravel Lusophone
# 
# ✅ Traduções em cache: 1,247
# 📈 Taxa de acerto: 94.2%
# 🎯 Traduções automáticas: 892
# 📝 Traduções personalizadas: 355
# 🌍 Regiões ativas: PT, BR, MZ, AO
# 💾 Tamanho do cache: 2.1 MB
```

## Fuzzy Matching e IA

### Matching Inteligente

```php
// O sistema encontra automaticamente traduções similares
__('Save Document')      // → "Guardar Documento"
__('Save File')          // → "Guardar Ficheiro"  
__('Save Changes')       // → "Guardar Alterações"

// Variações são detectadas automaticamente
__('Log in')            // → "Iniciar sessão"
__('Login')             // → "Iniciar sessão"  
__('Sign in')           // → "Iniciar sessão"

// Sinônimos são reconhecidos
__('Phone')             // → "Telemóvel" (PT)
__('Mobile')            // → "Telemóvel" (PT)
__('Cell phone')        // → "Telemóvel" (PT)
```

### Configuração do Fuzzy Matching

```php
// config/lusophone.php
'universal_translation' => [
    'fuzzy_matching' => true,
    'similarity_threshold' => 0.8,    // 80% de similaridade
    'max_suggestions' => 5,           // Máximo de sugestões
    
    'synonyms' => [
        'phone' => ['mobile', 'cell', 'telephone'],
        'email' => ['e-mail', 'mail', 'electronic mail'],
        'login' => ['log in', 'sign in', 'authenticate'],
        'logout' => ['log out', 'sign out', 'exit'],
    ],
],
```

## Debugging de Traduções

### Logging de Traduções

```php
// Ativar logging de traduções em falta
'universal_translation' => [
    'log_missing_translations' => env('APP_DEBUG', false),
    'log_successful_matches' => false,
    'log_channel' => 'lusophone',
];
```

```bash
# Ver traduções em falta
php artisan lusophone:missing-translations

# Saída:
# 🔍 Traduções em Falta - Laravel Lusophone
# 
# ❌ Não encontradas (últimas 24h):
# - "Custom Button Text" (usado 12x)
# - "Special Menu Item" (usado 8x)
# - "Company Specific Term" (usado 3x)
# 
# 💡 Sugestões:
# - Adicionar a resources/lang/pt/custom.php
# - Usar __() nas views existentes
# - Configurar sinônimos no config
```

### Modo Debug Avançado

```php
// app/Providers/AppServiceProvider.php
public function boot()
{
    if (app()->environment('local')) {
        // Mostrar chaves de tradução não encontradas
        Event::listen('lusophone.translation.missing', function ($key, $region) {
            logger()->warning("Tradução em falta: {$key} para região {$region}");
        });
        
        // Log traduções automáticas bem-sucedidas
        Event::listen('lusophone.translation.found', function ($key, $translation, $region) {
            logger()->info("Traduzido: '{$key}' → '{$translation}' ({$region})");
        });
    }
}
```

## Tradução de Emails

### Templates de Email Localizados

```blade
{{-- resources/views/emails/welcome.blade.php --}}
<x-mail::message>
# {{ __('Welcome to our platform!') }}

{{ __('Hello') }} {{ $user->name }},

{{ __('Thank you for joining us. We are excited to have you on board.') }}

<x-mail::button :url="$loginUrl">
{{ __('Get Started') }}
</x-mail::button>

{{ __('Thanks') }},<br>
{{ config('app.name') }}
</x-mail::message>

{{-- Resultado automático por região: --}}
{{-- PT: "Bem-vindo à nossa plataforma!", "Obrigado", "Começar" --}}
{{-- BR: "Bem-vindo à nossa plataforma!", "Obrigado", "Começar" --}}
{{-- MZ: "Bem-vindo à nossa plataforma!", "Obrigado", "Começar" --}}
```

### Recuperação de Password

```blade
{{-- resources/views/emails/auth/reset-password.blade.php --}}
<x-mail::message>
# {{ __('Reset Password') }}

{{ __('You are receiving this email because we received a password reset request for your account.') }}

<x-mail::button :url="$resetUrl">
{{ __('Reset Password') }}
</x-mail::button>

{{ __('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]) }}

{{ __('If you did not request a password reset, no further action is required.') }}

{{ __('Regards') }},<br>
{{ config('app.name') }}
</x-mail::message>

{{-- Tradução automática com adaptação regional: --}}
{{-- PT: "Repor palavra-passe", "palavra-passe", "Cumprimentos" --}}
{{-- BR: "Redefinir senha", "senha", "Atenciosamente" --}}
{{-- MZ: "Redefinir senha", "senha", "Cumprimentos" --}}
```

## Tradução de Notificações

### Notificações Push

```php
// app/Notifications/WelcomeNotification.php
<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('Welcome to :app', ['app' => config('app.name')]))
            ->greeting(__('Hello :name!', ['name' => $notifiable->name]))
            ->line(__('Welcome to our platform. We are glad to have you with us.'))
            ->action(__('Get Started'), url('/dashboard'))
            ->line(__('Thank you for using our application!'));
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Welcome!'),
            'message' => __('Your account has been created successfully.'),
            'action_url' => url('/dashboard'),
            'action_text' => __('View Dashboard'),
        ];
    }
}

// Resultado automático nas notificações:
// PT: "Bem-vindo ao :app", "Ver Painel"
// BR: "Bem-vindo ao :app", "Ver Dashboard"  
// MZ: "Bem-vindo ao :app", "Ver Dashboard"
```

## API com Respostas Traduzidas

### Localização Automática de APIs

```php
// app/Http/Controllers/Api/AuthController.php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Lógica de autenticação...
        
        if ($user = $this->attemptLogin($request)) {
            return response()->json([
                'message' => __('Login successful'),
                'user' => $user,
                'region' => Lusophone::detectRegion(),
            ]);
        }
        
        return response()->json([
            'message' => __('Invalid credentials'),
            'errors' => [
                'email' => [__('The provided credentials are incorrect.')],
            ],
        ], 401);
    }
    
    public function logout()
    {
        auth()->logout();
        
        return response()->json([
            'message' => __('Successfully logged out'),
        ]);
    }
}

// Respostas automáticas por região:
// PT: "Autenticação bem-sucedida", "Sessão terminada com sucesso"
// BR: "Login realizado com sucesso", "Logout realizado com sucesso"
// MZ: "Login realizado com sucesso", "Logout realizado com sucesso"
```

### Resource Classes Traduzidas

```php
// app/Http/Resources/UserResource.php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => [
                'raw' => $this->status,
                'label' => $this->getStatusLabel(),
            ],
            'created_at' => [
                'raw' => $this->created_at,
                'formatted' => __('Created on :date', [
                    'date' => $this->created_at->format('d/m/Y')
                ]),
            ],
        ];
    }
    
    private function getStatusLabel()
    {
        return match ($this->status) {
            'active' => __('Active'),
            'inactive' => __('Inactive'), 
            'pending' => __('Pending'),
            'suspended' => __('Suspended'),
            default => __('Unknown'),
        };
    }
}

// JSON response automaticamente traduzido:
// PT: "Ativo", "Inativo", "Pendente", "Suspenso", "Criado em 25/12/2024"
// BR: "Ativo", "Inativo", "Pendente", "Suspenso", "Criado em 25/12/2024"
// MZ: "Ativo", "Inativo", "Pendente", "Suspenso", "Criado em 25/12/2024"
```

## Próximos Passos

Agora que domina o sistema de traduções do Laravel Lusophone:

1. **[Configure detecção avançada de região](detection.md)**
2. **[Personalize comportamentos específicos](customization.md)**
3. **[Prepare para deploy em produção](deployment.md)**
4. **[Integre com sistemas externos](integrations.md)**
5. **[Otimize performance](performance.md)**

---

**Tradução concluída! 🌐 A sua aplicação agora fala português perfeito em qualquer país lusófono automaticamente.**
