<?php



if(isset($_POST['css']))
    {
        $_POST['css'] = $_SESSION['css'];
         echo "<link rel=\"stylesheet\" href=\"css/".
             $_SESSION['css'].".css\" type=\"text/css\">";

    }
    
    elseif(!isset($_POST['css']))
    {
        $_SESSION['css'] = $_SESSION['css'];
    }
    
    echo"</div>";
echo"<div class=\"footer\">";

echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";
echo "<div><a class=\"button\" href=\"#top\">^</a></div>";

echo"

<form achtion=\"*\" methond=\"post\">




</form>
";

echo"</div>";

?>