<?php

function toUnderline($input) {
    return str_replace(" ", "_", $input);
}

$output = '';
$inputString = "«Stack Overflow на русском» — сайт вопросов и ответов для программистов. Присоединяйтесь!";
$output .= toUnderline($inputString);

return renderTemplate('templateTask', ['solution' => $output]);
