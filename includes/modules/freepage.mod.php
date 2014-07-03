<?php 

/**
* Freepage
*/
class Freepage
{
	public $freepage;
	public $keywords;
	public $description;
	public $title;

	function __construct()
	{
		$url = stripslashes($_GET["url"]);
		$this->freepage = $this->get_freepage($url);
	}

	function get_freepage($url){
		$sql = "SELECT title_seo_".Core::lang()." AS title_seo, description_seo_".Core::lang()." AS description_seo, keywords_seo_".Core::lang()." AS keywords_seo, title_".Core::lang()." AS title, content_".Core::lang()." AS content FROM freepages WHERE url_".Core::lang()." = '".$url."'";
		$output = get_sql($sql);
		return $output[0];
	}


}

?>