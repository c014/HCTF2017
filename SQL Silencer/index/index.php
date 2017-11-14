<!DOCTYPE html>
<html lang="en">

	<head>
	<title>Id recognition system</title>
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" />

	</head>

	<body>

		<div class='wrapper'>
			<i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
		</div>

<div align="center">
<form action="" method="GET">
<p><font color="white">ID : <input type="text" name="id"></font></p>
<p><input type="submit" value="Submit"></p>	
</form>
</div>
<div align="center">
<p>
<font color="white">
<?php 
$dbhost = 'localhost';
$dbuser = 'hctf';
$dbpass = 'hctf2017';

function sql_check($sql){
	if($sql < 1 || $sql > 3){
    	die('We only have 3 users.');
	}

    $check = preg_match('/&|_|\+|or|,|and| |\|\||#|-|`|;|%00|%0a|%0b|%0c|%0d|%0e|%0f|"|insert|group|limit|update|delete|\'|\\*|\*|\.\.\/|\.\/|into|load_file|outfile|select([\s]+)from|union([\s\S]+)select([\s\S]+)from/i',$sql);
    if( $check ){
        die("Nonono!");
    } else {
        return $sql;
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $id = sql_check($id);   

    $db = new mysqli($dbhost, $dbuser, $dbpass, "hctf");
    if(mysqli_connect_error()){
    	die('Emmmm, could not connect to databse. Plz tell admin.');
    }   

    $sql = "SELECT username FROM `user` WHERE id = {$id} limit 0 , 1";  

    if($result = $db->query( $sql )){
    	if($row = $result->fetch_array(MYSQLI_ASSOC)){
    		echo $row['username']."\n";
    	}
    	else {
    		die('Id error');
        }
    	$result->close();
    } 
    else  {
    	die('There is nothing.');
    }

    $db->close();
}
?>
</font>
</p>
</div>
<!-- What you need is in table:flag -->

		<style type="text/css" media="screen">
			.credits {
				position: absolute;
				right: 20px;
				bottom: 25px;
				font-size: 15px;
				color: #fff;
				z-index: 1;
			}
			.credits>* {
				vertical-align: middle;
				margin-left: 15px;
			}
			.credits a {
				padding: 8px 10px;
				color: #eee;
				border: 2px solid #aaa;
				border-radius: 2px;
				text-decoration: none;
			}
			.credits a:hover {
				border-color: #fff;
				color: #fff;
			}
		</style>


	</body>

</html>