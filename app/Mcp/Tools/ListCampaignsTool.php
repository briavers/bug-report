<?php

namespace App\Mcp\Tools;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tool;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List all Kanka campaigns the authenticated user belongs to.')]
class ListCampaignsTool extends Tool
{
    public function handle(Request $request): Response
    {
        $items = [
            'alpha',
            'beta',
            'charlie',
        ];

        return Response::json($items);
    }
}
