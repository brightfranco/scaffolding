<?php

class core {

	public static $view;
	public $mod;
	public $mod_data; //info da página actual
	public $lang;
	public $meta;
	
	//on load core
	function __construct() {

		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING);

		//error reporting
		$display_errors = ($_SERVER["HTTP_HOST"] == "localhost") ? 1 : 1;
		ini_set("display_errors", $display_errors);

		//database
		$this->load_database();		
		
		session_start();

		//set lang	
		$this->set_lang();

		self::load_general_functions();

		//tools
		self::load_tools();

		$this->load_home(); //carrega menus e itens que são transversais a outros módulos, pelo que necessita estar sempre available

		//carrega o módulo a visualizar (página)
		$this->set_mod();
		$this->load_module();

		$this->load_seo(); //determina quais os valores a incluir em keywords, title e description

		$this->get_referer();

		//definir os headers
		header("Content-type: text/html; charset=utf-8");
	}

	function load_tools(){
		require_once(base_path("includes/tools.php"));
	}

	function load_home(){
		require_once(base_path("includes/modules/home.mod.php"));
	}

	function get_referer(){

		//referer - saves first access
		if(!isset($_SESSION["origin"])){
			$_SESSION["origin"] = ($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "Desconhecido / Directo";
		}

	}

	function load_database(){
		$database = new Database();
		$this->database = $database;
	}

	function set_mod(){
		$this->mod = (isset($_GET["mod"])) ? $_GET["mod"] : "home";
	}

	function set_lang() {

		if (!array_key_exists("lang_fe", $_SESSION)) $this->lang = $_SESSION['lang_fe'] = "pt"; //default lang

		$lang = $_GET['lang'];
		$allowed = array("en","pt", "cn", "es", "fr");
		
		if(isset($lang)){

			if (!in_array($lang,$allowed))
				return false;
			else
				$this->lang = $_SESSION['lang_fe'] = $lang;		
		}
		else{
			$this->lang = $_SESSION["lang_fe"];
		}

		//incluir o ficheiro de linguagem
		include_once("includes/lang/" . $this->lang . ".php");
	
	}

	static function lang(){
		return $_SESSION["lang_fe"];				
	}

	function load_module(){

		//carregar o ficheiro 
		$file = base_path("includes/modules/".$this->mod.".mod.php");

		//nem sempre há necessidade de carregar o módulo, pode-se excluir caso haja necessidade
		if(true){
			if(file_exists($file)){

				//incluir o ficheiro onde está definido
				require_once($file);

				//instanciar a classe e passa-la para o core
				$this->mod_data = new $this->mod;
			}
			
		}
		
	}

	//define functions de utilização transversal (root, friendly-url, etc)
	function load_general_functions(){

		function translate($call_word){

			$defined = defined($call_word);

			//o define não existe no idioma actual
			if(!$defined){
				//retornar o valor em PT
				include_once(base_path("includes/lang/pt.php")); //não redefine os restantes defines porque defines são CONSTANTS, pelo que só define os que estão "em falta neste idioma"
			}

			return constant($call_word);			
		}

		function translate_url($call_word){

			//o define não existe no idioma actual
			if(!$defined){

				//retornar o valor em PT
				include(base_path("includes/lang/pt.php")); //não redefine os restantes defines porque defines são CONSTANTS, pelo que só define os que estão "em falta neste idioma"
				$output_url = "pt/" . constant($call_word);
			}

			else{
				$output_url = core::lang() . "/" . constant($call_word);
			}

			return $output_url;
			
			
		}

		function var_bump($var){
			echo '<div style="z-index: 10000000; position: fixed; right:10px; top:10px; padding:15px; background: rgba(0,0,0,0.8); color:#fff; width: 400px; font-size: 13px; line-height: 19px; font-family: Consolas; line-height: 15px; border-radius: 3px; height: 300px; overflow-y: scroll;">'; var_dump($var); echo '</div>';
		}

		function redirect($uri = '', $method = 'location', $http_response_code = 302)
		{
			if ( ! preg_match('#^https?://#i', $uri))
			{
				$uri = base_url($uri);
			}

			switch($method)
			{
				case 'refresh'	: header("Refresh:0;url=".$uri);
					break;
				default			: header("Location: ".$uri, TRUE, $http_response_code);
					break;
			}
			exit;
		}

		function base_url($url = false){
			if($_SERVER["HTTP_HOST"] == "localhost")
				$host = "http://localhost/scaffolding";
			else
				$host = "http://".$_SERVER["HTTP_HOST"]."/dev";
			return $host."/".$url;
		}

		//definir o caminho absoluto
		function base_path($url = false){

			if($_SERVER["HTTP_HOST"] == "localhost"){
				$path = "C:/xampp/htdocs/windowspath";
				if(!file_exists($path))	
					$path = "/Users/bright/Documents/htdocs/scaffolding";
			}
			else
				$path = "___ONLINE___PATH___";
			return $path."/".$url;
		}

		function die_sql( $query = "" ){
			echo '<hr />';
			echo mysql_error();
			echo '<br />';
			echo $query;
			echo '<hr />';
			die();
		}

		//executa uma query e retorna um array contendo objectos de dados da db
		function get_sql($sql){
			if(!empty($sql)){
				$query = mysql_query($sql);
				if($query){
					if (true) {
						while ($row = mysql_fetch_object($query)) {
							$output[] = $row;
						}
					}
					return $output;
				}
				return false;
			}
			return false;
		}

	}

	function load_view($file, $data = false){

		if(file_exists($file)){
			if($data){
					//criar um object temporario
				$temp_object = new stdClass();
				foreach ($data as $key => $value) {
					$temp_object->$key = $value;
				}
					//passar o core na própria data - deve haver melhor forma de fazer isto. não é grave porque php passa por referência
					//$temp_object->core = $this; não necessário para este caso
					//limpar $data colocando os valores do object temporario
				unset($data);
				$data = $temp_object;
			}

			ob_start();
			include($file);
			$output = ob_get_clean();
			return $output;
		}

		else echo "File <b>".$file."</b> not found";

	}

	function load_seo(){

		switch ($this->mod) {
			case 'freepage':
				$keywords = $this->mod_data->freepage->keywords_seo;
				$description = $this->mod_data->freepage->description_seo;
				$title = $this->mod_data->freepage->title_seo;
				break;
			
			//ir buscar às settings - db
			default:
				$sql = "SELECT call_word, value_".Core::lang()." AS value FROM settings WHERE call_word IN ('keywords_seo_def', 'title_seo_def', 'description_seo_def')";
				$output = get_sql($sql);
				foreach ($output as $entry) {
					if($entry->call_word == "keywords_seo_def") $keywords = $entry->value;
					if($entry->call_word == "description_seo_def") $description = $entry->value;
					if($entry->call_word == "title_seo_def") $title = $entry->value;

				}
				break;

		}

		$this->meta->keywords = $keywords;
		$this->meta->description = $description;
		$this->meta->title = $title;

	}

}

	/**
	* database
	*/
	class Database
	{

		public $host;
		public $user;
		public $database;
		public $password;
		public $mysqli;
		static $force_online = true;
		
		function __construct()
		{

			if(self::$force_online != true){
				//definir dados da ligação
				switch ($_SERVER["HTTP_HOST"]) {
					case 'localhost':

					$this->host = "localhost";
					$this->user = "root";
					$this->password = "";
					$this->database = "";
					break;
					
					default:
					
					break;
				}
			}
			else{
					$this->host = "";
					$this->user = "";
					$this->password = "";
					$this->database = "";
			}

			//go
			$connection = $this->connect();
			$this->mysqli = $connection;

			return $connection;
		}

		//alterar para mysql_connect
		function connect(){

			//$connection = new mysqli($this->host, $this->user, $this->password);		
			$connection = mysql_connect($this->host, $this->user, $this->password);
			$database = mysql_select_db($this->database);
			mysql_query("SET NAMES UTF8"); //fix encoding
			
			return ($connection !== false) ? $connection:false;
		}
	}

	?>