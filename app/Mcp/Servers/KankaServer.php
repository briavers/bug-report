<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools\CreateCharacterTool;
use App\Mcp\Tools\CreateJournalEntryTool;
use App\Mcp\Tools\CreateJournalTool;
use App\Mcp\Tools\CreateLocationTool;
use App\Mcp\Tools\CreateOrganisationTool;
use App\Mcp\Tools\CreateQuestTool;
use App\Mcp\Tools\ListCampaignsTool;
use App\Mcp\Tools\ListCharactersTool;
use App\Mcp\Tools\ListJournalsTool;
use App\Mcp\Tools\ListLocationsTool;
use App\Mcp\Tools\ListOrganisationsTool;
use App\Mcp\Tools\ListQuestsTool;
use Illuminate\Support\Facades\Auth;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;

#[Name('Kanka')]
#[Version('1.0.0')]
#[Instructions('Use this server to manage world-building entities in Kanka campaigns. Start by calling list_campaigns to discover your campaign IDs, then use the create and list tools to manage locations, characters, organisations, journals, and quests.')]
class KankaServer extends Server
{
    protected array $tools = [
        ListCampaignsTool::class,
    ];

    protected array $resources = [];

    protected array $prompts = [];

    protected function boot(): void
    {
        $userId = config('mcp.local_user_id');

        if ($userId && Auth::guard('web')->guest()) {
            Auth::guard('web')->loginUsingId($userId);
        }
    }
}
