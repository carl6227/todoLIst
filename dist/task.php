<?php

	class tasks
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "to_do_list";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT to_do FROM information";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
                   
                   
                   echo '<div class="col-xl-3 col-md-6">
                   <div class="card bg-info text-white mb-4">
                    
                       <div class="card-body ml-4">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1">
                           '.$row["to_do"].'</div>
                       <div
                           class="card-footer d-flex align-items-center justify-content-between"
                       >
                          
                       <div class="container-fluid float-right" style="margin-right:-40px;">
                          
                           <ul class="nav float-right"> 
                             <div class="kebab">
                               <figure></figure>
                               <figure class="middle"></figure>
                               <p class="cross">x</p>
                               <figure></figure> 
                               <ul class="m-dropdown">  
                                 <li><a href="http://www.g.com">Art</a></li>
                                 <li><a href="http://www.g.com">Coding</a></li>
                                 <li><a href="http://www.g.com">Design</a></li>
                                 <li><a href="http://www.g.com">Web Development</a></li>
                               </ul>
                             </div>
                           </ul>
                             </div>
                       </div>
                   </div>
               </div>';
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM customers WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE customers SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM customers WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}

	}
?>