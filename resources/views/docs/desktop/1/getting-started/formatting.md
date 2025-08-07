---
title: Formatação 
order: 006
---
# Formatação de Moedas e Números

## Introdução

O Laravel Lusophone oferece formatação automática e inteligente de valores monetários, números, datas e outros formatos locais baseados na região detectada do utilizador. Cada país lusófono tem suas próprias convenções de formatação que são aplicadas automaticamente.

## Formatação de Moedas

### Formatação Automática

A formatação de moeda é feita automaticamente baseada na região detectada:

```php
use Illuminate\Support\Str;

// Formata automaticamente baseado na região do utilizador
$valor = 1500.50;

echo Str::lusophoneCurrency($valor);
// Resultados automáticos por país:
// 🇵🇹 Portugal: "1.500,50 €"
// 🇧🇷 Brasil: "R$ 1.500,50"
// 🇲🇿 Moçambique: "1.500,50 MT"  
// 🇦🇴 Angola: "1.500,50 Kz"
// 🇨🇻 Cabo Verde: "1.500,50 Esc"
```

### Formatação por Região Específica

```php
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

// Forçar formatação para região específica
$valor = 1500.50;

echo Lusophone::formatCurrency($valor, 'PT');  // "1.500,50 €"
echo Lusophone::formatCurrency($valor, 'BR');  // "R$ 1.500,50"
echo Lusophone::formatCurrency($valor, 'MZ');  // "1.500,50 MT"
echo Lusophone::formatCurrency($valor, 'AO');  // "1.500,50 Kz"
```

### Opções de Formatação Avançada

```php
// Opções personalizadas
$opcoes = [
    'show_symbol' => true,      // Mostrar símbolo da moeda
    'show_code' => false,       // Mostrar código da moeda (USD, EUR, etc.)
    'decimals' => 2,           // Número de casas decimais
    'use_accounting' => false,  // Formato contabilístico
];

echo Lusophone::formatCurrency($valor, 'MZ', $opcoes);
// "1.500,50 MT"

$opcoes['show_code'] = true;
$opcoes['show_symbol'] = false;
echo Lusophone::formatCurrency($valor, 'MZ', $opcoes);
// "1.500,50 MZN"
```

## Formatação de Números

### Números Decimais

```php
use Illuminate\Support\Str;

$numero = 1234.56;

// Formatação automática baseada na região
echo Str::lusophoneNumber($numero);
// 🇵🇹 Portugal: "1.234,56"
// 🇧🇷 Brasil: "1.234,56"
// 🇲🇿 Moçambique: "1.234,56"

// Formatação específica por região
echo Lusophone::formatNumber($numero, 'PT');  // "1 234,56" (espaço como separador)
echo Lusophone::formatNumber($numero, 'BR');  // "1.234,56" (ponto como separador)
echo Lusophone::formatNumber($numero, 'MZ');  // "1.234,56"
```

### Percentuais

```php
$percentual = 0.1532; // 15.32%

echo Lusophone::formatPercentage($percentual);
// Região PT: "15,32%"
// Região BR: "15,32%"
// Região MZ: "15,32%"

// Com precisão personalizada
echo Lusophone::formatPercentage($percentual, 1);
// "15,3%"
```

### Números Grandes

```php
$numeroGrande = 1234567.89;

echo Lusophone::formatNumber($numeroGrande);
// 🇵🇹 Portugal: "1 234 567,89"
// 🇧🇷 Brasil: "1.234.567,89"
// 🇲🇿 Moçambique: "1.234.567,89"
```

## Configurações por País

### Portugal
```php
// Formatação portuguesa
$config = [
    'currency_symbol' => '€',
    'currency_code' => 'EUR',
    'currency_position' => 'after',        // 1.500,50 €
    'decimal_separator' => ',',
    'thousands_separator' => ' ',          // Espaço
    'decimals' => 2,
];

echo Lusophone::formatCurrency(1500.50, 'PT');
// "1 500,50 €"
```

### Brasil
```php
// Formatação brasileira
$config = [
    'currency_symbol' => 'R$',
    'currency_code' => 'BRL',
    'currency_position' => 'before',       // R$ 1.500,50
    'decimal_separator' => ',',
    'thousands_separator' => '.',
    'decimals' => 2,
];

echo Lusophone::formatCurrency(1500.50, 'BR');
// "R$ 1.500,50"
```

### Moçambique
```php
// Formatação moçambicana
$config = [
    'currency_symbol' => 'MT',
    'currency_code' => 'MZN',
    'currency_position' => 'after',        // 1.500,50 MT
    'decimal_separator' => ',',
    'thousands_separator' => '.',
    'decimals' => 2,
];

echo Lusophone::formatCurrency(1500.50, 'MZ');
// "1.500,50 MT"
```

### Angola
```php
// Formatação angolana
$config = [
    'currency_symbol' => 'Kz',
    'currency_code' => 'AOA',
    'currency_position' => 'after',        // 1.500,50 Kz
    'decimal_separator' => ',',
    'thousands_separator' => '.',
    'decimals' => 2,
];

echo Lusophone::formatCurrency(1500.50, 'AO');
// "1.500,50 Kz"
```

## Formatação de Datas

### Formatos Automáticos

```php
use Carbon\Carbon;

$data = Carbon::parse('2024-12-25 15:30:00');

// Formatação automática por região
echo Lusophone::formatDate($data);
// 🇵🇹 Portugal: "25-12-2024"
// 🇧🇷 Brasil: "25/12/2024"
// 🇲🇿 Moçambique: "25/12/2024"
// 🇦🇴 Angola: "25/12/2024"

echo Lusophone::formatDateTime($data);
// 🇵🇹 Portugal: "25-12-2024 15:30"
// 🇧🇷 Brasil: "25/12/2024 15:30"
// 🇲🇿 Moçambique: "25/12/2024 15:30"
```

### Formatos Personalizados

```php
// Data por extenso
echo Lusophone::formatDateLong($data);
// 🇵🇹 Portugal: "25 de Dezembro de 2024"
// 🇧🇷 Brasil: "25 de dezembro de 2024"
// 🇲🇿 Moçambique: "25 de Dezembro de 2024"

// Data relativa
echo Lusophone::formatDateRelative($data);
// "há 2 dias", "amanhã", "na próxima semana"
```

## Macros do Laravel

O Laravel Lusophone adiciona macros úteis ao Str e Collection:

### String Macros

```php
use Illuminate\Support\Str;

// Formatação de moeda
echo Str::lusophoneCurrency(1500.50);        // "1.500,50 MT" (baseado na região)

// Formatação de número
echo Str::lusophoneNumber(1234.56);          // "1.234,56"

// Formatação de percentual
echo Str::lusophonePercentage(0.1532);       // "15,32%"

// Telefone formatado
echo Str::lusophonePhone('+258823456789');   // "+258 82 345 6789"

// Documento fiscal formatado
echo Str::lusophoneTaxId('123456789');       // "123 456 789" (NUIT/NIF)
```

### Collection Macros

```php
// Listar países lusófonos
$paises = collect()->lusophoneCountries();
// [
//     'PT' => 'Portugal',
//     'BR' => 'Brasil',
//     'MZ' => 'Moçambique',
//     'AO' => 'Angola',
//     // ...
// ]

// Informações de moedas
$moedas = collect()->lusophoneCurrencies();
// [
//     'PT' => ['symbol' => '€', 'code' => 'EUR', 'name' => 'Euro'],
//     'BR' => ['symbol' => 'R, 'code' => 'BRL', 'name' => 'Real'],
//     'MZ' => ['symbol' => 'MT', 'code' => 'MZN', 'name' => 'Metical'],
//     // ...
// ]
```

## Blade Directives

### Directivas Personalizadas

```blade
{{-- Formatação de moeda --}}
@currency(1500.50)
{{-- Resultado: "1.500,50 MT" (baseado na região detectada) --}}

@currency(1500.50, 'PT')
{{-- Resultado: "1 500,50 €" --}}

{{-- Formatação de número --}}
@number(1234.56)
{{-- Resultado: "1.234,56" --}}

{{-- Formatação de data --}}
@lusophoneDate($produto->created_at)
{{-- Resultado: "25/12/2024" --}}

{{-- Campo formatado --}}
@field('tax_id', '123456789')
{{-- Resultado: "NUIT: 123456789" (MZ), "NIF: 123456789" (PT) --}}
```

### Exemplos Práticos em Views

```blade
{{-- resources/views/products/show.blade.php --}}
<div class="product-card">
    <h3>{{ $produto->nome }}</h3>
    
    <div class="price">
        @currency($produto->preco)
    </div>
    
    <div class="details">
        <p><strong>SKU:</strong> {{ $produto->sku }}</p>
        <p><strong>Stock:</strong> @number($produto->stock) unidades</p>
        <p><strong>Desconto:</strong> @percentage($produto->desconto)</p>
        <p><strong>Data:</strong> @lusophoneDate($produto->created_at)</p>
    </div>
</div>
```

```blade
{{-- resources/views/invoices/show.blade.php --}}
<div class="invoice">
    <h2>Factura #{{ $factura->numero }}</h2>
    
    <div class="client-info">
        <p><strong>Cliente:</strong> {{ $factura->cliente->nome }}</p>
        <p><strong>@field('tax_id'):</strong> {{ $factura->cliente->documento_fiscal }}</p>
        <p><strong>@field('phone'):</strong> @phone($factura->cliente->telefone)</p>
    </div>
    
    <table class="items">
        @foreach($factura->itens as $item)
        <tr>
            <td>{{ $item->descricao }}</td>
            <td>@number($item->quantidade)</td>
            <td>@currency($item->preco_unitario)</td>
            <td>@currency($item->total)</td>
        </tr>
        @endforeach
    </table>
    
    <div class="total">
        <strong>Total: @currency($factura->total)</strong>
    </div>
    
    <div class="date">
        Emitida em @lusophoneDate($factura->data_emissao)
    </div>
</div>
```

## Formatação Condicional

### Baseada na Região

```php
// Formatação condicional baseada na região detectada
$valor = 1500.50;
$regiao = Lusophone::detectRegion();

$formatado = match ($regiao) {
    'PT' => Lusophone::formatCurrency($valor, 'PT'),      // "1 500,50 €"
    'BR' => Lusophone::formatCurrency($valor, 'BR'),      // "R$ 1.500,50"
    'MZ' => Lusophone::formatCurrency($valor, 'MZ'),      // "1.500,50 MT"
    'AO' => Lusophone::formatCurrency($valor, 'AO'),      // "1.500,50 Kz"
    default => Lusophone::formatCurrency($valor, 'MZ'),   // Padrão Moçambique
};
```

### Formatação Multi-moeda

```php
// Para e-commerce que aceita múltiplas moedas
class Produto extends Model
{
    protected $fillable = ['nome', 'preco_mzn', 'preco_usd', 'preco_eur'];
    
    public function getPrecoFormatadoAttribute()
    {
        $regiao = Lusophone::detectRegion();
        
        return match ($regiao) {
            'PT' => $this->preco_eur ? 
                Lusophone::formatCurrency($this->preco_eur, 'PT') : 
                'Preço não disponível',
                
            'MZ' => Lusophone::formatCurrency($this->preco_mzn, 'MZ'),
            
            default => $this->preco_usd ? 
                ' . number_format($this->preco_usd, 2) : 
                'Preço não disponível',
        };
    }
}
```

## Formatação para APIs

### Resposta JSON Localizada

```php
// app/Http/Controllers/Api/ProdutoController.php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class ProdutoController extends Controller
{
    public function show(Produto $produto)
    {
        $regiao = Lusophone::detectRegion();
        $info_regiao = Lusophone::getCountryInfo($regiao);
        
        return response()->json([
            'produto' => [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => [
                    'raw' => $produto->preco,
                    'formatted' => Lusophone::formatCurrency($produto->preco, $regiao),
                    'currency' => $info_regiao['currency'],
                ],
                'stock' => [
                    'raw' => $produto->stock,
                    'formatted' => Lusophone::formatNumber($produto->stock, $regiao),
                ],
                'created_at' => [
                    'raw' => $produto->created_at->toISOString(),
                    'formatted' => Lusophone::formatDate($produto->created_at, $regiao),
                    'relative' => Lusophone::formatDateRelative($produto->created_at, $regiao),
                ],
            ],
            'region_info' => $info_regiao,
        ]);
    }
}
```

### Resource Classes Localizadas

```php
// app/Http/Resources/ProdutoResource.php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class ProdutoResource extends JsonResource
{
    public function toArray($request)
    {
        $regiao = Lusophone::detectRegion();
        
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            
            'preco' => [
                'valor' => $this->preco,
                'formatado' => Lusophone::formatCurrency($this->preco, $regiao),
                'moeda' => Lusophone::getCurrencyInfo($regiao),
            ],
            
            'dimensoes' => [
                'peso' => Lusophone::formatNumber($this->peso, $regiao) . ' kg',
                'comprimento' => Lusophone::formatNumber($this->comprimento, $regiao) . ' cm',
            ],
            
            'datas' => [
                'criado' => Lusophone::formatDateTime($this->created_at, $regiao),
                'atualizado' => Lusophone::formatDateTime($this->updated_at, $regiao),
            ],
        ];
    }
}
```

## Formatação Personalizada

### Criar Formatadores Customizados

```php
// app/Services/CustomLusophoneFormatter.php
<?php

namespace App\Services;

use ArnaldoTomo\LaravelLusophone\Services\BaseFormatter;

class CustomLusophoneFormatter extends BaseFormatter
{
    /**
     * Formatação personalizada para relatórios empresariais
     */
    public function formatBusinessCurrency($amount, $region = null)
    {
        $region = $region ?: $this->detectRegion();
        $formatted = $this->formatCurrency($amount, $region);
        
        // Adicionar contexto empresarial
        return match ($region) {
            'PT' => $formatted . ' (IVA incluído)',
            'BR' => $formatted . ' (impostos incluídos)',
            'MZ' => $formatted . ' (IVA incluído)',
            'AO' => $formatted . ' (impostos incluídos)',
            default => $formatted,
        };
    }
    
    /**
     * Formatação de quantidade com unidades locais
     */
    public function formatQuantityWithUnit($quantity, $unit, $region = null)
    {
        $region = $region ?: $this->detectRegion();
        $formattedQuantity = $this->formatNumber($quantity, $region);
        
        // Adaptar unidades por região
        $units = [
            'kg' => [
                'PT' => 'kg',
                'BR' => 'kg', 
                'MZ' => 'kg',
                'AO' => 'kg',
            ],
            'litre' => [
                'PT' => 'litros',
                'BR' => 'litros',
                'MZ' => 'litros', 
                'AO' => 'litros',
            ],
            'meter' => [
                'PT' => 'metros',
                'BR' => 'metros',
                'MZ' => 'metros',
                'AO' => 'metros',
            ],
        ];
        
        $localUnit = $units[$unit][$region] ?? $unit;
        
        return $formattedQuantity . ' ' . $localUnit;
    }
}
```

### Registrar Formatadores Personalizados

```php
// app/Providers/AppServiceProvider.php
use App\Services\CustomLusophoneFormatter;

public function register()
{
    $this->app->singleton('custom.lusophone.formatter', function ($app) {
        return new CustomLusophoneFormatter();
    });
}

public function boot()
{
    // Adicionar macro personalizada
    Str::macro('businessCurrency', function ($amount, $region = null) {
        return app('custom.lusophone.formatter')->formatBusinessCurrency($amount, $region);
    });
    
    Str::macro('quantityWithUnit', function ($quantity, $unit, $region = null) {
        return app('custom.lusophone.formatter')->formatQuantityWithUnit($quantity, $unit, $region);
    });
}
```

### Usar Formatadores Personalizados

```php
use Illuminate\Support\Str;

// Usar as macros personalizadas
echo Str::businessCurrency(1500.50);           // "1.500,50 MT (IVA incluído)"
echo Str::quantityWithUnit(25, 'kg');          // "25 kg"
echo Str::quantityWithUnit(100.5, 'litre');    // "100,5 litros"
```

## Formatação para Relatórios

### Relatórios Financeiros

```php
// app/Services/FinancialReportService.php
<?php

namespace App\Services;

use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Carbon\Carbon;

class FinancialReportService
{
    public function generateMonthlyReport($month, $year)
    {
        $region = Lusophone::detectRegion();
        $vendas = $this->getVendasMensais($month, $year);
        
        $relatorio = [
            'titulo' => $this->getTituloRelatorio($month, $year, $region),
            'periodo' => $this->formatarPeriodo($month, $year, $region),
            'resumo' => [
                'total_vendas' => Lusophone::formatCurrency($vendas->sum('total'), $region),
                'ticket_medio' => Lusophone::formatCurrency($vendas->avg('total'), $region),
                'num_transacoes' => Lusophone::formatNumber($vendas->count(), $region),
            ],
            'detalhes' => $vendas->map(function ($venda) use ($region) {
                return [
                    'data' => Lusophone::formatDate($venda->created_at, $region),
                    'valor' => Lusophone::formatCurrency($venda->total, $region),
                    'cliente' => $venda->cliente->nome,
                    'documento_fiscal' => $venda->cliente->documento_fiscal,
                ];
            }),
        ];
        
        return $relatorio;
    }
    
    private function getTituloRelatorio($month, $year, $region)
    {
        $meses = [
            'PT' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                     'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'BR' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                     'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'MZ' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                     'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        ];
        
        $nomesMeses = $meses[$region] ?? $meses['MZ'];
        $nomeMes = $nomesMeses[$month - 1];
        
        return "Relatório de Vendas - {$nomeMes} {$year}";
    }
    
    private function formatarPeriodo($month, $year, $region)
    {
        $inicio = Carbon::createFromDate($year, $month, 1);
        $fim = $inicio->copy()->endOfMonth();
        
        return Lusophone::formatDate($inicio, $region) . ' a ' . 
               Lusophone::formatDate($fim, $region);
    }
}
```

### Export para Excel Localizado

```php
// app/Exports/VendasExport.php
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class VendasExport implements FromCollection, WithHeadings, WithMapping
{
    protected $region;
    
    public function __construct()
    {
        $this->region = Lusophone::detectRegion();
    }
    
    public function collection()
    {
        return Venda::with('cliente')->get();
    }
    
    public function headings(): array
    {
        $headings = [
            'PT' => ['Data', 'Cliente', 'NIF', 'Valor', 'Estado'],
            'BR' => ['Data', 'Cliente', 'CPF', 'Valor', 'Status'],
            'MZ' => ['Data', 'Cliente', 'NUIT', 'Valor', 'Estado'],
            'AO' => ['Data', 'Cliente', 'NIF', 'Valor', 'Estado'],
        ];
        
        return $headings[$this->region] ?? $headings['MZ'];
    }
    
    public function map($venda): array
    {
        return [
            Lusophone::formatDate($venda->created_at, $this->region),
            $venda->cliente->nome,
            $venda->cliente->documento_fiscal,
            Lusophone::formatCurrency($venda->total, $this->region),
            $this->formatarEstado($venda->estado),
        ];
    }
    
    private function formatarEstado($estado)
    {
        $estados = [
            'PT' => [
                'pending' => 'Pendente',
                'paid' => 'Pago',
                'cancelled' => 'Cancelado',
            ],
            'BR' => [
                'pending' => 'Pendente', 
                'paid' => 'Pago',
                'cancelled' => 'Cancelado',
            ],
            'MZ' => [
                'pending' => 'Pendente',
                'paid' => 'Pago', 
                'cancelled' => 'Cancelado',
            ],
        ];
        
        $estadosRegiao = $estados[$this->region] ?? $estados['MZ'];
        
        return $estadosRegiao[$estado] ?? $estado;
    }
}
```

## Testes de Formatação

### Testes Unitários

```php
// tests/Unit/LusophoneFormattingTest.php
<?php

namespace Tests\Unit;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;
use Illuminate\Support\Str;

class LusophoneFormattingTest extends TestCase
{
    /** @test */
    public function it_formats_currency_for_different_regions()
    {
        $testCases = [
            'PT' => ['input' => 1500.50, 'expected' => '1 500,50 €'],
            'BR' => ['input' => 1500.50, 'expected' => 'R$ 1.500,50'],
            'MZ' => ['input' => 1500.50, 'expected' => '1.500,50 MT'],
            'AO' => ['input' => 1500.50, 'expected' => '1.500,50 Kz'],
        ];
        
        foreach ($testCases as $region => $case) {
            $formatted = Lusophone::formatCurrency($case['input'], $region);
            $this->assertEquals($case['expected'], $formatted, 
                "Failed formatting currency for region {$region}");
        }
    }
    
    /** @test */
    public function it_formats_numbers_correctly()
    {
        $number = 1234.56;
        
        $this->assertEquals('1.234,56', Lusophone::formatNumber($number, 'MZ'));
        $this->assertEquals('1 234,56', Lusophone::formatNumber($number, 'PT'));
        $this->assertEquals('1.234,56', Lusophone::formatNumber($number, 'BR'));
    }
    
    /** @test */
    public function str_macros_work_correctly()
    {
        Lusophone::forceRegion('MZ');
        
        $this->assertEquals('1.500,50 MT', Str::lusophoneCurrency(1500.50));
        $this->assertEquals('1.234,56', Str::lusophoneNumber(1234.56));
        $this->assertEquals('15,32%', Str::lusophonePercentage(0.1532));
    }
    
    /** @test */
    public function it_handles_edge_cases()
    {
        // Valores zero
        $this->assertEquals('0,00 MT', Lusophone::formatCurrency(0, 'MZ'));
        
        // Valores negativos
        $this->assertEquals('-1.500,50 MT', Lusophone::formatCurrency(-1500.50, 'MZ'));
        
        // Valores muito grandes
        $this->assertEquals('1.000.000,00 MT', 
            Lusophone::formatCurrency(1000000, 'MZ'));
    }
}
```

### Testes de Integração

```php
// tests/Feature/FormattingIntegrationTest.php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use ArnaldoTomo\LaravelLusophone\Facades\Lusophone;

class FormattingIntegrationTest extends TestCase
{
    /** @test */
    public function blade_directives_work_in_views()
    {
        Lusophone::forceRegion('MZ');
        
        $view = view('test-formatting', ['valor' => 1500.50]);
        
        $rendered = $view->render();
        
        $this->assertStringContains('1.500,50 MT', $rendered);
    }
    
    /** @test */
    public function api_returns_formatted_values()
    {
        Lusophone::forceRegion('PT');
        
        $response = $this->getJson('/api/produtos/1');
        
        $response->assertStatus(200)
                 ->assertJsonPath('produto.preco.formatted', '1 500,50 €');
    }
}
```

## Próximos Passos

Agora que domina a formatação no Laravel Lusophone:

1. **[Explore o sistema de traduções](translations.md)**
2. **[Configure detecção avançada de região](detection.md)**
3. **[Personalize comportamentos](customization.md)**
4. **[Prepare para produção](deployment.md)**
5. **[Integre com sistemas externos](integrations.md)**

---

**Formatação concluída! 💰 Os seus valores estão agora perfeitamente formatados para qualquer país lusófono.**
