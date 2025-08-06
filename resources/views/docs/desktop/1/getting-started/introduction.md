---
title: Introduction
order: 001
---

## Olá, Laravel Lusophone!

O **Laravel Lusophone** é um pacote poderoso para criar aplicações Laravel totalmente localizadas para o mundo lusófono. Se você é um desenvolvedor PHP e já trabalha com Laravel, vai se sentir em casa. Se é novo no Laravel, vai achar o Lusophone fácil de aprender e usar. Não importa o seu caminho, você estará construindo aplicações incríveis em minutos!

**Laravel Lusophone torna a criação de aplicações em português para qualquer país lusófono extremamente simples.**

Com este pacote, você pode oferecer experiências personalizadas para usuários em Portugal, Brasil, Moçambique, Angola e outros países de língua portuguesa, com traduções, validações e formatações automáticas adaptadas a cada região.

## Por que Laravel Lusophone?

**Português é mais que Brasil e Portugal.** Com mais de 260 milhões de falantes em 8 países, o português é uma língua diversa, com nuances culturais e técnicas únicas. O Laravel Lusophone foi criado para atender a essa diversidade, garantindo que sua aplicação se adapte automaticamente ao contexto de cada usuário.

- **Detecção Automática**: Identifica a região do usuário (baseado em IP, headers ou preferências) e ajusta a aplicação.
- **Validações Universais**: Regras como `lusophone_tax_id` validam NIF, CPF ou NUIT automaticamente, sem esforço.
- **Formatação Inteligente**: Moedas, datas e números no formato local (ex.: "1.500,50 MT" em Moçambique, "R$ 1.500,50" no Brasil).
- **Contexto Cultural**: Adapta automaticamente a formalidade e terminologia (ex.: "telemóvel" em Portugal, "celular" em Moçambique).
- **Zero Configuração**: Funciona assim que você instala, mas é altamente personalizável.

## O que é o Laravel Lusophone?

O Laravel Lusophone é um pacote completo para localização em português, combinando:

1. Uma coleção de classes fáceis de usar para traduções, validações e formatações regionais.
2. Ferramentas para detectar automaticamente a região do usuário e adaptar a aplicação.
3. Suporte nativo para todos os países lusófonos, com validações específicas (NIF, CPF, NUIT) e formatações locais.

## O que o Laravel Lusophone *não* é

- **Não é um pacote que você precisa aprender do zero.** Ele se integra perfeitamente ao Laravel, aproveitando o que você já sabe.
- **Não é apenas para Brasil ou Portugal.** Suporta todos os países lusófonos, de Moçambique a Timor-Leste.
- **Não é complicado.** Instale com um comando e comece a usar imediatamente.
- **Não é rígido.** Você pode personalizar traduções, validações e formatos conforme necessário.

## O que vem na caixa?

O Laravel Lusophone vem com tudo que você precisa para criar aplicações multilíngues incríveis:

- 🌍 Suporte para 8 países lusófonos (Portugal, Brasil, Moçambique, Angola, Cabo Verde, Guiné-Bissau, São Tomé e Príncipe, Timor-Leste).
- ✅ Validações automáticas para documentos (NIF, CPF, NUIT), telefones e códigos postais.
- 💰 Formatação de moedas, datas e números adaptada a cada região.
- 🎭 Traduções contextuais que respeitam a formalidade local (ex.: formal em Portugal, mista em Moçambique).
- 🛠️ Comandos Artisan para configuração, análise e testes.

## O que posso construir com o Laravel Lusophone?

Qualquer aplicação Laravel que precise atender usuários em países lusófonos! Alguns exemplos:

- 🏪 Um e-commerce que valida CPFs no Brasil e NIFs em Portugal automaticamente.
- 🏦 Um sistema bancário com formatação de moeda local (ex.: "Kz" em Angola, "€" em Portugal).
- 📱 Uma API mobile que retorna mensagens e validações adaptadas à região do usuário.
- 📝 Um formulário de contato que usa "telemóvel" ou "celular" conforme o país.

As possibilidades são infinitas. O Laravel Lusophone já é usado por empresas, universidades e startups em todo o mundo lusófono. [Confira projetos incríveis criados pela comunidade](https://github.com/arnaldo-tomo/laravel-lusophone)!

## O que vem a seguir?

Explore a documentação! Tentamos torná-la o mais completa possível, mas se algo estiver faltando, sinta-se à vontade para [contribuir](https://github.com/arnaldo-tomo/laravel-lusophone).

O Laravel Lusophone é open source e está disponível no [GitHub](https://github.com/arnaldo-tomo/laravel-lusophone).

Pronto para começar? [Veja como instalar](installation).

## Créditos

O Laravel Lusophone não seria possível sem:

- [PHP](https://php.net)
- [Laravel](https://laravel.com)
- A incrível comunidade lusófona de desenvolvedores 🌍

## Início Rápido - 5 Minutos

### 1. Instalação (30 segundos)

```bash
composer require arnaldotomo/laravel-lusophone
