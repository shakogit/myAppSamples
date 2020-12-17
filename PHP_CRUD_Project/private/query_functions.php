<?php

///////////////// SUBJECTS ////////////////

function validate_subject($subject)
{
    $errors = [];
    
    if(is_blank($subject['menu_name']))
    {
        $errors[]="Name can't be Blanked";
    }
    elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255]))
    {
        $errors[] = "Name must be between 2 and 255 charcters";
    }
    
    $position_int = (int) $subject['position'];
    if($position_int <= 0)
    {
        $errors[] = "Position must be greater then zero.";
    }
    if($position_int > 999)
    {
        $errors[] = "Position must be less than 999";
    }
    
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["1"],["0"]))
    {
        $errors [] = "Visible must be true or false!";
    }
    
    return $errors;
}
  
 function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
     
 }


 function update_subject($subject) {
    global $db;
     
    $errors = validate_subject($subject);
     if(!empty($errors))
     {
         return $errors;
     }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}


 function find_all_subjects() {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }


 function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db,  $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


 function insert_subjects($subject){
      global $db;
     
     $errors = validate_subject($subject);
     if(!empty($errors))
     {
         return $errors;
     }

      $sql = "INSERT INTO subjects ";
      $sql .= "(menu_name, position, visible) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
      $sql .= "'" . db_escape($db, $subject['position']) . "',";
      $sql .= "'" . db_escape($db, $subject['visible']) . "'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
    
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
      
  }

  //////////////// PAGES ///////////////


function find_all_pages()
{
    global $db;
    
    $sql = "SELECT * FROM pages ";
    $sql.= "ORDER by position ASC";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function validate_page($page)
{
    $errors = [];
    
    //subject_id
    if(is_blank($page['subject_id']))
    {
        $errors[] = "Subject can not be blank!";
    }
    
    //menu_name
    if(is_blank($page['menu_name']))
    {
        $errors[] = "Name can not be blank!";
    }elseif(!has_length($page['menu_name'] , ['min' => 2, 'max' => 255] ))
    {
        $errors[] = "Name must be from 2 to 255 charcters";
    }
    
    $current_id = $page['id'] ?? '0';
    if(!has_unique_page_menu_name($page['menu_name'], $current_id))
    {
        $errors[] = "Menu Name must be Unique Name";
    }
    
    //position
    $position_int = (int) $page['position'];
    if($position_int <= 0)
    {
        $errors[] = "Position must be greater than Zero!";
    }
    if($position_int >999)
    {
        $errors[] = "Position must be less than - 999 -";
    }
    
    // Visible
    $visible_str = (string) $page['visible'];
    if(!has_inclusion_of($visible_str, ["0" , "1"]))
    {
        $errors[] = "Visible must be true or false";
    }
    
    // content
    if(is_blank($page['content']))
    {
        $errors[]= "Content Can Not be blank!";
    }
    return $errors;
}

function find_page_by_id($id)
{
    global $db;
    
    $sql = "SELECT * FROM pages ";
    $sql.= "WHERE id='"  . db_escape($db, $id) . "';";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;

}

function insert_page($page)
{
    global $db;
    
    $errors = validate_page($page);
    if(!empty($errors))
    {
        return $errors;
    }
    
    $sql = "INSERT INTO pages ";
    $sql.= "(subject_id , menu_name , position, visible, content)";
    $sql.= "VALUES (";
    $sql.= "'" . db_escape($db, $page['subject_id']) . "',";
    $sql.= "'" . db_escape($db, $page['menu_name']) . "',";
    $sql.= "'" . db_escape($db, $page['position']) . "',";
    $sql.= "'" . db_escape($db, $page['visible']) . "',";
    $sql.= "'" . db_escape($db, $page['content']). "'";
    $sql.= ")";
    
    $result = mysqli_query($db, $sql);
    if($result)
    {
        return true;
    }
    else
    {
        echo mysqli_error($db);
        db_disconnect();
        exit;
    }
    
    
}

function update_page($page) 
{
    global $db;
    
    $errors = validate_page($page);
    if(!empty($errors))
    {
        return $errors;
    }


    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function delete_page($id)
{
    global $db;
    
    $sql = "DELETE FROM pages ";
    $sql.= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql.= "LIMIT 1";
    $result=mysqli_query($db, $sql);
    
    if($result)
    {
        return true;
    }
    else
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
?>
