<html>
    <head>
    <meta charset="UTF-8" />
        <title>Saving Movie Details...</title>
    </head>
    <body>
       
        <?php
            //step assigning names
            $title=$_POST['title'];
            $rating=$_POST['rating'];
            $releaseYear=$_POST['releaseYear'];
            $genreId=$_POST['genreId'];
            $movieId = $_POST['movieId'];
            $ok=true;

            //input validation check no errors before saving
            if(empty($title)||strlen($title)>100){
                echo "Title Is Required <br>";
                $ok=false;
            }

            if(empty($rating)||strlen($rating)>10){
                echo "Rating Is Required <br>";
                $ok=false;
            }

            if(empty($releaseYear)){
                echo "Release Year Is Required <br>";
                $ok=false;
            }
            else{
                if(!is_numeric($releaseYear)){
                    echo "Relase Year Must Be numeric";
                    $ok=false;
                }
                else{
                    if($releaseYear<1900){
                        echo "Release Year must be 1900 or greater";
                        $ok=false;
                    }
                }
            }

            //ok=true input saved
            if($ok==true){
                $db=new PDO('mysql:host=172.31.22.43;dbname=Jashan200484319','Jashan200484319','AZ4ipZV_8a');
                // $db=new PDO('mysql:hostname=127.0.0.1;dbname=jashan200484319','root','');
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                //declaring parameters
                // $sql="INSERT INTO movies(title, rating, releaseYear,genreId)VALUES(:title, :rating,:releaseYear,:genreId)";
                if (empty($movieId)) {
                    // set up an SQL INSERT command w/placeholders for our values
                    $sql = "INSERT INTO movies (title, rating, releaseYear, genreId) 
                        VALUES (:title, :rating, :releaseYear, :genreId)";
                }
                else {
                    $sql = "UPDATE movies SET title = :title, rating = :rating, releaseYear = :releaseYear,
                        genreId = :genreId WHERE movieId = :movieId";
                }
    
                //prepare database
                $cmd=$db->PREPARE($sql);
    
                //injecting vales
                $cmd->bindParam(':title',$title, PDO::PARAM_STR,100);
                $cmd->bindParam(':rating',$rating, PDO:: PARAM_STR,10);
                $cmd->bindParam(':releaseYear',$releaseYear, PDO:: PARAM_INT);
                $cmd->bindParam(':genreId',$genreId, PDO::PARAM_INT);
                if (!empty($movieId)) {
                    $cmd->bindParam(':movieId', $movieId, PDO::PARAM_INT);
                }

                $cmd->execute();
                
                
                $db=null;
    
                echo('Movie Saved!');
            
            };
        ?>
        
    </body>
</html>