<?php
	class Page{

		private $content;
		private $slug;
		private $meta_keywords;
		private $meta_desc;
		private $title;
		private $clean_title;
		private $url;
		private $date;
		private $menu;
		private $slug_parent;
		private $theme_url;
		private $site_url;
		private $site_name;
		private $site_menu;

		function __construct() {
			$this->slug = get_page_slug(false);
			$this->content = returnPageContent( $this->slug );
			$this->meta_keywords = get_page_meta_keywords(false);
			$this->meta_desc = get_page_meta_desc(false);
			$this->title = get_page_title(false);
			$this->url = get_page_url(true);
			$this->slug_parent = get_parent(false);
			$this->date = get_page_date( "l, F jS, Y - g:i A", false);
			$this->theme_url = get_theme_url(false);
			$this->site_url = get_site_url(false);
			$this->site_name = get_site_name(false);
			$this->site_menu = menu_data(null,false);
			$this->menu = menu_data( $this->slug, false );
		}

		public function export(){
			return array(
				"page" => array(
					"slug" => $this->slug,
					"content" => $this->content,
					"meta_keywords" => $this->meta_keywords,
					"meta_desc" => $this->meta_desc,
					"title" => $this->title,
					"url" => $this->url,
					"slug_parent" => $this->slug_parent,
					"date" => $this->date,
					"menu" => $this->menu
				),
				"site" => array(
					"url" => $this->site_url,
					"name" => $this->site_name,
					"menu" => $this->site_menu
				),
				"theme" => array(
					"url" => $this->theme_url
				)
			);
		}

	}
?>