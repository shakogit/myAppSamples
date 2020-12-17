<?php

echo $_SERVER['REQUEST_METHOD'];
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>


<form method="post">
<pre><input type="text" name="a"></pre> 
<pre><input type="text" name="b"></pre>
<button>
    Send
</button>    
</form>