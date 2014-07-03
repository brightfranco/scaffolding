<?php

/**
* Tools
*/
class Tools{
	
	public static $base_path;
	function __construct(){
	}

	function save_email_to_file($email){
		if(!isset($email))
			return false;

		$handle = fopen(base_path("emails.txt"), "a+");
		$write = fwrite($handle, $email . "\n");
		$close = fclose($handle);
		return $close;
	}

	//determinar se o url deve ser para lançar para fora do site, ou utilizar o caminho base do site
	function in_out_url($url){
		$count = 0;
		str_replace("http://", "", $url, $count);
		$out_url = ( $count > 0 ) ?  $url: base_url(Core::lang() . "/" . $url);
		return $out_url;
	}


	//Esta função recebe a imagem, o tamanho máximo e devolve o a width e a height para mostrar
	public function get_display_size($src, $max_width, $max_height ) {
		
		//$src = str_replace( base_url(), '', $src);
		$src = base_path($src);
		$pro = getimagesize( $src );

		$return["original_width"] = $img_width = $pro[0];
		$return["original_height"] =  $img_height = $pro[1];

		if( $img_width > $max_width ) {
			$final_height = ( $max_width * $img_height ) / $img_width;
			$final_width = $max_width;
		}else{
			$final_height = $img_height;
			$final_width = $img_width;
		}

		if( $final_height > $max_height ) {
			$final_width = ( $img_width * $max_height ) / $img_height;
			$final_height = $max_height;
		}

		$return['width'] = $final_width;
		$return['margin_left'] = ($max_width - $return['width'])/2;
		if( $return['margin_left'] < 0 ){
			$return['margin_left'] = 0;
		}else{
			$return['margin_left'] = round($return['margin_left']);
		}

		$return['height'] = $final_height;
		$return['margin_top'] = ( $max_height - $return['height'] ) / 2;
		if( $return['margin_top'] < 0 ){
			$return['margin_top'] = 0;
		}else{
			$return['margin_top'] = round($return['margin_top']);
		}

		$return["width"] = round( $return["width"] );
		$return["height"] = round( $return["height"] );
		$return["margin_top"] = round( $return["margin_top"] );
		
		return $return;

	}

	public function get_setting( $key ) {
		$query = "select * from settings where call_word = '".$key."' and lang = '".core::lang()."'";
		$res = mysql_query($query) or die_sql( $query );
		$row = mysql_fetch_array($res);
		return $row["value"];
	}
	
	//adiciona mensagens a apresentar ao user em session
	public function notify_add($message, $type = "info"){

		$_SESSION["notify"]["messages"][] = array("message" => $message, "type" => $type, "already_displayed" => "false");
	}

	//lista as mensagens a apresentar ao user para serem usadas via script
	public function notify_list(){

		if(!empty($_SESSION["notify"]["messages"])){


			echo "<ul id=\"notify-messages\">";
			foreach ($_SESSION["notify"]["messages"] as $message) {
				echo "<li data-type=\"".$message["type"]."\">" . $message["message"] . "</li>";
			}
			echo "</ul>";
		}

		//limpar o queue de notifications
		self::notify_empty();

	}

	public function notify_empty(){
		$_SESSION["notify"]["messages"] = array();
	}

}

?>