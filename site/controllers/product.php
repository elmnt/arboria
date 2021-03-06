<?php

return function($site, $pages, $page) {
    $form = uniform('review_form', [
        'required' => [
            'name'  => '',
            '_from' => 'email'
        ],
        'actions' => [
            [
                '_action' => 'email',
                'to'      => 'sales@arboria.com',
                'sender'  => 'info@arboria.com',
                'subject' => 'Arboria Product Review Submission'
            ]
        ]
    ]);

    return compact('form');
};
