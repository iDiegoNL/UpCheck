<?php

return [
    'suffix' => config('app.name'),
    'logo' => 'https://tabler.github.io/tabler/demo/brand/tabler.svg',
    'urls' => [
        'knowledgebase' => 'https://support.upcheck.co',
        'support' => 'https://support.upcheck.co',
        'logout' => 'logout',
        'account' => 'account',
        'settings' => 'settings',
        'search' => 'search',
        'homepage' => 'dashboard',
        'login' => 'login',
        'post-login' => 'login',
        'forgot' => 'password/reset',
        'register' => 'register',
        'post-register' => 'register',
        'post-email' => 'password/email',
        'post-reset' => 'password/reset'
    ],
    'footer' => 'Copyright © ' . date("Y") . ' UpCheck.co. Development by <a href="https://diegor.nl" target="_blank">DiegoR</a>.',
    'support' => [
        'search' => true,
        'footer-menu' => false,
    ]
];
