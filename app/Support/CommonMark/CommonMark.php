<?php
// app/Support/CommonMark/CommonMark.php

namespace App\Support\CommonMark;

use App\Extensions\TorchlightWithCopyExtension; // ← COMENTAR ESTA LINHA
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
use League\CommonMark\Extension\Table\TableExtension;

class CommonMark
{
    public static function convertToHtml(string $markdown): string
    {
        $converter = new CommonMarkConverter;
        $converter->getEnvironment()->addRenderer(Heading::class, new HeadingRenderer);
        $converter->getEnvironment()->addExtension(new TableExtension);

        // ← COMENTAR OU REMOVER ESTA LINHA:
        $converter->getEnvironment()->addExtension(new TorchlightWithCopyExtension);

        return $converter->convert($markdown);
    }
}
