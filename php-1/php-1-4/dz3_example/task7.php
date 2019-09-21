<?php
ob_start();
for ($i = 0; $i <= 9; print $i, $i++) ;
$output = ob_get_clean();
return renderTemplate('templateTask', ['solution' => $output]);