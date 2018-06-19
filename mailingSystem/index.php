<?php 
   session_start();
   
   $tmp_err = (isset($_SESSION['errors'])) ? $_SESSION['errors'] : [] ;
   $fields = (isset($_SESSION['fields'])) ? $_SESSION['fields'] : [] ;
   $errors='';
   if(!empty($tmp_err))
   {
       foreach($tmp_err as $err)
       {
           $errors .= "<li>*". $err."</li>";
       }
   }
   
   $name =  isset($fields['name']) ? $fields['name']  : '' ;
   $email =  isset($fields['email']) ? $fields['email']  : '' ;
   $msg =  isset($fields['msg']) ? $fields['msg']  : '' ;
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=deice-width, initial-scale=1" />
	<title>Mail System</title>
	<link rel="stylesheet" href="css/main.css" />
</head>
<body>

	<div class="contacts">
		<div class="panel">
			<?=$errors; ?> 
		</div>
		
		<form action='contact.php' method='POST'>
			<label>
			Your Name* <input type='text' name='name' autocomplete='off'  
			value = "<?=$name; ?>"/>
			</label><br />
			<label>
			Your Email* <input type='email' name='email' autocomplete='off'  
			value = <?=$email ;?>/>
			</label><br />
			<label>
			Your Name* <textarea name='msg' rows='8' ><?=$msg ;?></textarea>
			</label><br />
			<input type="submit" name="submit" /><br />
			<p class='muted'>* means a require field</p>
		</form>
	</div>

</body>
</html>
<?php session_destroy();?>