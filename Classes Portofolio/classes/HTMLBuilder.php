<?php
	
	class HTMLBuilder {
		
		private $header;
		private $footer;
		private $body;
		
		public function __construct($header, $footer, $body){
			$this->header = $header;
			$this->footer = $footer;
			$this->body = $body;
		}
		
		public function buildHeader(){
			include "html/" . $this->header;
		}
		
		public function buildFooter(){
			include "html/" . $this->footer;
		}
		
		public function buildBody(){
			include "html/" . $this->body;
		}
		
		public function buildAll(){
			$this->buildHeader();
			$this->buildFooter();
			$this->buildBody();
		}
		
	}
	
?>