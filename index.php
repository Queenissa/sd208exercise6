<?php
    session_start();

    if(isset($_POST['add'])){
        
        $_SESSION['bookmarks'][$_POST['bookmark']] = $_POST['url'];
    }
    if (isset($_POST['clear'])) {
        $_SESSION['bookmarks'] = array();
    }
    if(isset($_POST['clear_bookmark'])){
        unset($_SESSION['bookmarks'][$_POST['bookmark']]);
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark</title>
</head>
<style>
body{
    font-family: verdana;
        }
html{
    background: url("https://storage.googleapis.com/spirituality-health/images/Articles/_articleSummaryImage/Love-Affirmations.jpg?mtime=20170726152439&focal=none&tmtime=20200922001315");
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
       
h1{
    text-align: center;
    color: maroon;
    margin: .5in;
    font-size: 35px;
}
label{
    font-size: 21px;
    color: darkred;
}


.input{
    width: 30%;
    height: 30px;
    border: 1px solid red;
}

.button{
    height: 30px;
    width: 110px;
    background-color: #ffeecc;
    border-radius: 5px;
}
table{
    margin-top: 40px;
    background-color: #ffcc66;
    padding: 70px;
}



</style>
<body>

<form action="" method="post">

<h1>Bookmark</h1>

<center>
<div class="content">
    <div class="bookmark">
        <label for="bname">Bookmark Name</label><br>
        <input type="text" name="bookmark" class="input"><br>
    </div>

<br><br>
    <div class="url">
        <label for="url">URL</label><br>
        <input type="text" name="url" class="input"><br>
    </div>

    <br><br>
    <input type="submit" class="button" name = "add" value="Add Bookmark">
    <input type="submit" class="button" name = "clear" value="Clear">



</div>
</center>


</form>


<center><table>
            <tbody>
            <?php foreach($_SESSION['bookmarks'] as $bookmark_name =>  $bookmark_url ){ ?>
                <tr>
                        <td><a href="<?php echo 'https://'. $bookmark_url; ?>" target="_blank"> <?php echo $bookmark_name;?></a></td> 
                        <form action="" method="POST">
                        <td><input type="hidden" name="bookmark" value="<?php echo $bookmark_name; ?>"></td>
                        <td><input type="submit" value="X" name="clear_bookmark"></td>
                        </form>
                </tr>
               
            <?php }?>
            </tbody>
        </table></center>
    
</body>
</html>