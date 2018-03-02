<?php
session_start();
function op($data){
	echo "<pre>";
	print_r($data);
	die();
}
class Model {
	protected $db;
	public $errors = array();

	public function __construct(){
		include_once "config.php";

		$this->db = $db;
		$this->restricAccess();
		$this->getProductListener();
		$this->loadYearlySaleListener();
		$this->loadMonthlySaleListener();
	}	

	public function loadMonthlySaleListener(){
		if(isset($_POST['loadMonthlySale'])){
			$year = date("Y");

			if(isset($_POST['year'])){
				$year = $_POST['year'];
			}
			
			$this->getMonthlySaleByYear($year);
		}
	}

	public function loadYearlySaleListener(){
		if(isset($_POST['loadYearlySale'])){
			$this->getYearlySales();
		}
	}

	public function getMonthlySaleByYear($year) {
		$sql = "SELECT t1.id,t1.packagenum,DATE_FORMAT(t1.date, '%m') as month,count(t1.packagenum) as total, t2.name
			FROM reservepackage t1
			LEFT JOIN packages t2 ON t1.packagenum = t2.id
			WHERE t1.status = 2
			and  YEAR(t1.date) = YEAR('". $year ."-01-01')
			GROUP BY t1.packagenum,MONTH(t1.date)";

		$records = $this->db->query($sql)->fetchAll();
		$data = array();

		foreach($records as $idx => $record) {
			$data[$record['packagenum']]['name'] = $record['name'];
			$data[$record['packagenum']]['data'][0] = 0;
			$data[$record['packagenum']]['data'][1] = 0;
			$data[$record['packagenum']]['data'][2] = 0;
			$data[$record['packagenum']]['data'][3] = 0;
			$data[$record['packagenum']]['data'][4] = 0;
			$data[$record['packagenum']]['data'][5] = 0;
			$data[$record['packagenum']]['data'][6] = 0;
			$data[$record['packagenum']]['data'][7] = 0;
			$data[$record['packagenum']]['data'][8] = 0;
			$data[$record['packagenum']]['data'][9] = 0;
			$data[$record['packagenum']]['data'][10] = 0;
			$data[$record['packagenum']]['data'][11] = 0;

			$month = $record['month'] -1;
			$data[$record['packagenum']]['data'][$month] = (int)$record['total'];
		}

		die(json_encode(array_values($data)));
	}

	public function getYearlySales(){
		$sql = "SELECT t1.id,t1.packagenum,DATE_FORMAT(t1.date, '%Y') as year,count(t1.packagenum) as total, t2.name
			FROM reservepackage t1
			LEFT JOIN packages t2 ON t1.packagenum = t2.id
			WHERE t1.status = 2
			GROUP BY t1.packagenum,YEAR(t1.date)";

		$records = $this->db->query($sql)->fetchAll();

		$data = array();
		$start = "";
		$end = 0;

		foreach($records as $idx => $record) {
			if($start == ""){
				$start = $record['year'];
			}
			if($record['year'] > $end){
				$end = $record['year'];
			}
			$data[$record['packagenum']]['start'] = $start;
			$data[$record['packagenum']]['end'] = $end;
			$data[$record['packagenum']]['name'] = $record['name'];
			$data[$record['packagenum']]['data'][] = (int)$record['total'];
		}

		$all = array(
			"start" => $start,
			"end" => $end,
			"data" => array_values($data)
		);

		die(json_encode(array_values($data)));
	}

	public function restricAccessAdmin(){
		if(isset($_SESSION['sess_userrole'])){
			if($_SESSION['sess_userrole'] != "admin"){
				header("Location:../index.php");
			}
		} else {
			header("Location:../index.php");
		}
	}
	public function getProductListener(){
		if(isset($_POST['getProducts'])){
			$this->filterReservePackage($_POST);
		}
	}

	public function filterReservePackage($data, $csv = false) {
		$from = date_format(date_create($data['from']), "Y-m-d");
		$to = date_format(date_create($data['to']), "Y-m-d");
		$packages = "";
		
		if(isset($_GET['products'])){
			$packages = $_GET['products'];
		} else {
			$packages = implode(",", $data['products']);
		}
		
		$sql = "
			SELECT t1.*,t2.name
			FROM reservepackage t1
			LEFT JOIN packages t2 ON t1.packagenum = t2.id
			WHERE  (t1.status = '". $data['status']."' )
				AND (t1.packagenum IN (".$packages."))
				AND (t1.date BETWEEN '".$from."' AND '".$to."')";
		$records = $this->db->query($sql)->fetchAll();

		if($csv == true){
			return $records;
		}

		die(json_encode(array("result" => $records)));
	}

	public function getAllPackages(){
		return $this->db->query("
				SELECT *
				FROM packages
			")->fetchAll();
	}

	public function getReservePackageByStatus($status){
		$records = $this->db->query("
				SELECT count(id) AS total
				FROM reservepackage
				WHERE status = ". $status . "
			")->fetchAll();

		return reset($records);
	}

	public function getReservePackages(){
		$sql = "
			SELECT t1.*, t2.name
			FROM reservepackage t1
			LEFT JOIN packages t2 ON t1.packagenum = t2.id
			ORDER BY t1.status 
		";

		return $this->db->query($sql)->fetchAll();

	}


	public function array2csv(array &$array){
	   if (count($array) == 0) {
	     return null;
	   }

	   ob_start();
	   
	   $df = fopen("php://output", 'w');
	   
	   // fputcsv($df, array_keys(reset($array)));
	   foreach ($array as $row) {
	      fputcsv($df, $row);
	   }
	   
	   fclose($df);
	   
	   return ob_get_clean();
	}
	
	public function exportCSVListener($data){
			$users = array();
			$users[] = array("Package Number", "Name", "Date Purchased");

			foreach($data as $idx => $user) {
				$users[] = array($user['packagenum'], $user['firstname'], $user['date']);
			}
			$this->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
			echo $this->array2csv(array_values($users));
			die();
	}

	public function download_send_headers($filename) {
	    // disable caching
	    $now = gmdate("D, d M Y H:i:s");
	    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
	    header("Last-Modified: {$now} GMT");

	    // force download  
	    header("Content-Type: application/force-download");
	    header("Content-Type: application/octet-stream");
	    header("Content-Type: application/download");

	    // disposition / encoding on response body
	    header("Content-Disposition: attachment;filename={$filename}");
	    header("Content-Transfer-Encoding: binary");
	}


	public function restricAccess(){
		$url = explode("/", $_SERVER['REQUEST_URI']);
		$url = end($url);

		switch($url){
			case "all.php";
			case "preview.php";
				if(!isset($_SESSION['user'])){
					header("Location:index.php");
				} 
			break;
			case "addnew.php";
				if(!isset($_SESSION['user'])){
					header("Location:index.php");
				} else {
					if($_SESSION['user']['type'] != "admin"){
						header("Location:index.php");
					}
				}
			break;
		}
	}


	//todo delete later
	
	public function getAllSliderByYearListener(){
		if(isset($_POST['getAllSliderByYear'])){
			$year = $_POST['year'];

			$records =  $this->db->query("
				SELECT t1.*, t2.filename FROM slider t1
				LEFT JOIN photo t2 on t1.photoid = t2.id
				where YEAR(t1.showing) = ".$year."
				")->fetchAll();

			$filtered = array();

			if($records == true){
				foreach($records as $idx => $row){
					$filtered[$idx]['id'] = $row['id'];
					$filtered[$idx]['title'] = $row['title'];
					$filtered[$idx]['filename'] = $row['filename'];
					$filtered[$idx]['description'] = $row['description'];
					$filtered[$idx]['genre'] = $row['genre'];
					$filtered[$idx]['showing'] = $row['showing'];
				}

			}

			die(json_encode(array("result" => $filtered)));
		}
	}
	public function sendMessageListener(){
		if(isset($_POST['sendMessage'])){
			$msg = wordwrap($_POST['message'],70);

			$msg .= "      ".$_POST['email'];

			// send email
			mail("Dianemarjorie.go@benilde.edu.ph","Usapang ROMCOM",$_POST['message']);

			die(json_encode(array("updated" => true)));
		}
	}

	public function findMovieByTitle($title) {
		return $this->db->query("
				SELECT t1.*, t2.filename FROM slider t1
				LEFT JOIN photo t2 on t1.photoid = t2.id
				where title LIKE '%".$title."%'
			")->fetchAll();
	}
	public function getAbout(){
		return $this->db->query("
				SELECT * 
				FROM about
				WHERE id = 1
			")->fetch();
	}
	public function UpdateAboutListener(){
		if(isset($_POST['updateAbout'])){
			$stmnt = $this->db
				->prepare("UPDATE about SET content =? WHERE id = ?");
			$stmnt->execute(array($_POST['html'],  1));

			die(json_encode(array("updated" => true)));
		}
	}

	public function getCommentBySliderId($id) {
		return $this->db->query("
				SELECT t1.*,t2.username
				FROM comment t1
				LEFT JOIN user t2 ON t1.userid = t2.id
				WHERE t1.sliderId = ". $id ."
			")->fetchAll();
	}
	public function addCommentListener(){
		if(isset($_POST['addComment'])){
			$postId = $_POST['id'];
			$comment = $_POST['comment'];
			$userId = $_SESSION['user']['id'];

			$stmnt = $this->db->prepare(
				"INSERT INTO comment(id,userid,sliderid, comment) VALUES(?,?,?,?)"
				)->execute(array(null, $userId,$postId,$comment));

			die(json_encode(array("added"=>true, "username"=> $_SESSION['user']['username'])));
		}
	}
	public function getSliderById($id) {
		return $this->db->query("
			SELECT t1.*, t2.filename FROM slider t1
			LEFT JOIN photo t2 on t1.photoid = t2.id
			where t1.id=".$id." LIMIT 1")->fetch();

	}

	public function deleteSlideListener(){
		if(isset($_POST['deleteSlide'])){
			$id = $_POST['id'];

			$this->db->prepare("DELETE FROM slider WHERE id=?")->execute(array($id));

			die(json_encode(array(true)));
		}
	}

	public function getAllSlider(){
		return $this->db->query("
			SELECT t1.*, t2.filename FROM slider t1
			LEFT JOIN photo t2 on t1.photoid = t2.id
			where t1.title !=''
			");
	}
	public function addSlideListener(){
		if(isset($_POST['addSlider'])){
			$title 	= $_POST['title'];
			$desc 	= $_POST['description'];
			$id 	= $_POST['id'];
			$genre 	= $_POST['genre'];
			$director 	= $_POST['director'];
			$showing 	= $_POST['showing'];

			$stmnt = $this->db->prepare("UPDATE slider SET title =?, description = ?,genre= ? ,showing=?, director = ? WHERE photoid = ?");
			$stmnt->execute(array($title, $desc, $genre, $showing,$director,$id));

			die(json_encode(array("updated" => true)));
		}
	}

	public function uploadSliderListener(){
		$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
		$isReady = (isset($_GET['sliderPath'])) ? $_GET['sliderPath'] : null;
			
		if(isset($_GET['sliderPath'])){
			if (!file_exists('uploads/photos')) {
			    mkdir('uploads/photos/', 0777, true);
			}

			if ($fn) {
				//pag nag drag&drop
				list($file, $html, $path) =  $this->getPhotoPath($fn, true);

				// var_dump($fn);
				file_put_contents(
					'uploads/photos/'. $file,
					file_get_contents('php://input')
				);

			} else {
				//browse
				$files = $_FILES['fileselect'];

				foreach ($files['error'] as $id => $err) {
					if ($err == UPLOAD_ERR_OK) {
						list($file, $html, $path) = $this->getPhotoPath($files['name'][$id], true);

						move_uploaded_file(
							$files['tmp_name'][$id],
							'uploads/photos/'.$file
						);
					} 
				}

			}
		}

	}

	public function viewActivityListener(){
		if(isset($_POST['viewActivity'])){
			$id = $_POST['id'];
			$activity = array();
			$records = $this->getUserActivity($id);

			if($records == true){
				foreach($records as $idx => $row){
					$activity[$idx]['name'] = $row['name'];
					$activity[$idx]['date'] = $row['date'];
					$activity[$idx]['score'] = $row['score'];
					$activity[$idx]['wrong'] = $row['wrong'];
					$activity[$idx]['cover'] = $row['cover'];
					$activity[$idx]['type'] = $row['type'];
				}

			}

			die(json_encode(array("result" => $activity)));
		}
	}

	public function getInfoById($id){
		return $this->db->query("SELECT * FROM info WHERE userid = ".$id." LIMIT 1")->fetch();
	}

	public function updateStudentInfoListener(){
		if(isset($_POST['updateStudentInfo'])){
			$fname 	= $_POST['firstname'];
			$lname 	= $_POST['lastname'];
			$mname 	= $_POST['middlename'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$dob 	= $_POST['dob'];
			$nationality 	= $_POST['nationality'];
			$religion 	= $_POST['religion'];
			$address 	= $_POST['address'];
			$weight 	= $_POST['weight'];
			$height 	= $_POST['height'];
			$userId 	= $_SESSION['user']['id'];
			
			$exists = $this->db->query("SELECT * FROM info WHERE userid = ".$userId." LIMIT 1")->fetch();

			if($exists == true){
				$stmnt = $this->db->prepare(
						"UPDATE info 
							SET firstname = ?, lastname = ?,middlename = ?,
							age = ?, sex = ?, dob = ?, religion = ?, address = ? ,
							nationality = ?, weight = ?, height = ?
							WHERE userid = ?
						")->execute(array($fname,$lname,$mname,$age,$gender,date("Y-m-d", strtotime($dob)),
							$religion,$address,$nationality,$weight,$height, $userId));

					die(json_encode(array("status" => "Record is Updated")));

			} else {
				$stmnt = $this->db->query(
				// $stmnt = (
						"INSERT INTO info
						VALUES(NULL, 
							'".$fname."',
							'".$lname."',
							'".$mname."',
							'".$age."',
							'".$gender."',
							'".date("Y-m-d",strtotime($dob))."',
							'".$religion."',
							'".$address."',
							'".$nationality."',
							'".$weight."',
							'".$height."',
							".$userId.")"
					);

				die(json_encode(array("status" => "Record is Updated")));
			}
			
		}
	}

	public function updateLearningListener(){
		if(isset($_POST['updateExam'])){
			$userId = $_POST['userid'];
			$score 	= $_POST['score'];
			$wrong 	= $_POST['wrong'];
			$gameId = $_POST['gameid'];

			$stmnt = $this->db->prepare(
				"INSERT INTO exams(userid,score,wrong, gameid) VALUES(?,?,?,?)"
				)->execute(array($userId, $score,$wrong,$gameId));

			die(json_encode(array("added"=>true)));
		}
	}

	public function getPhotoPath($filename, $id = false){
		$file 	= explode(".", $filename);
		$ext 	= end($file);
		$path 	= "";


		$videoExt = array("bmp", "jpg", "png","jpeg");

		if(in_array($ext, $videoExt)){
			$path = md5($filename.time());

			if (!file_exists('uploads/photos')) {
			    mkdir('uploads/photos/', 0777, true);
			}

			if($id != false){
				$slideId = $this->addPhoto($path.".".$ext, $id);
				$this->addSlide($slideId);
				echo $slideId;

			} else {
				//add new record
				$this->addPhoto($path.".".$ext);
				//return html to js as response
				echo "uploads/photos/". $path.".".$ext;
			
			}

			
			return array($path.".".$ext, true, $path);
		}
	}

	public function ajaxUploadPhotoListener(){
		$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
		$isReady = (isset($_GET['photoPath'])) ? $_GET['photoPath'] : null;
			
		if(isset($_GET['photoPath'])){
			if (!file_exists('uploads/photos')) {
			    mkdir('uploads/photos/', 0777, true);
			}

			if ($fn) {
				//pag nag drag&drop
				list($file, $html, $path) =  $this->getPhotoPath($fn);

				// var_dump($fn);
				file_put_contents(
					'uploads/photos/'. $file,
					file_get_contents('php://input')
				);

			} else {
				//browse
				$files = $_FILES['fileselect'];

				foreach ($files['error'] as $id => $err) {
					if ($err == UPLOAD_ERR_OK) {
						list($file, $html, $path) = $this->getPhotoPath($files['name'][$id]);

						move_uploaded_file(
							$files['tmp_name'][$id],
							'uploads/photos/'.$file
						);
					} 
				}

			}
		}
	}

	public function approvePendingListener(){
		if(isset($_POST['approve'])){
			$stmnt = $this->db->prepare("UPDATE user SET active = 1 WHERE id = ?")->execute(array($_POST['id']));
			$count = $this->getPendingApprovalCount();
			die(json_encode(array("count"=>$count['total'])));
		}
	}

	public function updateSlideListener(){
		if(isset($_POST['updateSlide'])){
			$id 		= $_POST['id'];
			$isSlide 	= $_POST['isSlide'];

			$this->db->prepare("
				UPDATE game SET isslideshow = ? WHERE id = ?
				")->execute(array($isSlide, $id));
			
			die(json_encode(array(true)));
		} 
	}
	
	public function deletePhotoListener(){
		if(isset($_POST['deletePhoto'])){
			$id = $_POST['id'];

			$this->db->prepare("DELETE FROM photo WHERE id =?")->execute(array($id));

			die(json_encode(array("deleted" => true)));
		}
	}

	public function deleteGameListener(){
		if(isset($_POST['deleteGame'])){
			$id = $_POST['id'];

			$this->db->prepare("DELETE FROM game WHERE id =?")->execute(array($id));

			die(json_encode(array("deleted" => true)));
		}
	}



	public function getHTML($filename, $isReady){
		$file 	= explode(".", $filename);
		$ext 	= end($file);
		$path 	= "";

		if(($ext == "html") OR ($ext == "phtml")){
			$path = md5($filename.time());

			if (!file_exists('uploads/'.$path)) {
			    mkdir('uploads/'.$path.'/', 0777, true);
			}

			//add new record
			$this->addGame($path.".".$ext);

			//return html to js as response
			echo 'uploads/'.$path."/". $path.".".$ext;
			
			return array($path.".".$ext, true, $path);
		} else {
			$videoExt = array("mp4","mov","wmv","flv","mov");

			if(in_array($ext, $videoExt)){
				$path = md5($filename.time());

				if (!file_exists('uploads/'.$path)) {
				    mkdir('uploads/'.$path.'/', 0777, true);
				}

				//add new record
				$this->addGame($path.".".$ext);

				//return html to js as response
				echo 'uploads/'.$path."/". $path.".".$ext;
				
				return array($path.".".$ext, true, $path);
			}
		}

		if($isReady != null){
			$path = explode("/", $isReady);

			if(strtolower($file[0]) == "cover"){
				$this->updateCover(end($path), $filename);
			}

			return array($filename, true, $path[1]);
		} 

		return array($filename, false, $path);
	}

	public function ajaxUploadListener(){
		$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
		$isReady = (isset($_GET['path'])) ? $_GET['path'] : null;
		
		if(isset($_GET['path'])){
			if ($fn) {
				//pag nag drag&drop
				list($file, $html, $path) = $this->getHTML($fn, $isReady);

				file_put_contents(
					'uploads/'.$path."/". $file,
					file_get_contents('php://input')
				);

			} else {
				//browse
				$files = $_FILES['fileselect'];

				foreach ($files['error'] as $id => $err) {
					if ($err == UPLOAD_ERR_OK) {
						list($file, $html, $path) = $this->getHTML($files['name'][$id], $isReady);

						move_uploaded_file(
							$files['tmp_name'][$id],
							'uploads/'.$path."/".$file
						);
					} 
				}

			}
		}
	}

	public function addSlide($id){
		$stmnt = $this->db
			->prepare("INSERT INTO slider(photoid) VALUES(?)")
			->execute(array($id));
	}

	public function addPhoto($filename, $id){
		$this->db
			->prepare("INSERT INTO photo(filename) VALUES(?)")
			->execute(array($filename));

		if($id == true){
			return $this->db->lastInsertId();
		} 
	}

	public function getUserActivity($id){
	 	return $this->db->query("
				SELECT t1.score,t1.wrong,t1.date, t2.name, t2.cover,t2.type FROM exams t1
				LEFT JOIN game t2 ON t1.gameid = t2.id
				WHERE t1.userid = ".$id."
			");
	}

	public function addGame($folderId){
		$stmnt = $this->db
			->prepare("INSERT INTO game(folder_id) VALUES(?)")
			->execute(array($folderId));
	}

	public function updateCover($folderId, $cover){
		$stmnt = $this->db
			->prepare("UPDATE game SET cover = ? WHERE folder_id = ?")
			->execute(array($cover, $folderId));
	}

	public function updateGameListener(){
		if(isset($_POST['updateGame'])){
			$title 		= $_POST['title'];
			$desc 		= $_POST['description'];
			$folderId 	= explode("/", $_POST['folderId']);
			$folderId 	= end($folderId);
			$type 		= $_POST['type'];
			$stmnt = $this->db
				->prepare("UPDATE game SET name=?,type=?, description=? WHERE folder_id=?")
				->execute(array($title, $type, $desc, $folderId));
		
			die(json_encode(array("message" => "done")));
		}
	}

	public function getAllBasicGames(){
		return $this->db->query("SELECT * FROM game WHERE type='basic'");
	}

	public function getAllAdvancedGames(){
		return $this->db->query("SELECT * FROM game WHERE type='advanced'");
	}

	public function getAllVideo(){
		return $this->db->query("SELECT * FROM game WHERE type='video'");
	}

	public function getAllPhoto(){
		return $this->db->query("SELECT * FROM photo");
	}

	public function getAllGames(){
		return $this->db->query("SELECT * FROM game");
	}

	public function getGameById(){
		$id = $_GET['id'];

		return $this->db->query("SELECT * FROM game WHERE id=".$id." LIMIT 1");
	}

	public function addUserListener(){
		if(isset($_POST['addUser'])){
			$username 	= $_POST['username'];
			$password1	= $_POST['password'];
			$password2	= $_POST['password2'];

			$userData = array(
				'username' 	=> $_POST['username'],
				'password' 	=> $_POST['password'],
				'password2' => $_POST['password2'],
				'type' 		=> $_POST['type']
				);

			$this->validateUser($userData);

			if(count($this->errors) == 0){
				$this->addUser($userData);
			}
		}
	}

	public function validateUser($data){
		if($data['password'] != $data['password2']){
			$this->errors[]  	= "Passwords didn't match";
		}

		if(strlen($data['password']) < 6){
			$this->errors[]  	= "Passwords is too short";
		}

		if(strlen($data['username']) < 4){
			$this->errors[]  	= "Username is too short";
		}

		if($this->validateUsername($data['username']) > 0){
			$this->errors[] 	= "Username already exists";
		} 
	}

	public function getPendingApprovalCount(){
		return $stmnt = $this->db->query("SELECT count(id) as total from user where active = 0 and type='user'")->fetch();
	}

	public function loginUserListener(){
		if(isset($_POST['loginUser'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$stmnt = $this->db
				->query("SELECT * FROM user WHERE username = '".$username."' AND password = '".md5($password)."' LIMIT 1");
			
			if($stmnt->rowCount() > 0){
				foreach($stmnt as $idx => $user){
					// if(($user['active'] != 1) && ($user['type'] != "admin")){
					// 	$this->errors[] = "This account is not yet active. <br/> Please contact your administrator.";
					// } else {
						$_SESSION['user'] = $user;
						if($user['type'] == "admin"){
							header("Location:adminPage.php");
						} else {
							header("Location:movie.php");
						}
					// }

					break;
				}
			} else {
				$this->errors[] = "Invalid Account Info";
			}

		}
	}

	public function validateUsername($username){
		return  $this->db
			->query("SELECT username FROM user WHERE username = '".$username."' LIMIT 1")
			->rowCount();
	}

	public function addUser($data){
		$stmnt = $this->db
			->prepare("INSERT INTO user(username, password,type,active) VALUES(?,?,?,0)")
			->execute(array($data['username'], md5($data['password']), $data['type']));
	}

	public function getFeaturedGames(){
		return $stmnt = $this->db->query("SELECT * FROM game  WHERE type in('basic', 'advanced')LIMIT 5");
	}

	public function getSlideShow(){
		return $stmnt = $this->db->query("SELECT * FROM game WHERE isslideshow = 1");
	}

	public function getAllPendingUsers(){
		return $stmnt = $this->db->query("SELECT * FROM user WHERE type = 'user' AND active = 0");
	}

	public function getAllUsers(){
		return $stmnt = $this->db->query("
			SELECT t2.*,t1.* FROM user t1
			LEFT JOIN info t2 on t1.id = t2.userid
			 WHERE t1.type = 'user' AND t1.active = 1");
	}

}


