<?php

class MusicController extends VanillaController {
	
	function beforeAction () {

	}
	
	
	function index() {
		// $this->Category->orderBy('name','ASC');
		// $this->Category->showHasOne();
		// $this->Category->showHasMany();
		$musics = $this->Music->search();
        $this->doNotRenderHeader = 1;
        $this->set('musics', $musics);
        // echo "<pre>";
        // var_dump($musics);
        // echo "</pre>";
	}

    function view($musicId = null){
        if(isset($musicId)){
            $this->Music->id = $musicId;
            $music = $this->Music->search();
            // echo "<pre>";
            // var_dump($music);
            // echo "</pre>";
            $this->set('music', $music);
        }else{
            $music = $this->Music->search();
            // echo "<pre>";
            // var_dump($musics);
            // echo "</pre>";
        }
        $this->doNotRenderHeader = 0;
    }
	function afterAction() {

	}


}