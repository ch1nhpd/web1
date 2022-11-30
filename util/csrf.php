<?php

function is_valid_token($url){
    if($_POST['token']!=$_SESSION['token']){
        echo "
        <script>
            alert('Invalid CSRF token!');
            window.location.href='".$url."';
        </script>;
        ";
        exit;
    }
}

?>