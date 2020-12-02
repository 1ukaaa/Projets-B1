<?php
$error = getVar('error');
if(!is_bool($error)){
    // ERROR
    global $ERRORS;
    if(array_key_exists($error, $ERRORS)){
        echo "<span style='font-color=red'>";
        echo $ERRORS[$error];
        echo "</span>";
    }
}
$page = getPage();
if(!includeHtml($page)){
    global $DEFAULT_PAGE;
    includeHtml($DEFAULT_PAGE);
}
?>
