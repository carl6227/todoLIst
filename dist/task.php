<?php
	class tasks
    {
        private $server = "mysql:host=localhost;dbname=to_do_list";
        private $user = "";
        private $password = "";
        private $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        protected $connection;

        //connections
        public function openConnection()
        {
            try {
               
                $this->connection= new PDO(
                    $this->server,
                    $this->user,
                    $this->password,
                    $this->options
                );
               
                return $this->connection;
            } catch (PDOException $error) {
                echo "Erro connection:" . $error->getMessage();
            }
        }
        public function closeConnection()
        {
            $this->$connection= null;
        }

        public function displayData()
        {
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM tasks WHERE deletedAt is null");
            $statement->execute();
            
            $taskCount = $statement->rowCount();
			while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
					echo '<div class="col-xl-3 col-md-6 undeletedTask">
					<div class="card bg-info text-white mb-4">
					 
						<div class="card-body ml-4">
							
						<p>	'.$row[1].'</p></div>
						<divclass="card-footer d-flex align-items-center justify-content-between">   
							<div class="container-fluid float-right" style="margin-right:-40px;">
						   
								<div class="row"> <input type="checkbox" class="form-check-input" id="exampleCheck1">
									<small>Mark as done</small>
									<form method="post">
									
										<input type="hidden" name="ID" value="'.$row[0].'">
										<button  type="button"  class="btn btn-outline-secondary btn-sm ml-3 text-light"data-toggle="modal" data-target="#exampleModalCenter" ></ion-icon><ion-icon class="ml-1" name="create-outline"></ion-icon></button>
										<button type="submit" class="btn btn-outline-secondary btn-sm text-light ml-2	" name="delete"><ion-icon   name="trash-outline"></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>';
				 
			}
        }


		public function displayTrash()
        {
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM tasks WHERE deletedAt is not null");
            $statement->execute();
            
            $taskCount = $statement->rowCount();
			while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
					echo '<div class="col-xl-3 col-md-6 deletedTask" style="display:none">
					<div class="card bg-info text-white mb-4">
					 
						<div class="card-body ml-4">
							
						<p>	'.$row[1].'</p></div>
						<div
							class="card-footer d-flex align-items-center justify-content-between">   
						<div class="container-fluid float-right" style="margin-right:-40px;">
							<div class="row"> 
							<small>Retrieve</small>
							<form method="post">
								<input type="hidden" name="ID" value="'.$row[0].'">
								<button type="submit" class=" ml-5 btn btn-outline-secondary btn-sm text-light" name="delete"><ion-icon   name="trash-outline"></button>
						
							</div>
							  </div>
						</div>
					</div>
				</div>';
				 
			}
        }

		public function addTask(){
            if(isset($_POST['addTask']) && $_POST['task'] !=""){
                $dateCreated = date('Y-m-d H:i:s');
                 $task=$_POST['task'];
                 $connection =$this->openConnection();
                 $statement=$connection->prepare("INSERT INTO  tasks(todo,createdAt) VALUES (?,?)");
                 $statement->execute([$task,$dateCreated
				 ]);
            }
         }

		 public function deleteTask(){
            if(isset($_POST['delete'])){
                $dateDeleted = date('Y-m-d H:i:s');
                 $ID=$_POST['ID'];
                 $connection =$this->openConnection();
                 $statement=$connection->prepare("UPDATE   tasks SET deletedAt=? WHERE id=$ID");
                 $statement->execute([$dateDeleted]);
            }
         }
       
		 public function updateTask(){
            if(isset($_POST['edit'])){
                 $dateUpdate = date('Y-m-d H:i:s');
				 $newTask=$_POST['newTask'];
                 $ID= $_POST['oldTask'];
                 $connection =$this->openConnection();
                 $statement=$connection->prepare("UPDATE   tasks SET updatedAt=?, todo=? WHERE todo='$ID'");
                 $statement->execute([$dateUpdate,$newTask]);
            }
         }
	}
       
        
?>



