<?php
// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Finder\Finder;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class SearchController extends Controller
{
    public function index()
    {
        $searchIndex = $this->buildSearchIndex();
        return response()->json($searchIndex);
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $index = $this->buildSearchIndex();

        $results = collect($index)->filter(function ($item) use ($query) {
            return str_contains(strtolower($item['title']), strtolower($query)) ||
                   str_contains(strtolower($item['content']), strtolower($query));
        })->take(10);

        return response()->json($results->values());
    }

    private function buildSearchIndex()
    {
        $searchIndex = [];
        $finder = new Finder();

        $docsPath = resource_path('views/docs/desktop/1/getting-started');

        if (!is_dir($docsPath)) {
            return $searchIndex;
        }

        $files = $finder->files()
                       ->name('*.md')
                       ->notName('_index.md')
                       ->in($docsPath);

        foreach ($files as $file) {
            $content = $file->getContents();
            $document = YamlFrontMatter::parse($content);

            $title = $document->matter('title') ?: $file->getBasename('.md');
            $cleanContent = strip_tags(
                preg_replace('/```.*?```/s', '', $document->body())
            );

            $searchIndex[] = [
                'title' => $title,
                'content' => substr($cleanContent, 0, 500),
                'url' => '/docs/desktop/1/getting-started/' . $file->getBasename('.md'),
                'section' => 'Laravel Lusophone',
            ];
        }

        return $searchIndex;
    }
}
