<?php

return [
    'tournament.tournaments' => [
        'index' => 'tournament::tournaments.list resource',
        'create' => 'tournament::tournaments.create resource',
        'edit' => 'tournament::tournaments.edit resource',
        'destroy' => 'tournament::tournaments.destroy resource',
    ],
    'tournament.news' => [
        'index' => 'tournament::news.list resource',
        'create' => 'tournament::news.create resource',
        'edit' => 'tournament::news.edit resource',
        'destroy' => 'tournament::news.destroy resource',
    ],
// append


];
