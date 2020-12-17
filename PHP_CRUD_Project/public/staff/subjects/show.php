<?php require_once ('../../../PRIVATE/init.php');
$page_title = 'Show Subjects';
include(SHARED_PATH . '/staff_header.php');

$id = $_GET['id'] ?? '1' ;

$subject = find_subject_by_id($id);

$sql = "SELECT * FROM subjects ";
$sql.= "WHERE id='" . $id . "'";    
$result = mysqli_query($db, $sql);
confirm_result_set($result);

$subject = mysqli_fetch_assoc($result);
mysqli_free_result($result);

    
?>

<br>

<div id="content">
 <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="back-link">&laquo;Back to list</a>
    <div class="subject show">
        <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>
        <div id="attributes">
           
            <dl>
                <dt>Menu name</dt>
                <dd><?php echo h($subject['menu_name']);?></dd>
            </dl>
            
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']);?></dd>
            </dl>
            
            <dl>
                <dt>Visible</dt>
                <dd><?php echo h($subject['visible']== '1' ? 'true' : 'false')?></dd>
            </dl>
    
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php');?>