<?php



function url_for($script_path){
    
    if ($script_path[0] != '/')
    {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

// url encode
function u($string=""){
    return urlencode($string);
}

function row_u($string=""){
    return rawurlencode($string);
}
// prevent html characters
function h($string="")
{
    return htmlspecialchars($string);
}

// set Headers
function err_404(){
    header($_SERVER["SERVER_PROTOCOL"] . " 404 not found ");
    exit;
}

function err_500(){
    header($_SERVER["SERVER_PROTOCOL"] . "500 server Error");
    exit;
}

//set Redirection
function redirect_to($location)
{
    header("Location:" . $location);
}

function is_post_request(){
    
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function is_get_request(){
    
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array())
{
    $output = '';
    if(!empty($errors))
    {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following Error";
        $output .= "<ul>";
        foreach($errors as $error)
        {
            $output .= "<li>" .h($error). "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}





?>