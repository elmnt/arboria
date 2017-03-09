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
                'sender'  => 'info@dev.arboria.com',
                'subject' => 'New message from the Arboria Contact Us form'
            ]
            /* This is throwing a PHP error:
            file_put_contents(/log.txt): failed to open stream: Permission denied
            [
               '_action' => 'log',
               'file'    => '/log.txt'
            ]
            */
        ]
    ]);

    return compact('form');
};
