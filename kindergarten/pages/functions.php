<?php 

    session_start();

    $email="";
    $password="";
    $errors=array();
    $first_name="";
    $last_name="";
    $phone="";
    $user_type=0;
    $current_year=date('Y');



    $db=mysqli_connect('localhost','root','','kindergarten');
    if(isLoggedIn()){
    $query_parents="SELECT id, name, lastname from user_info WHERE user_info.id_user_type='3';";
    
    $query_teachers="SELECT id, name, lastname from user_info WHERE user_info.id_user_type='2';";
    $query_groups="SELECT id, name from groups;";
    $id=$_SESSION['user']['id'];
    $query_kids_teacher="SELECT * FROM kid WHERE kid.id_gr=(SELECT id FROM groups WHERE groups.id_teacher=".$id.");";
    $query_kid_parent="SELECT * FROM kid WHERE id_parent='$id';";
    $kids_teacher=mysqli_query($db,$query_kids_teacher);
    $kid_parent=mysqli_query($db, $query_kid_parent);
    $all_parents=mysqli_query($db,$query_parents);
    $all_teachers=mysqli_query($db,$query_teachers);
    $all_groups=mysqli_query($db, $query_groups);

    }
    

    
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }


    if(isset($_POST['login'])){
        login();
    }

    if(isset($_POST['addGroup'])){
        addGroup();
    }

    if(isset($_POST['create'])){
        if ($stmt = $db->prepare('SELECT id, password FROM user_info WHERE email = ?')) {
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                array_push($errors,'Username exists, please choose another!');
            } else {
                register();
            }
            $stmt->close();
        } else {
            array_push($errors,'Could not prepare statement!');
        }
        
    }
    
    if(isset($_POST['addKid'])){
        if ($stmt = $db->prepare('SELECT id FROM kid WHERE pesel = ?')) {
            $stmt->bind_param('s', $_POST['pesel']);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                array_push($errors,'Kid with this PESEL exists, please check your data!');
            } else {
                addKid();
            }
            $stmt->close();
        } else {
            array_push($errors,'Could not prepare statement!');
        }
        
    }
    function isLoggedIn()
    {
	    if (isset($_SESSION['user'])) {
		    return true;
	    }else{
		    return false;
	    }
    }
    function addGroup(){
        global $db, $errors;

        $group=$_POST['group'];
        $id_teacher=intval($_POST['idTeacher']);

        if(empty($group)){
            array_push($errors,"Group Name is required");
        }

        if(empty($id_teacher)){
            array_push($errors,"Teacher is required");
        }
        $first=preg_replace('/[^0-9]/','',$group);
        if($first!=''){
            array_push($errors,'Group Name is not valid!');
        }
        
        if(count($errors)==0){
            $query="INSERT INTO groups (name, id_teacher) VALUES ('$group', '$id_teacher');";
            $results=mysqli_query($db, $query);
            $_SESSION['success']  = "New group successfully created!!";
			header('location: admin_page.php');
        }
    
    }
    function login(){
        global $db, $password, $email, $errors;

        $email=$_POST['email'];
        $password=$_POST['pass'];

        if(empty($email)){
            array_push($errors,"Email is required");
        }

        if(empty($password)){
            array_push($errors,"Password is required");
        } 

        if(count($errors)==0){
            $password=md5($password);
            
            $query="SELECT * FROM user_info WHERE email='$email' AND password='$password' LIMIT 1;";
            $results=mysqli_query($db, $query);
            if(mysqli_num_rows($results)==1){
                $user=mysqli_fetch_assoc($results);

                $_SESSION['user']=$user;
                $_SESSION['success']="You are logged in now";
                echo $user['id_user_type'];
                if($user['id_user_type']==1){
                    header("location: admin_page.php");
                }else if($user['id_user_type']==2){
                    header("location: teacher_page.php");
                }else{
                    header("location: parent_page.php");
                }
            
            }else{
                array_push($errors, "Wrong email/password combination.");
            }
        }
    }
    function display_errors(){
        global $errors;
        if(count($errors)>0){
            echo "<div class='error'>";
        foreach($errors as $error){
            echo $error.'<br>';
            }
            echo "</div>";
        }
    }
    function register(){
        global $db, $password, $email, $errors, $first_name, $last_name ,$phone,$user_type,$current_year;

        $first_name=$_POST['firstN'];
        $last_name=$_POST['lastN'];
        $phone=strval($_POST['phone']);
        $birthday=date('Y-m-d', strtotime($_POST['birthday']));
        $email=$_POST['email'];
        $password=$_POST['password'];
        $user_type=strval($_POST['userType']);
        
    
        if(($current_year-intval(date('Y',strtotime($_POST['birthday']))))>80||($current_year-intval(date('Y',strtotime($_POST['birthday']))))<20){
            array_push($errors,"Your age is not valid");
        }
        if(empty($email)){
            array_push($errors,"Email is required");
        }

        if(empty($password)){
            array_push($errors,"Password is required");
        }
        if(empty($first_name)){
            array_push($errors,"First Name is required");
        }
        if(empty($last_name)){
            array_push($errors,"Last Name is required");
        }
        $first=preg_replace('/[^0-9]/','',$first_name);
        if($first!=''){
            array_push($errors,'First Name is not valid!');
        }
        $second=preg_replace('/[^0-9]/','',$last_name);
        if($second!=''){
            array_push($errors,'Last Name is not valid!');
        }
        if(empty($phone)){
            array_push($errors,"Phone Number is required");
        }
        if(empty($birthday)){
            array_push($errors,"Birthday date is required");
        }
        if(empty($user_type)){
            array_push($errors,"User type is required is required");
        }
        
        if (strlen($password) > 20 || strlen($password) < 5) {
            array_push($errors,'Password must be between 5 and 20 characters long!');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors,'Email is not valid!');
        }
        if(substr($phone,0,3)!='+48'&&strlen($phone)!=12){
            array_push($errors,'Phone Number is not valid!');
        }


        if(count($errors)==0){
            $password=md5($password);
            
            $query="INSERT INTO user_info(name, lastname, birth_date, password, email, phone_number, id_user_type) 
            VALUES ('$first_name', '$last_name', '$birthday', '$password', '$email', '$phone','$user_type');";
            $results=mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
			header('location: admin_page.php');
        }
    }
    function addKid(){
        global $db, $errors, $first_name, $last_name, $current_year;

        $first_name=$_POST['firstN'];
        $last_name=$_POST['lastN'];
        $birthday=strval($_POST['birthday']);
        $startDate=date('Y-m-d', strtotime($_POST['startDate']));
        $id_parent=strval($_POST['idP']);
        $id_group=strval($_POST['idG']);
        $address=$_POST['address'];
        $pesel=$_POST['pesel'];
        
        if(($current_year-intval($_POST['birthday']))>6||($current_year-intval($_POST['birthday']))<3){
            array_push($errors,"Age is not valid");
        }
        if($current_year!=intval(date('Y',strtotime($_POST['startDate'])))){
            array_push($errors,"Start date is not valid");
        }
        if(empty($first_name)){
            array_push($errors,"First Name is required");
        }
        if(empty($last_name)){
            array_push($errors,"Last Name is required");
        }
        if(empty($pesel)){
            array_push($errors,"PESEL is required");
        }
        if(!preg_match('/^[0-9]{11}$/', $pesel)){
            array_push($errors,'PESEL is not valid!');
        }
        if(substr($pesel,0,2)!=substr($birthday,-2)){
            
            array_push($errors,"Birthday date or PESEL is not valid!");
        
        }
        $first=preg_replace('/[^0-9]/','',$first_name);
        if($first!=''){
            array_push($errors,'First Name is not valid!');
        }
        $second=preg_replace('/[^0-9]/','',$last_name);
        if($second!=''){
            array_push($errors,'Last Name is not valid!');
        }
        if(strlen($birthday)!=4){
            array_push($errors,"Birthday year is not valid!");
        }
        if(empty($birthday)){
            array_push($errors,"Birthday year is required");
        }
        if(empty($address)){
            array_push($errors,"Home address is required");
        }
        if(empty($id_group)){
            array_push($errors,"Please, choose group from the list");
        }
        if(empty($id_parent)){
            array_push($errors,"Please, choose parent from the list");
        }
        if(count($errors)==0){
            $gender=getSex($pesel);

            $query="INSERT INTO kid (first_name, last_name, pesel, gender ,birthday, id_gr, address, id_parent, date_start)
            VALUES ('$first_name', '$last_name', '$pesel', '$gender','$birthday',  '$id_group', '$address', '$id_parent', '$startDate');";
            $results=mysqli_query($db, $query);


            $query_id="SELECT id FROM kid WHERE kid.pesel=".$pesel.";";
            $results2=mysqli_query($db,$query_id);
            $id=mysqli_fetch_array(
                $results2,MYSQLI_ASSOC);      
            $kid_id=$id['id'];
            $query_insert_p ="INSERT INTO payments (id_kid, payment_status) VALUES ('$kid_id',0.0)";         
            $res=mysqli_query($db,$query_insert_p);
            
            $_SESSION['success']  = "New user successfully created!!";
			header('location: admin_page.php');
        }else{

        }

    }
    function getSex($p){
        if($p[9]%2==0){
            return "f";
        }else {
            return "m";
        }

    }
    function isAdmin()
    {
	    if (isset($_SESSION['user']) && $_SESSION['user']['id_user_type'] == 1 ) {
		    return true;
	    }else{
		    return false;
	    }
    }

    function isParent()
    {
	    if (isset($_SESSION['user']) && $_SESSION['user']['id_user_type'] == 3 ) {
		    return true;
	    }else{
		    return false;
	    }
    }
    function isTeacher()
    {
	    if (isset($_SESSION['user']) && $_SESSION['user']['id_user_type'] == 2 ) {
		    return true;
	    }else{
		    return false;
	    }
    }

?>