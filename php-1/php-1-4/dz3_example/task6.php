<?php
$nav = [
    'page1' => '?page=1',
    'pages' => [
        'page2' => '?page=2',
        'page3' => '?page=3',
        'deep' => [
            'page4' => '?page=4',
            'more' => [
                'page5' => '?page=5',
                'page7' => '?page=7']
        ]
    ],
    'page8' => '?page=8',
    'page9' => '?page=9'
];

function renderMenu($menu) {
    $out = '<ul>';
    foreach ($menu as $name => $href) {
        if (is_array($href)) {
            $out .= renderMenu($href);
        } else {
            $out .= "<li><a href=\"{$href}\">{$name}</a></li>";
        }
    }
    $out .= '</ul>';
    return $out;
}

$output = renderMenu($nav);
return renderTemplate('templateTask', ['solution' => $output]);