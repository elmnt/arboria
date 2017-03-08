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
                'to'      => 'elmnt.gws@gmail.com',
                'sender'  => 'info@dev.arboria.com',
                'subject' => 'Arboria Product Review Submission'
            ]
            /*
            [
               '_action' => 'log',
               'file'    => '/log.txt'
            ]
            */           
        ]
    ]);

    return compact('form');
};
