<?php 

/**
* Ajax
*/
class Ajax
{
	
	function __construct()
	{
		$act = $_GET["act"];
		if(method_exists($this, $act))
			$this->$act();
		else
			die("Method " . $act . " does not exist in ajax.mod.php");

		exit(); //ajax never loads the page
	}

	function subscriber_add(){
		
		$email = $_POST["subscriber_email"];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$output["type"] = "error";
			$output["message"] = "Por favor verifique o endereço de email introduzido.";
		}
		else{
			$query = "INSERT INTO subscribers (`email`, `from`, `date_inserted`) VALUES ('".$email."', `dmy`, CURRENT_TIMESTAMP)";
			$insert = mysql_query($query);
			$output["type"] = "success";
			$output["message"] = "Obrigado pelo seu apoio! Será dos primeiros a receber as nossas novidades";
		}

		//output
		echo json_encode($output);
	}

	function contact_send(){

		//parse data from ajax
		parse_str($_POST["form_data"], $form_data);
		
		if (isset($form_data["form_contact_email"])){

			// Mail headers
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			// Additional headers
			$headers .= 'From: Site Dia Mundial do Yoga <info@diamundialdoyoga.pt>' . "\r\n";


			mail("email@domain.com", "New contact", $body, $headers);
			
			$output["type"] = "success";
			$output["message"] = "Contacto efectuado com sucesso";
		}

		//output
		echo json_encode($output);
	}

}

?>