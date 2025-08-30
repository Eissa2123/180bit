<?php
	class ZIP extends ZipArchive 
	{
		public function addDir($location, $name) {
			$this->addEmptyDir($name);
			$this->addDirDo($location, $name);
		} 
		private function addDirDo($location, $name) {
			$name .= '/';
			$location .= '/';
			$dir = opendir ($location);
			while ($file = readdir($dir))
			{
				if ($file == '.' || $file == '..' || $file == 'backups') continue;
				$do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
				$this->$do($location . $file, $name . $file);
			}
		} 
	}
?>