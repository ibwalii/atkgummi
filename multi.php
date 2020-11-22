<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if ( isset( $_GET['period'] ) )
{
    echo '<table>';
    foreach ( $_GET['period'] as $peri )
    {
        // here you have access to $period array
        echo '<tr>';
        echo '  <td>', $peri[0], '</td>';
        echo '  <td>', $peri[1], '</td>';
		echo '  <td>', $peri[2], '</td>';
		echo '  <td>', $peri[3], '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
<form>
	<table>
    	<tr>
        	<td><input type="time" name="period[0][0]"></td>
            <td><input type="time" name="period[1][0]"></td>
            <td><input type="time" name="period[2][0]"></td>
        </tr>
        <tr>
        	<td><input type="time" name="period[0][1]"></td>
            <td><input type="time" name="period[1][1]"></td>
            <td><input type="time" name="period[2][1]"></td>
        </tr>
    </table>
    <button type="submit">Submit</button>
</form>
</body>
</html>