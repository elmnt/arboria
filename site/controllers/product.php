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
                'to'      => 'elmnt.public@gmail.com',
                'sender'  => 'info@dev.arboria.com',
                'subject' => 'Arboria Product Review Submission'
            ]
        ]
    ]);

    return compact('form');
};
