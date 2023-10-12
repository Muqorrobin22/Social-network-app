<?php

//    session_start();
    require_once "header.php";

    echo "<div class='center'>Welcome to Muqorrobin's Nest, ";

    if ($loggedin) {
        echo "$user, you are logged in";
    } else {
        echo "Please sign up or log in";
    }

    echo <<<_END
            </div><br>
           </div>
            <div data-role="footer">
                <h4>Web app from <i> <a href="https://github.com/Muqorrobin22/Social-network-app" 
                target="_blank">Learning PHP & MySql</a> </i></h4>
            </div>
        </body>
        </html>
    _END;


?>