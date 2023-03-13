<?php
    session_start();
    session_destroy();
    echo "<script>location='login.php'</script>";
?>
