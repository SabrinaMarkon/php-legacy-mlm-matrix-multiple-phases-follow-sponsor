<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

		if($_POST['action'] == "add") {
		
			//Add the website
			$sql = mysql_query("SELECT * FROM builder_sites WHERE name='".$_POST['name']."' LIMIT 1");
			
			if(@mysql_num_rows($sql)) {
			
				echo "<font color=red>The site is already in the database.</font><br>";
			
			} else {
			
				mysql_query("INSERT INTO builder_sites VALUES('', '".$_POST['name']."','".$_POST['desc']."','".$_POST['url']."','".$_POST['order']."','".$_POST['category']."')");
			
				$newid = mysql_insert_id();
				mysql_query(" ALTER TABLE `builder` ADD `site".$newid."` VARCHAR( 255 ) NOT NULL ;");

				echo "<font color=red>The site has been added.</font><br>";
			
			}
			
		} elseif ($_POST['action'] == "delete") {
		
			//Delete the website
			mysql_query("DELETE FROM builder_sites WHERE id='".$_POST['id']."' LIMIT 1");
			mysql_query("ALTER TABLE `builder` DROP `site".$_POST['id']."`");

				echo "<font color=red>The site has been deleted.</font><br>";
		
		
		} elseif ($_POST['action'] == "doedit") {
		
			mysql_query("UPDATE builder_sites SET name = '".$_POST['name']."', `desc` = '".str_replace("'","\'",$_POST['desc'])."', url = '".$_POST['url']."', `order` = '".$_POST['order']."',category = '".$_POST['category']."' WHERE id = '".$_POST['id']."'");
			
				echo "<font color=red>The site has been edited.</font><br>";
		
		
		} elseif ($_POST['action'] == "editfav") {
		
			//Update the website
			mysql_query("UPDATE builder_fav SET `title`='".$_POST['title']."', `url`='".$_POST['url']."',bold='".$_POST['bold']."',color='".$_POST['color']."' WHERE id='".$_POST['id']."'");

			echo "<font color=red>The site has been edited.</font><br>";
		
		
		} elseif($_POST['action'] == "addcat") {
		
			//Add the category
			$sql = mysql_query("SELECT * FROM builder_cat WHERE name='".$_POST['name']."' LIMIT 1");
			
			if(@mysql_num_rows($sql)) {
			
				echo "<font color=red>The category is already in the database.</font><br>";
			
			} else {
			
				mysql_query("INSERT INTO builder_cat VALUES('', '".$_POST['name']."','".$_POST['order']."')");
	
				echo "<font color=red>The category has been added.</font><br>";
			
			}
			
		} elseif ($_POST['action'] == "deletecat") {
		
			//Delete the category
			mysql_query("DELETE FROM builder_cat WHERE id='".$_POST['id']."' LIMIT 1");
			mysql_query("DELETE FROM builder_sites WHERE category='".$_POST['id']."'");

			echo "<font color=red>The category has been deleted.</font><br>";
		
		
		} elseif ($_POST['action'] == "doeditcat") {
		
			//Edit the category
			mysql_query("UPDATE builder_cat SET name='".$_POST['name']."', `order`='".$_POST['order']."' WHERE id='".$_POST['id']."' LIMIT 1");

			echo "<font color=red>The category has been edited.</font><br>";
		
		
		}

		?>
		<br><br>
		<h2>Default sponsor programs</h2>
		<?
		$sql = mysql_query("SELECT * FROM builder_fav");
		while($each = mysql_fetch_array($sql)) {
			?>
			<form method="post">
			<b>Program <? echo $each['id']; ?></b><br>
			<input type="hidden" name="id" value="<? echo $each['id']; ?>">
			<input type="hidden" name="action" value="editfav">			
		  <table>
		  <tr><td>Name:</td><td><input type="text" name="title" value="<? echo $each['title']; ?>" maxlength="65"></td></tr>
		  <tr><td>Url:</td><td><input type="text" name="url" value="<? echo $each['url']; ?>"></td></tr>
	   <tr><td>Bold:</td><td><input type="radio" name="bold" value="1"<? if($each['bold']==1) echo ' CHECKED'; ?>> Yes <input type="radio" name="bold" value="0"<? if($each['bold']==0) echo ' CHECKED'; ?>> No</td></tr>
	   <tr><td>Color:</td><td><input type="radio" name="color" value="red"<? if($each['color']=='red') echo ' CHECKED'; ?>> <font color=red>Red</font> <input type="radio" name="color" value="blue"<? if($each['color']=='blue') echo ' CHECKED'; ?>> <font color=blue>Blue</font> <input type="radio" name="color" value="green"<? if($each['color']=='green') echo ' CHECKED'; ?>> <font color=green>green</font> <br><input type="radio" name="color" value="black"<? if($each['color']=='black' OR !$each['bold']) echo ' CHECKED'; ?>> <font color=black>Black</font> <input type="radio" name="color" value="purple"<? if($each['color']=='purple') echo ' CHECKED'; ?>> <font color=purple>Purple</font> <input type="radio" name="color" value="pink"<? if($each['color']=='pink') echo ' CHECKED'; ?>> <font color=pink>Pink</font></td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Edit"></td></tr>
		  </table>
			</form>
			<br>
			
			
			<?
		}
		
		
		$query = "select * from builder_cat ORDER BY `order` ASC";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
			<h2>Categories</h2>
            <center><table width=70% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Order</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
		$categories = array();
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$name = $line["name"];
			$order = $line["order"];
			$categories[$id] = $name;
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $name; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $order; ?></font></center></td>
 		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
          <form method="POST" action="editbuilder.php#editcat">
		  <input type="hidden" name="action" value="editcat">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Edit">
          </form>
		  <form method="POST" action="editbuilder.php">
		  <input type="hidden" name="action" value="deletecat">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Delete">
          </form>
          </center>
          </td></tr> <?
        }
        echo "</table></center>" ;

		if($_POST['action'] == "editcat") {
		
			echo "<a name=\"editcat\"></a>";
			$sql = mysql_query("SELECT * FROM builder_cat WHERE id = '".$_POST['id']."'");
			if(@mysql_num_rows($sql)) {
				$info = mysql_fetch_array($sql);
				?>
				<br>
				<h2>Edit category</h2>
				
			
				  <form method="POST" action="editbuilder.php">
				  <input type="hidden" name="action" value="doeditcat">
				  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
				  <table>
				  <tr><td>Name:</td><td><input type="text" name="name" value="<? echo $info['name']; ?>"></td></tr>
				  <tr><td>Order:</td><td><input type="text" name="order" value="<? echo $info['order']; ?>"></td></tr>
				  <tr><td colspan="2" align="center"><input type="submit" value="Edit"></td></tr>
				  </table>
		          </form>
				  <br>
				
				<?	
			} else echo "<font color=red>Invalid category.</font>";
		} else {
		
			$sql = mysql_query("SELECT `order` FROM builder_cat ORDER BY `order` DESC LIMIT 1");
			if(@mysql_num_rows($sql)) $order = mysql_result($sql,0) + 1;
			else $order = 1;
		
		?>
		<br>
		<h2>Add category</h2>
		
	
		  <form method="POST" action="editbuilder.php">
		  <input type="hidden" name="action" value="addcat">
		  <table>
		  <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
		  <tr><td>Order:</td><td><input type="text" name="order" value="<? echo $order; ?>"></td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Add"></td></tr>
		  </table>
          </form>
		  <br>
		
		<?		
		}			
		
	
        $query = "select * from builder_sites ORDER BY category,`order` ASC";
		$result = mysql_query ($query)
	     	or die ("Query failed");
        ?>
			<br><br>
			<h2>Current programs</h2>
            <center><table width=90% border=0 cellpadding=2 cellspacing=2>
        	<tr>
	          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Site</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Description</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Category</font></center></td>
              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Order</font></center></td>
			  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	        </tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        	$id = $line["id"];
			$name = $line["name"];
            $desc = $line["desc"];
			$order = $line["order"];
			$cat = $line["category"];

			
        ?><tr>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $name; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $desc; ?></font></center></td>
 		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $categories[$cat]; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $order; ?></font></center></td>
		  <td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
          <form method="POST" action="editbuilder.php#edit">
		  <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Edit">
          </form>
          <form method="POST" action="editbuilder.php">
		  <input type="hidden" name="action" value="delete">
          <input type="hidden" name="id" value="<? echo $id; ?>">
          <input type="submit" value="Delete">
          </form>
          </center>
          </td></tr> <?
        }
        echo "</table></center><br><br>" ;
		
		
		if($_POST['action'] == "edit") {
			echo "<a name=\"edit\"></a>";
			$sql = mysql_query("SELECT * FROM builder_sites WHERE id = '".$_POST['id']."'");
			if(@mysql_num_rows($sql)) {
				$info = mysql_fetch_array($sql);
		?>
		<h2>Edit Site</h2>
		
	
		  <form method="POST" action="editbuilder.php">
		  <input type="hidden" name="action" value="doedit">
		  <input type="hidden" name="id" value="<? echo $_POST['id']; ?>">
		  <table>
		  <tr><td>Name:</td><td><input type="text" name="name" value="<? echo $info['name']; ?>"></td></tr>
		  <tr><td>Description:</td><td><textarea name="desc" cols="30" rows="5"><? echo $info['desc']; ?></textarea></td></tr>
		  <tr><td>Default url:</td><td><input type="text" name="url" value="<? echo $info['url']; ?>"></td></tr>
		  <tr><td>Order:</td><td><input type="text" name="order" value="<? echo $info['order']; ?>"></td></tr>
		  <tr><td>Category:</td><td>
		  <select name="category">
		  <?
		  foreach($categories as $id => $name) {
			if($info['category'] == $id) echo "<option value=\"$id\" SELECTED>$name</option>";
			else echo "<option value=\"$id\">$name</option>";
		  }
		  ?>
		  </select>
		  </td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Add"></td></tr>
		  </table>
          </form>
		
		
		
		<?
			} else echo "<font color=red>Invalid site.</font>";
		} else {
		?>
		
			<h2>Add site</h2>
		
	
		  <form method="POST" action="editbuilder.php">
		  <input type="hidden" name="action" value="add">
		  <table>
		  <tr><td>Name:</td><td><input type="text" name="name"></td></tr>
		  <tr><td>Description:</td><td><textarea name="desc" cols="30" rows="5"></textarea></td></tr>
		  <tr><td>Default url:</td><td><input type="text" name="url"></td></tr>
		  <tr><td>Order:</td><td><input type="text" name="order" value="1"></td></tr>
		  <tr><td>Category:</td><td>
		  <select name="category">
		  <?
		  foreach($categories as $id => $name) {
			echo "<option value=\"$id\">$name</option>";
		  }
		  ?>
		  </select>
		  </td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Add"></td></tr>
		  </table>
          </form>
		
		<?
		}
			
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>