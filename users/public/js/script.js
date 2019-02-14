		function geri(){

			history.back()

        };
		function control($data){
			$data=trim($data);
			$data=htmlspecialchars($data);
			$data=stripslashes($data);
			return $data;
			
		}