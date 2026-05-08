<?php

use Illuminate\Support\Facades\Route;
use Laravel\Mcp\Facades\Mcp;

Mcp::oauthRoutes();

Route::get('/authorize', function () {
    $query = array_merge(request()->query(), ['scope' => 'mcp:use']);

    return redirect()->to('/oauth/authorize?'.http_build_query($query));
});

Mcp::web('/mcp', \App\Mcp\Servers\KankaServer::class)
    ->middleware(['auth:api']);

Mcp::local('kanka', \App\Mcp\Servers\KankaServer::class);
