<html>

    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head> 

    <body>

        <form action="" method="POST">
        <center>
        <div class="handler">   
            
            <h1>"Dari dan Untuk" Web</h1>
            <label> Untuk: <br>
            <input type="text" name="Name" class="Input" style="width: 225px" required>
            </label>
            <br>
            <label> Dari: <br>
            <input type="text" name="Dari" class="Input" style="width: 225px" required>
            </label>
            <br>
            <label> Comment: <br>        
            <textarea name="Comment" class="Input" rows="10" cols="50"  required></textarea>
            </label>
            <br>
            <input type="submit" name="Submit" value="Submit Comment" class="Submit">
            <br>
        </div>
        </center>
    </form>

 </body>

</html>

<?php
    
    if($_POST['Submit']){
        echo "<h1>Your comment has been submitted!</h1>";

        $Name = $_POST['Name'];
        $Dari = $_POST['Dari'];
        $Comment = $_POST['Comment'];

        #Get old comments
        $old = fopen("comments.txt", "r+t");
        $old_comments = fread($old, 1024);

        #Delete everything, write down new and old comments
        $write = fopen("comments.txt", "w+");
        $string = "<div class=\"box\"> <b>Untuk: ".$Name."<br><br>Dari</b>: ".$Dari."<br><br><b>Komentar: </b>".$Comment."</div><br>".$old_comments;
         fwrite($write, $string);
        fclose($write);
        fclose($old);
    }

    #Read comments
    $read = fopen("comments.txt", "r+t");
    echo "<p class= \"Comments\";'>"."<br><br>Forum".fread($read, 1024)."</p>";
    #echo "<p class= \"Content\";'>".fread($read, 1024)."</p>";
    fclose($read);

?>