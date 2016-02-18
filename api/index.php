<table>
<thead>
    <tr>
    	<th>Charname</th>
		<th>Punkte</th>
		<th>Beschreibung</th>
		<th>Datum</th>
    </tr>
	</thead>
<?php
require_once ('../inc/config.php');
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from w_scav');
while($dnn = mysql_fetch_array($req))
{
?>
<tbody>
    <tr>
    	<td class="lol"><?php echo htmlentities($dnn['charname'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td class="lol"><?php echo htmlentities($dnn['punkte'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td class="lol"><?php echo htmlentities($dnn['beschreibung'], ENT_QUOTES, 'UTF-8'); ?></td>
		<td class="lol"><?php echo htmlentities($dnn['date'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
<?php
}
?>
