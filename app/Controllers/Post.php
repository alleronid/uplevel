<?php

namespace App\Controllers;

class Post extends BaseController {

    public function index($id = null) {

    	if (is_numeric($id)) {

    		$post = $this->M_Base->data_where('post', 'id', $id);

    		if (count($post) == 1) {

    			$data = array_merge($this->base_data, [
		    		'title' => $post[0]['title'],
		    		'post' => $post[0],
		    	]);

		        return view('Post/index', $data);
    		} else {
    			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    		}
    	} else {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    }
}
