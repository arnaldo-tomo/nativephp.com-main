<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EscapeMarkdownContent
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Se for uma rota de documentação
        if ($request->is('docs/*')) {
            $content = $response->getContent();

            // Escapar backticks problemáticos em blocos de código
            $content = preg_replace('/```php\s*\n(.*?)\n```/s', function($matches) {
                return "```php\n" . htmlspecialchars($matches[1], ENT_QUOTES) . "\n```";
            }, $content);

            $response->setContent($content);
        }

        return $response;
    }
}
