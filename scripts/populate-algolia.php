<?php
// scripts/populate-algolia.php

require __DIR__ . '/../vendor/autoload.php';

use Algolia\AlgoliaSearch\SearchClient;
use Symfony\Component\Finder\Finder;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// Configuração
$client = SearchClient::create('M0613B8KST', '191ad5e63c999f499646909eb14d2be2');
$index = $client->initIndex('laravel-lusophone');

// Função para processar ficheiros Markdown
function processMarkdownFiles($directory) {
    $documents = [];
    $finder = new Finder();

    $files = $finder->files()
                   ->name('*.md')
                   ->notName('_index.md')
                   ->in($directory);

    foreach ($files as $file) {
        $content = $file->getContents();
        $document = YamlFrontMatter::parse($content);

        // Extrair título
        $title = $document->matter('title') ?: $file->getBasename('.md');

        // Limpar conteúdo Markdown
        $cleanContent = strip_tags(
            preg_replace('/```.*?```/s', '', $document->body())
        );

        $documents[] = [
            'objectID' => $file->getBasename('.md'),
            'title' => $title,
            'content' => substr($cleanContent, 0, 1000),
            'url' => '/docs/desktop/1/getting-started/' . $file->getBasename('.md'),
            'section' => 'Laravel Lusophone',
            'hierarchy' => [
                'lvl0' => 'Laravel Lusophone',
                'lvl1' => 'Getting Started',
                'lvl2' => $title
            ]
        ];
    }

    return $documents;
}

// Processar ficheiros e indexar
$docsDirectory = __DIR__ . '/../resources/views/docs/desktop/1/getting-started';
$documents = processMarkdownFiles($docsDirectory);

// Fazer upload para Algolia
$index->saveObjects($documents);

echo "✅ " . count($documents) . " documentos indexados com sucesso!\n";
