---
title: Introdução
order: 001
---
# A Biblioteca de Localização Portuguesa Mais Completa para Laravel

**Laravel Lusophone** é a primeira biblioteca Laravel verdadeiramente abrangente para localização portuguesa, desenvolvida especificamente para atender às necessidades únicas de todos os países de língua portuguesa.

## O Que É?

O Laravel Lusophone é muito mais do que uma simples tradução. É uma solução completa de localização que:

- **Detecta automaticamente** o país do utilizador através de IP, headers HTTP e preferências de idioma
- **Adapta culturalmente** toda a aplicação ao contexto local específico
- **Valida documentos** nativos de cada país (NIF, NUIT, CPF, etc.)
- **Formata valores** (moeda, números, datas) de acordo com padrões locais
- **Traduz automaticamente** todo o texto da aplicação para português regional

## Por Que Foi Criado?

### Problema Original
Desenvolver aplicações Laravel para países lusófonos sempre foi um desafio:

❌ **Traduções Incompletas**: Apenas validações básicas traduzidas
❌ **Contexto Cultural Incorreto**: Usar "telemóvel" no Brasil, "correio electrónico" em Moçambique
❌ **Validações Múltiplas**: Precisar de regras diferentes para NIF-PT, CPF-BR, NUIT-MZ
❌ **Formatação Manual**: Ter que formatar moedas e números manualmente para cada país
❌ **Configuração Complexa**: Setup complicado e propenso a erros

### Solução Laravel Lusophone
✅ **Tradução Automática Universal**: Traduz automaticamente TODO o texto da aplicação
✅ **Contexto Cultural Automático**: Usa terminologia apropriada para cada país
✅ **Validação Universal**: Uma regra (`lusophone_tax_id`) funciona em todos os países
✅ **Formatação Inteligente**: Formata valores automaticamente baseado na localização
✅ **Zero Configuração**: Funciona imediatamente após `composer require`

## Países Suportados

| País | Código | População | Moeda | Validação Principal |
|------|--------|-----------|-------|-------------------|
| 🇧🇷 Brasil | BR | 215M | BRL (R$) | CPF |
| 🇵🇹 Portugal | PT | 10M | EUR (€) | NIF |
| 🇲🇿 Moçambique | MZ | 32M | MZN (MT) | NUIT |
| 🇦🇴 Angola | AO | 35M | AOA (Kz) | NIF |
| 🇨🇻 Cabo Verde | CV | 550K | CVE (Esc) | NIF |
| 🇬🇼 Guiné-Bissau | GW | 2M | XOF (CFA) | NIF |
| 🇸🇹 São Tomé | ST | 220K | STN (Db) | NIF |
| 🇹🇱 Timor-Leste | TL | 1.3M | USD ($) | ID |

**Total: 260+ milhões de falantes de português no mundo**

## Características Únicas

### 🧠 Inteligência Cultural
```php
// Moçambique (contexto misto PT/BR)
__('Phone') // → "Celular" (influência brasileira)
__('Email') // → "Email" (moderno, não "correio electrónico")

// Portugal (contexto formal europeu)  
__('Phone') // → "Telemóvel"
__('Email') // → "Correio electrónico"

// Brasil (contexto informal)
__('Phone') // → "Telefone" ou "Celular"
__('Email') // → "E-mail"
```

### 🔄 Sistema de Tradução Universal
Intercepta TODAS as chamadas `__()` do Laravel e traduz automaticamente:

```php
// Laravel padrão (inglês)
{{ __("You're logged in!") }}
{{ __("Welcome back") }}
{{ __("Save changes") }}

// Tradução automática (sem configuração adicional)
// → "Está conectado!" (MZ/BR)  
// → "Bem-vindo de volta"
// → "Guardar alterações" (PT) / "Salvar alterações" (BR/MZ)
```

### ⚡ Validação Inteligente
Uma única regra funciona universalmente:

```php
$rules = [
    'tax_id' => 'required|lusophone_tax_id',
    'phone' => 'required|lusophone_phone', 
    'postal' => 'nullable|lusophone_postal'
];

// Resultado automático por país:
// 🇵🇹 Portugal: Valida NIF (9 dígitos + algoritmo)
// 🇧🇷 Brasil: Valida CPF (11 dígitos + algoritmo)  
// 🇲🇿 Moçambique: Valida NUIT (9 dígitos)
// 🇦🇴 Angola: Valida NIF (10 dígitos)
```

## O Que Faz o Laravel Lusophone Único?

### 1. **Desenvolvido em Moçambique** 🇲🇿
- Perspectiva africana na tecnologia lusófona
- Compreensão real dos desafios locais
- Testado em ambiente multicultural (PT/BR/local)

### 2. **Abordagem "África-Primeiro"**
- Padrão: Moçambique (MZ) em desenvolvimento local
- Detecção inteligente em produção
- Terminologia que funciona em contextos mistos

### 3. **Zero Configuração Real**
```bash
composer require arnaldotomo/laravel-lusophone
# ✅ Pronto! Já está a funcionar
```

### 4. **Performance Otimizada**
- Cache inteligente de detecção de região
- Impact < 1ms por request
- Lazy loading de traduções

### 5. **Integração Completa**
- Laravel Breeze: ✅ Automática
- Laravel Jetstream: ✅ Automática  
- APIs: ✅ Retorna dados localizados
- SPAs: ✅ Suporte via JSON

## Casos de Uso Reais

### E-commerce Multi-país
```php
// Um produto, preços localizados automaticamente
$product = Product::find(1);
echo Str::lusophoneCurrency($product->price);

// 🇵🇹 Portugal: "29,99 €"
// 🇧🇷 Brasil: "R$ 149,90"  
// 🇲🇿 Moçambique: "1.899,00 MT"
```

### Sistema de Registo Universal
```php
// Formulário que funciona em qualquer país lusófono
$rules = [
    'name' => 'required|string',
    'tax_id' => 'required|lusophone_tax_id', // ✨ Magia aqui
    'phone' => 'required|lusophone_phone'
];

// Validação automática:
// PT: NIF português, telemóvel
// BR: CPF brasileiro, telefone  
// MZ: NUIT moçambicano, celular
```

### Aplicação Financeira
```php
// Relatórios financeiros localizados
foreach ($transactions as $transaction) {
    echo $transaction->description . ': ' . 
         Str::lusophoneCurrency($transaction->amount);
}

// Adaptação automática:
// 🇦🇴 Angola: "Transferência: 50.000,00 Kz"
// 🇨🇻 Cabo Verde: "Depósito: 5.000,00 Esc"
```

## Próximos Passos

Agora que compreende o poder do Laravel Lusophone, está pronto para:

1. **[Instalar a biblioteca](installation.md)** - Setup em 2 minutos
2. **[Configurar o ambiente](configuration.md)** - Opções avançadas
3. **[Usar validações universais](validation.md)** - Regras que funcionam em todos os países
4. **[Formatar valores](formatting.md)** - Moedas, números e datas
5. **[Personalizar traduções](translations.md)** - Adaptar ao seu contexto

---

**Desenvolvido com ❤️ em Moçambique para o mundo lusófono**

*Conectando 260+ milhões de falantes de português através de melhor tecnologia*
