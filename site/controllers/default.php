<?php

return function($site, $pages, $page) {
    $form = uniform('contact_form', [
        'required' => [
            'name'  => '',
            '_from' => 'email'
        ],
        'actions' => [
            [
                '_action' => 'email',
                'to'      => 'sales@arboria.com',
                'sender'  => 'info@arboria.com',
                'subject' => 'New message from the Arboria Contact Us form',
                'snippet' => 'email-default'
            ]
        ]
    ]);

    return compact('form');
};
