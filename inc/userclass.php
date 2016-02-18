<?php 
function checkAdmin() {

if($_SESSION['user_level'] == ADMIN_LEVEL) {
return 1;
} else { return 0 ;
}

}
?>