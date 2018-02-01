<?php

class Users {
/** USERS CLASS **/

    //Hash and encode password
    public static function hash($code){
        return password_hash(($code), PASSWORD_DEFAULT, ['cost' => 12]);
    }

    //Verify password
    public static function verify($code){
        return password_verify($code, Users::hash($code));
    }

    //Sanitize string 
    public static function cleanString($code)
    {
        return htmlspecialchars(strip_tags(filter_var($code, FILTER_SANITIZE_STRING)));
    }

    //Sanitize Email 
    public static function cleanEmail($code)
    {
        return htmlspecialchars(strip_tags(filter_var($code, FILTER_SANITIZE_EMAIL)));
    }


    //Login Function
    public static function login()
    {
         $connection = Database::connection();
        
        if(isset($_POST) && !empty($_POST))
        {

            $error = "";
            
            
            $signName= htmlspecialchars(strip_tags($_POST['user']));
            $postPass = htmlspecialchars(strip_tags($_POST['password']));
            //I would use the commented hashing function to hash password but for the sake of simplicity and since there is no registration form for this test, plaintext is used.
            //$vspass = Users::verify($_POST['password']);
            
            $regTime = time();
            
            $selectData = $connection->prepare("SELECT * FROM `users` WHERE `email`=:u AND `password`=:p");
            $selectData->bindParam(':u', $signName);
            $selectData->bindParam(':p', $postPass);
            if($selectData->execute())
            {
                if(empty($_POST))
                {
                    $error .= '<li> Input Login Details </li>';
                }


                if($selectData->rowCount() > 0)
                {
                    $userSes = $selectData->fetch();
                    $_SESSION['id'] = $userSes['id'];

                    if(isset($_SESSION['id']))
                    {
                        header("location: profile.php");
                    }
                    else
                    {
                        $error .= 'session error';
                    }
                }
                else
                {
                    $error .= '<li> Incorrect Details </li>';
                }
                
            }

            if(empty($error))
            {

                
            }
            else
            {
                echo 'Your are unable to login due to the following <br /> <ol>'.$error.'</ol> ';
            }

        }
        
    }

    //Allow access for logged in user
    public static function loggedIn()
    {

        if(isset($_SESSION['id']) && $_SESSION['id'] > 0)
        {
           header("location: profile.php");
        }
        else
        {
            return false;
        }

    }

    //Check login status
    public static function checkLog()
    {
        if(!isset($_SESSION['id']) || empty($_SESSION['id']))
        {
            header("location: signin.php");
        }
    }

    //Fetch user details
    public static function detail()
    {
        $connection = Database::connection();
        
        $myInfo = $connection->prepare("SELECT * FROM `users` WHERE `id`=:i");
        $myInfo->bindParam(':i', $_SESSION['id']);
        $myInfo->execute();
        $users = $myInfo->fetch();
        return $users;

    }

    //Logout function
    public static function logout()
    {
        session_destroy();
        session_unset();
        header("Location: index.php");

    }

    //Customer Registration Function
    public static function regCustomer()
    {
        $connection = Database::connection();

        $error = '';

        if(isset($_POST['name']))
        {
            $name = Users::cleanString($_POST['name']);
            $email = Users::cleanEmail($_POST['email']);
            $phone = Users::cleanString($_POST['tel']);
            $date = Users::cleanString(date("Y-m-d",mktime($_POST['date'])));
            $date2 = Users::cleanString(date("Y-d-m",strtotime($_POST['date'])));
            $city = Users::cleanString($_POST['city']);
            $pin = Users::cleanString($_POST['pin']);

            $sentTime = (strtotime($date2));

            

            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error .= '<li>Invalid Email Format  </li>';
            }

            if(empty($_SESSION['pic']))
            {
                $error .= '<li>You must first upload an image</li>';
            }

            if($sentTime > time())
            {
                $error .= '<li>The Submited date Cannot be in the future</li>';  
            }

            if(empty($name) || empty($email) || empty($phone) || empty($date) || empty($city) || empty($pin))
            {
                $error .= '<li>All Fields are Required!!</li>';  
            }

            $selectCust = $connection->prepare("SELECT * FROM `customars` WHERE `email`=:e");
            $selectCust->bindParam(':e', $email);
            if($selectCust->execute())

            {
                if($selectCust->rowCount() > 0)
                {
                    $error .= '<li>User With the inputed email Exists</li>';
                }
                if(!preg_match("/(\+[0-9]{1,3}|0)[0-9]{3}( ){0,1}[0-9]{7,8}\b/", $phone))
                {
                    $error .= '<li>International phone format required</li>';
                }

                if(empty($error))
                {
                    $updateCust = $connection->prepare("UPDATE `customars` SET email = :e, fullname = :f, phone = :p, location = :l, date = :d, pin = :pi WHERE `pic` = :ses ");
                    $updateCust->bindParam(':e', $email);
                    $updateCust->bindParam(':f', $name);
                    $updateCust->bindParam(':p', $phone);
                    $updateCust->bindParam(':l', $city);
                    $updateCust->bindParam(':d', $date);
                    $updateCust->bindParam(':pi', $pin);
                    $updateCust->bindParam(':ses', $_SESSION['pic']);
                    if($updateCust->execute())
                    {
                        echo '<span class="text-success">Customer Registered</span>';
                        unset($_SESSION['pic']);
                    }
                }

                else
                {
                    echo '<span class="text-warning">The following errors occured </span> <br /> <ol class="text-danger">'.$error.'</ol>';
                }
            }


            
        }
                

        if (isset($_FILES['file']['name'])) 
        {
            if (0 < $_FILES['file']['error']) 
            {
                echo 'File upload was Unsuccessful';
            } 
            else 
            {
                if (file_exists('avatar/' . $_FILES['file']['name'])) 
                {
                    echo 'File Already Uploaded';
                } 
                else 
                {
                    $filename = uniqid().rand(1000,5000).'.'.'png';
                    if(move_uploaded_file($_FILES['file']['tmp_name'], 'avatar/' . $filename))
                    {
                        $_SESSION['pic'] = $filename;
                        $insertPic = $connection->prepare("INSERT INTO `customars`(pic) VALUES(:p)");
                        $insertPic->bindParam(':p', $_SESSION['pic']);
                        if($insertPic->execute())
                        {
                            echo 'File upload was Successful';
                        }
                    }
                    else 
                    {
                        echo 'Please choose a file';
                    }
                    

                    
                }
            }
        } 
            
        
    }

    //Generate Pin
    public static function pin()
    {
        return rand(1000,9999);
    }
    
    //Fetch transaction page details

    public static function trans()
    {
        $connection = Database::connection();

        $selectDash = $connection->prepare("SELECT * FROM `transactions` WHERE `id`>:o");
        $selectDash->bindValue(':o', 0);
        $selectDash->execute();
        
        $_SESSION['trans'] = $selectDash->rowCount();

        $selectUsers = $connection->prepare("SELECT * FROM `users` WHERE `id`>:o");
        $selectUsers->bindValue(':o', 0);
        $selectUsers->execute();

        $_SESSION['users'] = $selectUsers->rowCount();
        
        $selectCust = $connection->prepare("SELECT * FROM `customars` WHERE `id`>:o");
        $selectCust->bindValue(':o', 0);
        $selectCust->execute();

        $_SESSION['cust'] = $selectCust->rowCount();

        //January Transactions

        $janSelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $janSelect->bindValue(':m', 1);
        $janSelect->bindValue(':u', 3);
        $janSelect->execute();

        $_SESSION['jan'] = $janSelect->rowCount();

        //February Transactions

        $febSelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $febSelect->bindValue(':m', 2);
        $febSelect->bindValue(':u', 3);
        $febSelect->execute();

        $_SESSION['feb'] = $febSelect->rowCount();

        //March Transactions

        $marSelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $marSelect->bindValue(':m', 3);
        $marSelect->bindValue(':u', 3);
        $marSelect->execute();

        $_SESSION['mar'] = $marSelect->rowCount();

        //April Transactions

        $aprilSelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $aprilSelect->bindValue(':m', 4);
        $aprilSelect->bindValue(':u', 3);
        $aprilSelect->execute();

        $_SESSION['april'] = $aprilSelect->rowCount();

        //May Transactions

        $maySelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $maySelect->bindValue(':m', 5);
        $maySelect->bindValue(':u', 3);
        $maySelect->execute();

        $_SESSION['may'] = $maySelect->rowCount();

        //June Transactions

        $juneSelect = $connection->prepare("SELECT * FROM `transactions` WHERE `month`=:m AND `customer`=:u");
        $juneSelect->bindValue(':m', 6);
        $juneSelect->bindValue(':u', 3);
        $juneSelect->execute();

        $_SESSION['june'] = $juneSelect->rowCount();



        
    }

    public static function dispCust()
    {   
        if(isset($_GET))
        {
            $connection = Database::connection();

            $custGet = $connection->prepare("SELECT * FROM `customars` WHERE `id`>:o");
            $custGet->bindValue(':o', 0);
            $custGet->execute();

            $one = 1;

            while($show = $custGet->fetch())
            {
                echo '<tr> <td>'.$one.'</td> <td>'.$show['email'].'</td> <td>'.$show['fullname'].'</td> <td>'.$show['phone'].'</td> </tr>';

                $one++;
            }
        }


    }

}
