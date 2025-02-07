<?php

namespace App\Controllers;

class Home extends BaseController {

    public function index() {

        if ($this->request->getPost('search')) {

            $search = addslashes(trim(htmlspecialchars($this->request->getPost('search'))));

            $games[] = [
                'category' => 'Pencarian',
                'games' => $this->M_Base->data_like('games', 'games', $search),
            ];
        } else {
            $games = [];
            foreach ($this->M_Base->all_data_order('category', 'sort') as $category) {
                $find_games = $this->M_Base->all_data_order('games', 'sort');

                if (count($find_games) !== 0) {
                    
                    $games_x = [];
                    foreach(($find_games) as $x) {
                        if ($x['category'] == $category['category']) {
                            $games_x[] = $x;
                        }
                    }
                    
                    $games[] = [
                        'category' => $category['category'],
                        'games' => $games_x,
                    ];
                }
            }

            $search = '';
        }

    	$data = array_merge($this->base_data, [
    		'title' => $this->base_data['web']['name'],
    		'games' => $games,
            'banner' => $this->M_Base->all_data('banner', 5),
            'search' => $search,
            'method' => $this->M_Base->data_where('method', 'status', 'On'),
            'testimoni' => $this->M_Base->all_data('testimoni', 6),
            'popup' => [
                'gambarpopup' => $this->M_Base->u_get('gambarpopup'),

            ],
    	]);

        return view('Home/index', $data);
    }
}
