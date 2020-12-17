<?php

function is_blank($value)
{
    return !isset($value) || trim($value) === '';
}

function has_presence($value)
{
    return !is_blank($value);
}

function has_length_greater_than($value, $min)
{
    $length = strlen($value);
    return $length > $min;
}

function has_length_less_than($value, $max)
{
    $length = strlen($value);
    return $length < $max;
}

function has_length_exactly($value, $exac)
{
    $length = strlen($value);
    return $length == $exac;
}

function has_length($value, $option)
{
    if(isset($option['min']) && !has_length_greater_than($value, $option['min'] - 1))
    {
        return false;
    }
    elseif(isset($option['max']) && !has_length_less_than($value, $option['max'] + 1))
    {
           return false;
    }
    elseif(isset($option['exac']) && !has_length_exactly($value, $option['exac']))
    {
        return false;
    }else
    {
        return true;
    }
}

function has_inclusion_of($value, $set)
{
    return in_array($value, $set);
}

function has_exclusion_of($value, $set)
{
    return !in_array($value, $set);
}

function has_string($value, $requered_string)
{
    return strpos($value, $requered_string) !== false;
}

function has_valed_email_format($value)
{
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value)===1;
}

function has_unique_page_menu_name($menu_name, $current_id="0")
{
    global $db;
    
    $sql = "SELECT * FROM pages ";
    $sql.= "WHERE menu_name = '" . db_escape($db, $menu_name) . "' ";
    $sql.= "AND id != '" . db_escape($db, $current_id) . "' ";
    
    $page_set = mysqli_query($db, $sql);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
    
    return $page_count === 0;
}









?>