---
title: Validação Universal
order: 004
---
## Introdução

O Laravel Lusophone revoluciona a validação de formulários ao oferecer **regras universais** que funcionam automaticamente em todos os países lusófonos. Uma única regra `lusophone_tax_id` valida documentos fiscais em Portugal (NIF), Brasil (CPF), Moçambique (NUIT), Angola (NIF), e todos os outros países automaticamente.

## Regras de Validação Universais

### Validação de Documento Fiscal

A regra `lusophone_tax_id` é inteligente e adapta-se automaticamente ao país do utilizador:

```php
// Uma regra, funciona em todos os países lusófonos
$rules = [
    'tax_id' => 'required|lusophone_tax_id',
];

// Resultados automáticos por país:
// 🇵🇹 Portugal: Valida NIF (9 dígitos + algoritmo específico)
// 🇧🇷 Brasil: Valida CPF (11 dígitos + algoritmo específico)  
// 🇲🇿 Moçambique: Valida NUIT (9 dígitos)
// 🇦🇴 Angola: Valida NIF (10 dígitos + algoritmo angolano)
// 🇨🇻 Cabo Verde: Valida NIF (9 dígitos)
```

**Exemplo prático:**
```php
// app/Http/Requests/UserRegistrationRequest.php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'tax_id' => 'required|lusophone_tax_id', // ✨ Magia aqui
            'phone' => 'required|lusophone_phone',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
```

### Validação de Telefone

```php
$rules = [
    'phone' => 'required|lusophone_phone',
];

// Formatos aceites automaticamente por país:
// 🇵🇹 Portugal: +351912345678, 912345678, +351212345678
// 🇧🇷 Brasil: +5511987654321, (11)98765-4321, 11987654321
// 🇲🇿 Moçambique: +258823456789, 823456789, +258211234567
// 🇦🇴 Angola: +244912345678, 912345678
```

### Validação de Código Postal

```php
$rules = [
    'postal_code' => 'nullable|lusophone_postal',
];

// Formatos por país:
// 🇵🇹 Portugal: 1000-001, 4000-007 (XXXX-XXX)
// 🇧🇷 Brasil: 01310-100, 20040020 (XXXXX-XXX ou XXXXXXXX)
// 🇲🇿 Moçambique: 1100, 3100 (XXXX - Maputo, Beira, etc.)
// 🇦🇴 Angola: Similar a Portugal
```

## Validações Específicas por País

Para casos onde precisa de validação específica de um país:

### Portugal

```php
$rules = [
    'nif' => 'required|nif_portugal',           // NIF português específico
    'phone' => 'required|phone_portugal',       // Telefone português
    'postal' => 'required|postal_portugal',     // Código postal português
    'cc' => 'nullable|cc_portugal',             // Cartão de cidadão (opcional)
];
```

### Brasil

```php
$rules = [
    'cpf' => 'required|cpf_brasil',             // CPF brasileiro
    'cnpj' => 'nullable|cnpj_brasil',           // CNPJ para empresas
    'phone' => 'required|phone_brasil',         // Telefone brasileiro
    'cep' => 'required|cep_brasil',             // CEP brasileiro
];
```

### Moçambique

```php
$rules = [
    'nuit' => 'required|nuit_mocambique',       // NUIT moçambicano
    'phone' => 'required|phone_mocambique',     // Telefone moçambicano  
    'postal' => 'nullable|postal_mocambique',   // Código postal moçambicano
    'bi' => 'nullable|bi_mocambique',           // Bilhete de identidade
];
```

### Angola

```php
$rules = [
    'nif' => 'required|nif_angola',             // NIF angolano
    'phone' => 'required|phone_angola',         // Telefone angolano
    'bi' => 'nullable|bi_angola',               // Bilhete de identidade
];
```

## Mensagens de Erro Localizadas

As mensagens de erro são automaticamente adaptadas ao contexto cultural de cada país:

### Moçambique
```php
// Para utilizador moçambicano:
'lusophone_tax_id' => 'O campo NUIT é obrigatório.',
'lusophone_phone' => 'O número de celular não é válido.',
```

### Portugal
```php
// Para utilizador português:
'lusophone_tax_id' => 'O campo NIF é obrigatório.',
'lusophone_phone' => 'O número de telemóvel não é válido.',
```

### Brasil
```php
// Para utilizador brasileiro:
'lusophone_tax_id' => 'O campo CPF é obrigatório.',
'lusophone_phone' => 'O número de telefone não é válido.',
```

## Personalização de Mensagens

### Mensagens Globais

```php
// resources/lang/pt/validation.php
'lusophone_tax_id' => 'O :attribute deve ser um documento fiscal válido.',
'lusophone_phone' => 'O :attribute deve ser um número de telefone válido.',
'lusophone_postal' => 'O :attribute deve ser um código postal válido.',
```

### Mensagens por País

```php
// resources/lang/pt_MZ/validation.php (Moçambique)
'lusophone_tax_id' => 'O :attribute deve ser um NUIT válido (9 dígitos).',
'lusophone_phone' => 'O :attribute deve ser um número de celular válido.',

// resources/lang/pt_PT/validation.php (Portugal)  
'lusophone_tax_id' => 'O :attribute deve ser um NIF válido.',
'lusophone_phone' => 'O :attribute deve ser um número de telemóvel válido.',

// resources/lang/pt_BR/validation.php (Brasil)
'lusophone_tax_id' => 'O :attribute deve ser um CPF válido.',
'lusophone_phone' => 'O :attribute deve ser um número de telefone válido.',
```

### Mensagens Personalizadas por Campo

```php
// app/Http/Requests/CompanyRegistrationRequest.php
public function messages()
{
    return [
        'company_tax_id.lusophone_tax_id' => 'O documento fiscal da empresa deve ser válido para o país selecionado.',
        'director_phone.lusophone_phone' => 'O contacto do director deve incluir um número válido.',
    ];
}
```

## Validação Condicional

### Baseada na Região Detectada

```php
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

public function rules()
{
    $region = Lusophone::detectRegion();
    
    $rules = [
        'name' => 'required|string',
        'tax_id' => 'required|lusophone_tax_id',
    ];
    
    // Adicionar validações específicas por país
    switch ($region) {
        case 'BR':
            $rules['cnpj'] = 'nullable|cnpj_brasil'; // Para empresas brasileiras
            break;
            
        case 'PT':
            $rules['niss'] = 'nullable|niss_portugal'; // Número Segurança Social
            break;
            
        case 'MZ':
            $rules['employer'] = 'nullable|string'; // Campo opcional em Moçambique
            break;
    }
    
    return $rules;
}
```

### Validação Dinâmica no Frontend

```javascript
// resources/js/validation.js
document.addEventListener('DOMContentLoaded', function() {
    // Obter região do backend
    const region = window.Laravel.region || 'MZ';
    
    // Configurar máscaras de input baseadas na região
    switch(region) {
        case 'PT':
            $('#tax_id').mask('000000000', {placeholder: 'NIF: 123456789'});
            $('#phone').mask('+351000000000', {placeholder: '+351912345678'});
            break;
            
        case 'BR':
            $('#tax_id').mask('000.000.000-00', {placeholder: 'CPF: 123.456.789-00'});
            $('#phone').mask('+55(00)00000-0000', {placeholder: '+55(11)99999-9999'});
            break;
            
        case 'MZ':
            $('#tax_id').mask('000000000', {placeholder: 'NUIT: 123456789'});
            $('#phone').mask('+258000000000', {placeholder: '+258823456789'});
            break;
    }
});
```

## Validação Avançada

### Validação de Empresas

```php
// Para registos de empresas
$rules = [
    'company_type' => 'required|in:individual,company',
    'tax_id' => 'required|lusophone_tax_id',
    
    // Validação condicional para empresas
    'company_tax_id' => [
        'required_if:company_type,company',
        'lusophone_business_id', // Valida CNPJ (BR), NIF empresarial (PT/AO), etc.
    ],
    
    'trade_license' => [
        'required_if:company_type,company',
        'lusophone_trade_license', // Valida licenças comerciais locais
    ],
];
```

### Validação Bancária

```php
$rules = [
    'iban' => [
        'nullable',
        'lusophone_iban', // Valida IBAN para PT, IBAN-like para outros países
    ],
    
    'bank_account' => [
        'required',
        'lusophone_bank_account', // Formatos de conta bancária locais
    ],
    
    'swift_code' => [
        'nullable', 
        'lusophone_swift', // Códigos SWIFT de bancos lusófonos
    ],
];
```

### Validação de Endereços

```php
$rules = [
    'address' => 'required|string|max:255',
    'city' => 'required|lusophone_city',        // Cidades válidas do país
    'province' => 'required|lusophone_province', // Províncias/estados válidos
    'postal_code' => 'required|lusophone_postal',
    'country' => 'required|lusophone_country',   // Países lusófonos apenas
];
```

## Integração com APIs

### Validação de API REST

```php
// app/Http/Controllers/Api/UserController.php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateUserRequest;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class UserController extends Controller
{
    public function store(CreateUserRequest $request)
    {
        $region = Lusophone::detectRegion();
        
        // Criar utilizador com dados validados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tax_id' => $request->tax_id,
            'phone' => $request->phone,
            'region' => $region,
        ]);
        
        // Retornar resposta localizada
        return response()->json([
            'message' => __('User created successfully'),
            'user' => $user,
            'region_info' => Lusophone::getCountryInfo($region),
        ], 201);
    }
}
```

### Validação GraphQL

```php
// app/GraphQL/Mutations/CreateUser.php
<?php

namespace App\GraphQL\Mutations;

use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreateUser
{
    public function __invoke($rootValue, array $args, GraphQLContext $context)
    {
        // Validar automaticamente baseado na região
        $validator = Validator::make($args, [
            'name' => 'required|string|max:255',
            'tax_id' => 'required|lusophone_tax_id',
            'phone' => 'required|lusophone_phone',
        ]);
        
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        
        return User::create($validator->validated());
    }
}
```

## Testagem de Validações

### Testes Unitários

```php
// tests/Feature/LusophoneValidationTest.php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Illuminate\Support\Facades\Validator;

class LusophoneValidationTest extends TestCase
{
    /** @test */
    public function it_validates_portuguese_nif()
    {
        Lusophone::forceRegion('PT');
        
        // NIF válido português
        $validator = Validator::make(
            ['tax_id' => '123456789'],
            ['tax_id' => 'lusophone_tax_id']
        );
        
        $this->assertFalse($validator->fails());
    }
    
    /** @test */
    public function it_validates_mozambican_nuit()
    {
        Lusophone::forceRegion('MZ');
        
        // NUIT válido moçambicano
        $validator = Validator::make(
            ['tax_id' => '123456789'],
            ['tax_id' => 'lusophone_tax_id']
        );
        
        $this->assertFalse($validator->fails());
    }
    
    /** @test */
    public function it_validates_brazilian_cpf()
    {
        Lusophone::forceRegion('BR');
        
        // CPF válido brasileiro
        $validator = Validator::make(
            ['tax_id' => '11144477735'],
            ['tax_id' => 'lusophone_tax_id']
        );
        
        $this->assertFalse($validator->fails());
    }
    
    /** @test */
    public function it_validates_phone_numbers_by_region()
    {
        $testCases = [
            'PT' => ['phone' => '+351912345678'],
            'BR' => ['phone' => '+5511987654321'],
            'MZ' => ['phone' => '+258823456789'],
            'AO' => ['phone' => '+244912345678'],
        ];
        
        foreach ($testCases as $region => $data) {
            Lusophone::forceRegion($region);
            
            $validator = Validator::make($data, [
                'phone' => 'lusophone_phone'
            ]);
            
            $this->assertFalse($validator->fails(), 
                "Failed validation for {$region} phone: {$data['phone']}"
            );
        }
    }
}
```

### Testes de Integração

```php
// tests/Feature/RegistrationFormTest.php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class RegistrationFormTest extends TestCase
{
    /** @test */
    public function user_can_register_with_valid_mozambican_data()
    {
        Lusophone::forceRegion('MZ');
        
        $response = $this->post('/register', [
            'name' => 'João Silva',
            'email' => 'joao@exemplo.mz',
            'tax_id' => '123456789',        // NUIT válido
            'phone' => '+258823456789',     // Telefone moçambicano
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        
        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('users', [
            'email' => 'joao@exemplo.mz',
            'tax_id' => '123456789',
        ]);
    }
    
    /** @test */
    public function registration_fails_with_invalid_tax_id()
    {
        Lusophone::forceRegion('PT');
        
        $response = $this->post('/register', [
            'name' => 'Maria Santos',
            'email' => 'maria@exemplo.pt',
            'tax_id' => '123',              // NIF inválido (muito curto)
            'phone' => '+351912345678',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);
        
        $response->assertSessionHasErrors(['tax_id']);
        $response->assertSessionHasErrorsIn('default', [
            'tax_id' => 'O NIF deve ser um número válido de 9 dígitos.'
        ]);
    }
}
```

### Teste de Performance

```php
// tests/Performance/ValidationPerformanceTest.php
<?php

namespace Tests\Performance;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Illuminate\Support\Facades\Validator;

class ValidationPerformanceTest extends TestCase
{
    /** @test */
    public function validation_performance_benchmark()
    {
        $regions = ['PT', 'BR', 'MZ', 'AO'];
        $testData = [
            'PT' => ['tax_id' => '123456789'],
            'BR' => ['tax_id' => '11144477735'],
            'MZ' => ['tax_id' => '123456789'],
            'AO' => ['tax_id' => '1234567890'],
        ];
        
        foreach ($regions as $region) {
            Lusophone::forceRegion($region);
            
            $startTime = microtime(true);
            
            // Executar 1000 validações
            for ($i = 0; $i < 1000; $i++) {
                $validator = Validator::make(
                    $testData[$region],
                    ['tax_id' => 'lusophone_tax_id']
                );
                $validator->fails();
            }
            
            $endTime = microtime(true);
            $duration = ($endTime - $startTime) * 1000; // em milissegundos
            
            // Deve ser menor que 100ms para 1000 validações
            $this->assertLessThan(100, $duration, 
                "Validation for {$region} took {$duration}ms for 1000 operations"
            );
        }
    }
}
```

## Debugging de Validações

### Logs de Validação

```php
// config/logging.php
'channels' => [
    'lusophone_validation' => [
        'driver' => 'daily',
        'path' => storage_path('logs/lusophone-validation.log'),
        'level' => env('LOG_LEVEL', 'debug'),
        'days' => 14,
    ],
],
```

```php
// app/Http/Middleware/LogLusophoneValidation.php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class LogLusophoneValidation
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Log tentativas de validação falhadas
        if ($response->getStatusCode() === 422) {
            $region = Lusophone::detectRegion();
            $errors = session('errors') ? session('errors')->toArray() : [];
            
            Log::channel('lusophone_validation')->warning('Validation failed', [
                'region' => $region,
                'errors' => $errors,
                'input' => $request->except(['password', 'password_confirmation']),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }
        
        return $response;
    }
}
```

### Comando de Debug

```bash
# Testar validações específicas
php artisan lusophone:test-validation

# Saída esperada:
# 🧪 Teste de Validações Laravel Lusophone
# 
# ✅ Portugal (PT):
#    NIF: 123456789 → Válido
#    Telefone: +351912345678 → Válido
#    Código Postal: 1000-001 → Válido
# 
# ✅ Brasil (BR):
#    CPF: 11144477735 → Válido
#    Telefone: +5511987654321 → Válido
#    CEP: 01310-100 → Válido
# 
# ✅ Moçambique (MZ):
#    NUIT: 123456789 → Válido
#    Telefone: +258823456789 → Válido
#    Código Postal: 1100 → Válido
```

## Validações Customizadas

### Criar Validação Personalizada

```php
// app/Rules/CustomLusophoneRule.php
<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class ValidLusophoneBusinessLicense implements Rule
{
    protected $region;
    
    public function __construct($region = null)
    {
        $this->region = $region ?: Lusophone::detectRegion();
    }
    
    public function passes($attribute, $value)
    {
        return match ($this->region) {
            'PT' => $this->validatePortugueseLicense($value),
            'BR' => $this->validateBrazilianLicense($value),
            'MZ' => $this->validateMozambicanLicense($value),
            'AO' => $this->validateAngolanLicense($value),
            default => true, // Outros países aceites por padrão
        };
    }
    
    public function message()
    {
        return match ($this->region) {
            'PT' => 'A licença comercial portuguesa deve ter o formato correto.',
            'BR' => 'O CNPJ deve ser válido.',
            'MZ' => 'A licença comercial moçambicana deve ser válida.',
            'AO' => 'O NIF empresarial angolano deve ser válido.',
            default => 'A licença comercial deve ser válida.',
        };
    }
    
    private function validatePortugueseLicense($value)
    {
        // Lógica específica para Portugal
        return preg_match('/^PT\d{9}$/', $value);
    }
    
    private function validateBrazilianLicense($value)
    {
        // Lógica específica para Brasil (CNPJ)
        return $this->validateCNPJ($value);
    }
    
    private function validateMozambicanLicense($value)
    {
        // Lógica específica para Moçambique
        return preg_match('/^MZ\d{8}$/', $value);
    }
    
    private function validateAngolanLicense($value)
    {
        // Lógica específica para Angola
        return preg_match('/^\d{10}$/', $value);
    }
    
    private function validateCNPJ($cnpj)
    {
        // Algoritmo de validação CNPJ
        $cnpj = preg_replace('/\D/', '', $cnpj);
        
        if (strlen($cnpj) != 14) {
            return false;
        }
        
        // Cálculo dos dígitos verificadores
        $soma = 0;
        $multiplicador = 5;
        
        for ($i = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $multiplicador;
            $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
        }
        
        $resto = $soma % 11;
        $dv1 = ($resto < 2) ? 0 : 11 - $resto;
        
        if ($cnpj[12] != $dv1) {
            return false;
        }
        
        $soma = 0;
        $multiplicador = 6;
        
        for ($i = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $multiplicador;
            $multiplicador = ($multiplicador == 2) ? 9 : $multiplicador - 1;
        }
        
        $resto = $soma % 11;
        $dv2 = ($resto < 2) ? 0 : 11 - $resto;
        
        return $cnpj[13] == $dv2;
    }
}
```

### Usar a Validação Personalizada

```php
// app/Http/Requests/BusinessRegistrationRequest.php
use App\Rules\ValidLusophoneBusinessLicense;

public function rules()
{
    return [
        'business_name' => 'required|string|max:255',
        'tax_id' => 'required|lusophone_tax_id',
        'business_license' => ['required', new ValidLusophoneBusinessLicense()],
        'phone' => 'required|lusophone_phone',
    ];
}
```

## Integração Frontend

### Vue.js Component

```vue
<!-- resources/js/components/LusophoneForm.vue -->
<template>
    <form @submit="submitForm">
        <div class="form-group">
            <label :for="taxIdLabel">{{ taxIdLabel }}</label>
            <input 
                v-model="form.tax_id"
                :placeholder="taxIdPlaceholder"
                :class="{ 'is-invalid': errors.tax_id }"
                @input="validateTaxId"
            />
            <div v-if="errors.tax_id" class="invalid-feedback">
                {{ errors.tax_id }}
            </div>
        </div>
        
        <div class="form-group">
            <label :for="phoneLabel">{{ phoneLabel }}</label>
            <input 
                v-model="form.phone"
                :placeholder="phonePlaceholder"
                :class="{ 'is-invalid': errors.phone }"
                @input="validatePhone"
            />
            <div v-if="errors.phone" class="invalid-feedback">
                {{ errors.phone }}
            </div>
        </div>
        
        <button type="submit" :disabled="!isFormValid">
            {{ submitText }}
        </button>
    </form>
</template>

<script>
export default {
    name: 'LusophoneForm',
    
    data() {
        return {
            region: 'MZ', // Será definido pelo backend
            form: {
                tax_id: '',
                phone: '',
            },
            errors: {},
        }
    },
    
    computed: {
        taxIdLabel() {
            const labels = {
                'PT': 'NIF',
                'BR': 'CPF', 
                'MZ': 'NUIT',
                'AO': 'NIF',
                'CV': 'NIF',
            };
            return labels[this.region] || 'Documento Fiscal';
        },
        
        taxIdPlaceholder() {
            const placeholders = {
                'PT': '123456789',
                'BR': '123.456.789-00',
                'MZ': '123456789',
                'AO': '1234567890',
            };
            return placeholders[this.region] || '123456789';
        },
        
        phoneLabel() {
            const labels = {
                'PT': 'Telemóvel',
                'BR': 'Telefone',
                'MZ': 'Celular',
                'AO': 'Telefone',
            };
            return labels[this.region] || 'Telefone';
        },
        
        phonePlaceholder() {
            const placeholders = {
                'PT': '+351912345678',
                'BR': '+5511987654321',
                'MZ': '+258823456789',
                'AO': '+244912345678',
            };
            return placeholders[this.region] || '+258XXXXXXXXX';
        },
        
        submitText() {
            return 'Registar';
        },
        
        isFormValid() {
            return this.form.tax_id && this.form.phone && 
                   Object.keys(this.errors).length === 0;
        }
    },
    
    methods: {
        validateTaxId() {
            // Validação no frontend para feedback imediato
            const value = this.form.tax_id;
            
            if (!value) {
                this.$set(this.errors, 'tax_id', `${this.taxIdLabel} é obrigatório`);
                return;
            }
            
            // Validações específicas por país
            let isValid = false;
            
            switch (this.region) {
                case 'PT':
                case 'MZ':
                case 'CV':
                    isValid = /^\d{9}$/.test(value);
                    break;
                case 'BR':
                    isValid = this.validateCPF(value);
                    break;
                case 'AO':
                    isValid = /^\d{10}$/.test(value);
                    break;
            }
            
            if (isValid) {
                this.$delete(this.errors, 'tax_id');
            } else {
                this.$set(this.errors, 'tax_id', 
                    `${this.taxIdLabel} inválido`);
            }
        },
        
        validatePhone() {
            const value = this.form.phone;
            
            if (!value) {
                this.$set(this.errors, 'phone', 
                    `${this.phoneLabel} é obrigatório`);
                return;
            }
            
            // Validação básica de formato
            const phoneRegex = /^\+?\d{8,15}$/;
            
            if (phoneRegex.test(value.replace(/\s/g, ''))) {
                this.$delete(this.errors, 'phone');
            } else {
                this.$set(this.errors, 'phone', 
                    `${this.phoneLabel} inválido`);
            }
        },
        
        validateCPF(cpf) {
            // Implementação simplificada da validação CPF
            cpf = cpf.replace(/\D/g, '');
            
            if (cpf.length !== 11) return false;
            
            // Verificação dos dígitos
            let soma = 0;
            for (let i = 0; i < 9; i++) {
                soma += parseInt(cpf.charAt(i)) * (10 - i);
            }
            
            let resto = 11 - (soma % 11);
            let digito1 = resto > 9 ? 0 : resto;
            
            if (parseInt(cpf.charAt(9)) !== digito1) return false;
            
            soma = 0;
            for (let i = 0; i < 10; i++) {
                soma += parseInt(cpf.charAt(i)) * (11 - i);
            }
            
            resto = 11 - (soma % 11);
            let digito2 = resto > 9 ? 0 : resto;
            
            return parseInt(cpf.charAt(10)) === digito2;
        },
        
        async submitForm(event) {
            event.preventDefault();
            
            // Validar todos os campos antes do envio
            this.validateTaxId();
            this.validatePhone();
            
            if (!this.isFormValid) {
                return;
            }
            
            try {
                const response = await axios.post('/api/register', {
                    ...this.form,
                    region: this.region,
                });
                
                // Sucesso
                this.$emit('success', response.data);
                
            } catch (error) {
                if (error.response?.status === 422) {
                    // Erros de validação do backend
                    this.errors = error.response.data.errors;
                } else {
                    // Outros erros
                    console.error('Erro ao registar:', error);
                }
            }
        }
    },
    
    mounted() {
        // Obter região do backend
        this.region = window.Laravel?.region || 'MZ';
    }
}
</script>
```

### React Component

```jsx
// resources/js/components/LusophoneForm.jsx
import React, { useState, useEffect } from 'react';
import axios from 'axios';

const LusophoneForm = () => {
    const [region, setRegion] = useState('MZ');
    const [form, setForm] = useState({
        tax_id: '',
        phone: '',
    });
    const [errors, setErrors] = useState({});
    
    const regionConfig = {
        PT: {
            taxIdLabel: 'NIF',
            taxIdPlaceholder: '123456789',
            phoneLabel: 'Telemóvel',
            phonePlaceholder: '+351912345678',
        },
        BR: {
            taxIdLabel: 'CPF',
            taxIdPlaceholder: '123.456.789-00',
            phoneLabel: 'Telefone',
            phonePlaceholder: '+5511987654321',
        },
        MZ: {
            taxIdLabel: 'NUIT',
            taxIdPlaceholder: '123456789',
            phoneLabel: 'Celular',
            phonePlaceholder: '+258823456789',
        },
        AO: {
            taxIdLabel: 'NIF',
            taxIdPlaceholder: '1234567890',
            phoneLabel: 'Telefone',
            phonePlaceholder: '+244912345678',
        },
    };
    
    const config = regionConfig[region] || regionConfig.MZ;
    
    const validateTaxId = (value) => {
        if (!value) {
            return `${config.taxIdLabel} é obrigatório`;
        }
        
        let isValid = false;
        
        switch (region) {
            case 'PT':
            case 'MZ':
            case 'CV':
                isValid = /^\d{9}$/.test(value);
                break;
            case 'BR':
                isValid = validateCPF(value);
                break;
            case 'AO':
                isValid = /^\d{10}$/.test(value);
                break;
        }
        
        return isValid ? null : `${config.taxIdLabel} inválido`;
    };
    
    const validatePhone = (value) => {
        if (!value) {
            return `${config.phoneLabel} é obrigatório`;
        }
        
        const phoneRegex = /^\+?\d{8,15}$/;
        
        return phoneRegex.test(value.replace(/\s/g, '')) 
            ? null 
            : `${config.phoneLabel} inválido`;
    };
    
    const validateCPF = (cpf) => {
        cpf = cpf.replace(/\D/g, '');
        
        if (cpf.length !== 11) return false;
        
        // Implementação simplificada
        let soma = 0;
        for (let i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        
        let resto = 11 - (soma % 11);
        let digito1 = resto > 9 ? 0 : resto;
        
        if (parseInt(cpf.charAt(9)) !== digito1) return false;
        
        soma = 0;
        for (let i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        
        resto = 11 - (soma % 11);
        let digito2 = resto > 9 ? 0 : resto;
        
        return parseInt(cpf.charAt(10)) === digito2;
    };
    
    const handleInputChange = (field, value) => {
        setForm(prev => ({ ...prev, [field]: value }));
        
        // Validação em tempo real
        let error = null;
        
        if (field === 'tax_id') {
            error = validateTaxId(value);
        } else if (field === 'phone') {
            error = validatePhone(value);
        }
        
        setErrors(prev => ({
            ...prev,
            [field]: error
        }));
    };
    
    const handleSubmit = async (e) => {
        e.preventDefault();
        
        // Validar todos os campos
        const taxIdError = validateTaxId(form.tax_id);
        const phoneError = validatePhone(form.phone);
        
        const newErrors = {
            tax_id: taxIdError,
            phone: phoneError,
        };
        
        // Remover erros null
        Object.keys(newErrors).forEach(key => {
            if (newErrors[key] === null) {
                delete newErrors[key];
            }
        });
        
        setErrors(newErrors);
        
        if (Object.keys(newErrors).length > 0) {
            return;
        }
        
        try {
            const response = await axios.post('/api/register', {
                ...form,
                region,
            });
            
            console.log('Sucesso:', response.data);
            
        } catch (error) {
            if (error.response?.status === 422) {
                setErrors(error.response.data.errors);
            } else {
                console.error('Erro:', error);
            }
        }
    };
    
    useEffect(() => {
        // Obter região do backend
        const detectedRegion = window.Laravel?.region || 'MZ';
        setRegion(detectedRegion);
    }, []);
    
    const isFormValid = form.tax_id && form.phone && 
                       Object.keys(errors).length === 0;
    
    return (
        <form onSubmit={handleSubmit} className="lusophone-form">
            <div className="form-group">
                <label htmlFor="tax_id">{config.taxIdLabel}</label>
                <input
                    type="text"
                    id="tax_id"
                    value={form.tax_id}
                    placeholder={config.taxIdPlaceholder}
                    onChange={(e) => handleInputChange('tax_id', e.target.value)}
                    className={errors.tax_id ? 'is-invalid' : ''}
                />
                {errors.tax_id && (
                    <div className="invalid-feedback">
                        {errors.tax_id}
                    </div>
                )}
            </div>
            
            <div className="form-group">
                <label htmlFor="phone">{config.phoneLabel}</label>
                <input
                    type="tel"
                    id="phone"
                    value={form.phone}
                    placeholder={config.phonePlaceholder}
                    onChange={(e) => handleInputChange('phone', e.target.value)}
                    className={errors.phone ? 'is-invalid' : ''}
                />
                {errors.phone && (
                    <div className="invalid-feedback">
                        {errors.phone}
                    </div>
                )}
            </div>
            
            <button 
                type="submit" 
                disabled={!isFormValid}
                className="btn btn-primary"
            >
                Registar
            </button>
        </form>
    );
};

export default LusophoneForm;
```

## Próximos Passos

Agora que domina as validações universais do Laravel Lusophone:

1. **[Aprenda sobre formatação de moedas e números](formatting.md)**
2. **[Explore o sistema de traduções](translations.md)**
3. **[Configure detecção de região](detection.md)**
4. **[Personalize para seu caso de uso](customization.md)**
5. **[Implemente em produção](deployment.md)**

---

**Validação concluída! ✅ As suas aplicações agora validam dados corretamente em todos os países lusófonos automaticamente.**
