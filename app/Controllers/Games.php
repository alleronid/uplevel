<?php

namespace App\Controllers;

class Games extends BaseController
{

    public function index($slug = null)
    {

        if ($slug) {
            $games = $this->M_Base->data_where('games', 'slug', $slug);

            if (count($games) === 1) {
                if ($games[0]['slug'] === $slug) {

                    if ($this->request->getPost('tombol')) {

                        $data_post = [
                            'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                            'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                            'username' => addslashes(trim(htmlspecialchars($this->request->getPost('username')))),
                            'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                            'product' => addslashes(trim(htmlspecialchars($this->request->getPost('product')))),
                            'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                        ];

                        $joki = false;
                        $skinml = false;
                        $videomontage = false;
                        $topuplogin = false;
                        $loginapex = false;
                        $loginefootball = false;
                        $loginff = false;
                        $logingenshin = false;
                        $loginml = false;
                        $loginninokuni = false;
                        $loginpokemon = false;
                        $loginraven = false;
                        $logintiktok = false;
                        $logintower = false;
                        $loginwildrift = false;
                        $tournament = false;
                        $lgragnarox = false;
                        $lgdragonhunter = false;
                        $lgfourgods = false;
                        $lggenshinimpact = false;
                        $lgninokuni = false;
                        $lgneverafter = false;
                        $lgclashofclans = false;

                        //start Joki    
                        if ($this->request->getPost('target') == 'joki') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'request_hero', 'catatan_joki', 'nickname', 'login_via', 'jumlah_star_poin'];
                                    for ($i = 0; $i <= 6; $i++) {

                                        if (empty($json_user_id[$i])) {
                                            $this->session->setFlashdata('error', 'Data joki belum lengkap');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        } else {
                                            $user_id = array_merge($user_id, [
                                                $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                            ]);
                                        }
                                    }

                                    if (count($user_id) == 7) {

                                        $joki = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'joki';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data joki belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian jasa joki gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian jasa joki gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-Skin ML
                        else if ($this->request->getPost('target') == 'skinml') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'login_via', 'nickname', 'request_hero', 'catatan_joki'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        if (empty($json_user_id[$i])) {
                                            $this->session->setFlashdata('error', 'Data Skin ML belum lengkap');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        } else {
                                            $user_id = array_merge($user_id, [
                                                $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                            ]);
                                        }
                                    }

                                    if (count($user_id) == 5) {

                                        $skinml = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'skinml';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Skin ML belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Skin ML gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Skin ML gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-Video Montage
                        else if ($this->request->getPost('target') == 'videomontage') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'request_hero', 'catatan_videomontage', 'nickname', 'login_via', 'record_via', 'contoh_video', 'jumlah_menit'];
                                    for ($i = 0; $i <= 8; $i++) {

                                        if (empty($json_user_id[$i])) {
                                            $this->session->setFlashdata('error', 'Data Video Montage belum lengkap');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        } else {
                                            $user_id = array_merge($user_id, [
                                                $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                            ]);
                                        }
                                    }

                                    if (count($user_id) == 9) {

                                        $videomontage = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'videomontage';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Video Montage belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Video Montage gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Video Montage gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-Top Up Login
                        else if ($this->request->getPost('target') == 'topuplogin') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'kode_cadangan'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) >= 1) {

                                        $topuplogin = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'topuplogin';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-ragnarox
                        else if ($this->request->getPost('target') == 'lg-ragnarox') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $lgragnarox = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-ragnarox';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-dragonhunter
                        else if ($this->request->getPost('target') == 'lg-dragonhunter') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $lgdragonhunter = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-dragonhunter';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-fourgods
                        else if ($this->request->getPost('target') == 'lg-fourgods') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $lgfourgods = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-fourgods';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-genshinimpact
                        else if ($this->request->getPost('target') == 'lg-genshinimpact') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $lggenshinimpact = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-genshinimpact';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-ninokuni
                        else if ($this->request->getPost('target') == 'lg-ninokuni') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $lgninokuni = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-ninokuni';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-neverafter
                        else if ($this->request->getPost('target') == 'lg-neverafter') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'server', 'login', 'password'];
                                    for ($i = 0; $i <= 3; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 4) {

                                        $lgneverafter = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-neverafter';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-lg-clashofclans
                        else if ($this->request->getPost('target') == 'lg-clashofclans') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['username', 'login'];
                                    for ($i = 0; $i <= 1; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 2) {

                                        $lgclashofclans = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'lg-clashofclans';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-Login Apex
                        else if ($this->request->getPost('target') == 'loginapex') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'wa'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 5) {

                                        $loginapex = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginapex';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginefootball
                        else if ($this->request->getPost('target') == 'loginefootball') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'];
                                    for ($i = 0; $i <= 5; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 6) {

                                        $loginefootball = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginefootball';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginff
                        else if ($this->request->getPost('target') == 'loginff') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'];
                                    for ($i = 0; $i <= 5; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 6) {

                                        $loginff = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginff';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-logingenshin
                        else if ($this->request->getPost('target') == 'logingenshin') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'server', 'wa'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 5) {

                                        $logingenshin = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'logingenshin';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginml
                        else if ($this->request->getPost('target') == 'loginml') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'kode_cadangan', 'wa'];
                                    for ($i = 0; $i <= 5; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 6) {

                                        $loginml = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginml';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginninokuni
                        else if ($this->request->getPost('target') == 'loginninokuni') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'server', 'character', 'wa'];
                                    for ($i = 0; $i <= 5; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 6) {

                                        $loginninokuni = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginninokuni';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginpokemon
                        else if ($this->request->getPost('target') == 'loginpokemon') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'wa'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 5) {

                                        $loginpokemon = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginpokemon';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginraven
                        else if ($this->request->getPost('target') == 'loginraven') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'server', 'wa'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 5) {

                                        $loginraven = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginraven';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-logintiktok
                        else if ($this->request->getPost('target') == 'logintiktok') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'wa'];
                                    for ($i = 0; $i <= 2; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 3) {

                                        $logintiktok = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'logintiktok';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-logintower
                        else if ($this->request->getPost('target') == 'logintower') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'server', 'login_via', 'region', 'wa'];
                                    for ($i = 0; $i <= 6; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 7) {

                                        $logintower = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'logintower';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-loginwildrift
                        else if ($this->request->getPost('target') == 'loginwildrift') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['email', 'password', 'nickname', 'login_via', 'wa'];
                                    for ($i = 0; $i <= 4; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 5) {

                                        $loginwildrift = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'loginwildrift';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        //start-tournament
                        else if ($this->request->getPost('target') == 'tournament') {
                            if ($this->request->getPost('user_id')) {

                                $json_user_id = json_decode($this->request->getPost('user_id'), true);

                                if (is_array($json_user_id)) {

                                    $user_id = [];
                                    $key_ = ['id', 'server', 'jam', 'tanggal'];
                                    for ($i = 0; $i <= 3; $i++) {

                                        $user_id = array_merge($user_id, [
                                            $key_[$i] => addslashes(trim(htmlspecialchars($json_user_id[$i]))),
                                        ]);
                                    }

                                    if (count($user_id) == 4) {

                                        $tournament = true;

                                        $data_post['user_id'] = json_encode($user_id);
                                        $data_post['zone_id'] = 'tournament';
                                    } else {
                                        $this->session->setFlashdata('error', 'Data Top Up Login belum lengkap');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                } else {
                                    $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Pembelian Top Up Login gagal');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $data_post['user_id'] = addslashes(trim(htmlspecialchars($this->request->getPost('user_id'))));
                            $data_post['zone_id'] = addslashes(trim(htmlspecialchars($this->request->getPost('zone_id'))));
                        }

                        if (empty($data_post['user_id']) or empty($data_post['zone_id'])) {
                            $this->session->setFlashdata('error', 'ID Player harus diisi');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['method'])) {
                            $this->session->setFlashdata('error', 'Metode belum dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['product'])) {
                            $this->session->setFlashdata('error', 'Produk belum dipilih');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (empty($data_post['wa'])) {
                            $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else if (strlen($data_post['wa']) < 10 or strlen($data_post['wa']) > 15) {
                            $this->session->setFlashdata('error', 'Nomor whatsapp tidak sesuai');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        } else {
                            $product = $this->M_Base->data_where('product', 'id', $data_post['product']);

                            if (count($product) === 1) {
                                if ($product[0]['status'] == 'On') {

                                    if ($data_post['method'] === 'balance') {
                                        $method = [
                                            [
                                                'id' => 10001,
                                                'status' => 'On',
                                                'provider' => 'Balance',
                                                'method' => 'Saldo Akun',
                                                'uniq' => 'N',
                                            ]
                                        ];
                                    } else {
                                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                                    }

                                    if (count($method) === 1) {
                                        if ($method[0]['status'] == 'On') {

                                            $level = 'Members';
                                            $product_price = $product[0]['price'];




                                            if ($this->users == false) {
                                                $username = '';
                                                $username_tripay = 'Default';
                                            } else {
                                                $username = $this->users['username'];
                                                $username_tripay = $this->users['username'];
                                                $level = $this->users['level'];

                                                if ($level == 'Silver') {
                                                    if ($product[0]['price_silver'] == 0 or $product[0]['price_silver'] < 500 or empty($product[0]['price_silver'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_silver'];
                                                    }

                                                } else if ($level == 'Gold') {

                                                    if ($product[0]['price_gold'] == 0 or $product[0]['price_gold'] < 500 or empty($product[0]['price_gold'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_gold'];
                                                    }

                                                } else if ($level == 'Member') {
                                                    $product_price = $product[0]['price'];

                                                } else {
                                                    $product_price = $product[0]['price'];
                                                }
                                            }

                                            $status = 'Pending';
                                            $ket = 'Menunggu Pembayaran';

                                            $order_id = 'INV' . date('Ymd') . rand(000000, 999999);
                                            $trx = $order_id;


                                            $uniq = ($method[0]['uniq'] == 'Y') ? rand(000, 999) : 0;

                                            $price = $product_price;

                                            ///

                                            if ($this->M_Base->u_get('pay_balance') == 'Y') {

                                                $level = $this->users['level'];

                                                $price = $product_price;

                                                if ($level == 'Silver') {
                                                    if ($product[0]['price_silver'] == 0 or empty($product[0]['price_silver'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_silver'];
                                                    }

                                                } else if ($level == 'Gold') {

                                                    if ($product[0]['price_gold'] == 0 or empty($product[0]['price_gold'])) {
                                                        $product_price = $product[0]['price'];
                                                    } else {
                                                        $product_price = $product[0]['price_gold'];
                                                    }

                                                } else if ($level == 'Member') {

                                                    $product_price = $product[0]['price'];

                                                } else {
                                                    $product_price = $product[0]['price'];
                                                }

                                            }

                                            ///

                                            if ($joki) {
                                                $price = $price * $user_id['jumlah_star_poin'];

                                                $user_id = json_encode($user_id);
                                            } else if ($videomontage) {
                                                $price = $price * $user_id['jumlah_menit'];

                                                $user_id = json_encode($user_id);
                                            }

                                            if ($this->request->getPost('target') == 'sosmed') {
                                                $price = $price * $data_post['zone_id'];
                                            }


                                            $price = $price + $uniq;
                                            $discount = 0;

                                            $redirect = false;

                                            $voucher = '';
                                            if ($this->request->getPost('voucher')) {

                                                $voucher = addslashes(trim(htmlspecialchars($this->request->getPost('voucher'))));

                                                $data_voucher = $this->M_Base->data_where_array('voucher', [
                                                    'voucher' => $voucher,
                                                    'status' => 'Active',
                                                ]);

                                                if (count($data_voucher) === 1) {

                                                    if ($product[0]['price'] < $data_voucher[0]['min']) {
                                                        $this->session->setFlashdata('error', 'Minimal nominal transaksi Rp ' . number_format($data_voucher[0]['min'], 0, ',', '.') . ' untuk menggunakan voucher ini');
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    } else {

                                                        $orders = $this->M_Base->data_count('orders', [
                                                            'voucher' => $voucher,
                                                        ]);

                                                        if ($orders <= $data_voucher[0]['max_use']) {

                                                            $valid = false;
                                                            if ($data_voucher[0]['type_produk'] == 'all') {
                                                                $valid = true;
                                                            } else {
                                                                if (in_array($product[0]['id'], explode(',', $data_voucher[0]['produk']))) {
                                                                    $valid = true;
                                                                }
                                                            }

                                                            if ($valid == true) {

                                                                $diskon = (($price - $uniq) / 100) * $data_voucher[0]['diskon'];

                                                                if ($diskon > $data_voucher[0]['max_diskon']) {
                                                                    $diskon = $data_voucher[0]['max_diskon'];
                                                                }

                                                                $discount = $diskon;

                                                                $price -= $diskon;
                                                                $price += $uniq;


                                                            } else {
                                                                $this->session->setFlashdata('error', 'Voucher tidak dapat digunakan untuk nominal ini');
                                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                            }
                                                        } else {
                                                            $this->session->setFlashdata('error', 'Kode voucher telah mencapai limit');
                                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                        }
                                                    }
                                                } else {
                                                    $this->session->setFlashdata('error', 'Kode voucher tidak ditemukan');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }
                                            }

                                            $fee = 0;
                                            $fee = ceil($fee);
                                            $price = ceil($price);


                                            if ($method[0]['provider'] == 'Tripay') {

                                                $data = [
                                                    'method' => $method[0]['code'],
                                                    'merchant_ref' => $order_id,
                                                    'amount' => $price,
                                                    'customer_name' => $username_tripay,
                                                    'customer_email' => 'email@domain.com',
                                                    'customer_phone' => $data_post['wa'],
                                                    'order_items' => [
                                                        [
                                                            'sku' => $product[0]['sku'],
                                                            'name' => $product[0]['product'],
                                                            'price' => $price,
                                                            'quantity' => 1,
                                                        ]
                                                    ],
                                                    'return_url' => base_url() . '/payment/' . $order_id,
                                                    // url untuk redirect
                                                    'expired_time' => (time() + (24 * 60 * 60)),
                                                    // 24 jam
                                                    'signature' => hash_hmac('sha256', $this->M_Base->u_get('tripay-merchant') . $order_id . $price, $this->M_Base->u_get('tripay-private'))
                                                ];

                                                $curl = curl_init();

                                                curl_setopt_array($curl, [
                                                    CURLOPT_FRESH_CONNECT => true,
                                                    CURLOPT_URL => 'https://tripay.co.id/api/transaction/create',
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_HEADER => false,
                                                    CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $this->M_Base->u_get('tripay-key')],
                                                    CURLOPT_FAILONERROR => false,
                                                    CURLOPT_POST => true,
                                                    CURLOPT_POSTFIELDS => http_build_query($data),
                                                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
                                                ]);

                                                $result = curl_exec($curl);
                                                $result = json_decode($result, true);

                                                if ($result) {
                                                    if ($result['success'] == true) {
                                                        if (array_key_exists('qr_url', $result['data'])) {
                                                            $payment_code = $result['data']['qr_url'];
                                                        } else {
                                                            if ($result['data']['pay_code']) {
                                                                $payment_code = $result['data']['pay_code'];
                                                            } else {
                                                                $payment_code = $result['data']['checkout_url'];
                                                            }
                                                        }

                                                        if (empty($payment_code)) {
                                                            $redirect = true;
                                                            $payment_code = $result['data']['checkout_url'];
                                                        }
                                                    } else {
                                                        $this->session->setFlashdata('error', 'Result : ' . $result['message']);
                                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                    }
                                                } else {
                                                    $this->session->setFlashdata('error', 'Gagal terkoneksi ke Tripay');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                }


                                            } else if ($method[0]['provider'] == 'Balance') {

                                                if ($this->users == false) {
                                                    $this->session->setFlashdata('error', 'Silahkan login dahulu');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                } else if ($this->users['balance'] == 0) {
                                                    $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                } else if ($this->users['balance'] < $price) {
                                                    $this->session->setFlashdata('error', 'Saldo tidak mencukupi');
                                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                                } else {

                                                    $payment_code = 'Saldo Akun';
                                                    $status = 'Processing';
                                                    $method[0]['code'] = 'Balance';

                                                    $this->M_Base->data_update('users', [
                                                        'balance' => $this->users['balance'] - $price,
                                                    ], $this->users['id']);

                                                    if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                                        $customer_no = $data_post['user_id'] . $data_post['zone_id'];
                                                    } else {
                                                        $customer_no = $data_post['user_id'];
                                                    }

                                                    if ($product[0]['provider'] == 'DF') {

                                                        $result = $this->M_Base->df_order($product[0]['sku'], $customer_no, $order_id);

                                                        if (isset($result['data'])) {
                                                            if ($result['data']['status'] == 'Gagal') {
                                                                $ket = $result['data']['message'];
                                                            } else {
                                                                $ket = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];

                                                                echo json_encode(['success' => true]);
                                                            }
                                                        } else {
                                                            $ket = 'Failed Order';
                                                        }

                                                    } else if ($product[0]['provider'] == 'Manual') {

                                                        $status = 'Processing';
                                                        $ket = 'Pesanan siap diproses';

                                                    } else if ($product[0]['provider'] == 'AG') {

                                                        $result = $this->M_Base->ag_v1_order($product[0]['sku'], $customer_no, $order_id);

                                                        if ($result['status'] == 0) {
                                                            $ket = $result['error_msg'];
                                                        } else {

                                                            if ($result['data']['status'] == 'Sukses') {
                                                                $status = 'Success';
                                                                $this->M_Base->wapisender_sukses($data_post['wa'], $product[0]['product'], $order_id, $method[0]['method']);
                                                            }

                                                            $ket = $result['data']['sn'];
                                                        }

                                                    } else {
                                                        $ket = 'Provider tidak ditemukan';
                                                    }


                                                }

                                            } else if ($method[0]['provider'] == 'Manual') {
                                                $payment_code = $method[0]['rek'];
                                            } else {
                                                $this->session->setFlashdata('error', 'Metode tidak terdaftar');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            }

                                            if (empty($method[0]['type'])) {
                                                $method[0]['type'] = "";
                                            }

                                            if ($this->users == false) {
                                                $saldosb = 0;
                                                $saldost = 0;
                                            } else {
                                                $saldosb = $this->users['balance'];
                                                $saldost = $saldosb - $price;
                                            }

                                            $this->M_Base->data_insert('orders', [
                                                'order_id' => $order_id,
                                                'username' => $username,
                                                'wa' => $data_post['wa'],
                                                'product_id' => $product[0]['id'],
                                                'product' => $product[0]['product'],
                                                'price' => $price,
                                                'raw_price' => $product[0]['raw_price'],
                                                'user_id' => $data_post['user_id'],
                                                'zone_id' => $data_post['zone_id'],
                                                'nickname' => preg_replace('/[^\p{L}\p{N}\s]/u', '', $data_post['username']),
                                                'method_id' => $method[0]['id'],
                                                'method_code' => $method[0]['code'],
                                                'method' => $method[0]['method'],
                                                'games' => $games[0]['games'],
                                                'games_id' => $games[0]['id'],
                                                'status' => $status,
                                                'ket' => $ket,
                                                'trx_id' => $trx,
                                                'voucher' => $voucher,
                                                'payment_gateway' => $method[0]['provider'],
                                                'payment_code' => $payment_code,
                                                'payment_type' => $method[0]['type'],
                                                'provider' => $product[0]['provider'],
                                                'date' => date('Y-m-d'),
                                                'date_create' => date('Y-m-d G:i:s'),
                                                'date_process' => date('Y-m-d G:i:s'),
                                            ]);


                                            $harga = $price;

                                            if (in_array($status, ['Pending', 'Processing'])) {
                                                $this->M_Base->wapisender_pending($data_post['wa'], $product[0]['product'], $order_id, $method[0]['method'], $harga);
                                            }

                                            $this->session->setFlashdata('success', 'Pesanan berhasil dibuat');
                                            if ($redirect == true) {
                                                return redirect()->to($payment_code);
                                            } else {
                                                return redirect()->to(base_url() . '/payment/' . $order_id);
                                            }

                                        } else {
                                            $this->session->setFlashdata('error', 'Metode pembayaran sedang gangguan');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        }
                                    } else {
                                        $this->session->setFlashdata('error', 'Metode pembayaran tidak ditemukan');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }

                                } else {
                                    $this->session->setFlashdata('error', 'Produk sedang gangguan');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Produk tidak ditemukan');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                    }



                    $all_product = array_reverse($this->M_Base->data_where_array('product', [
                        'games_id' => $games[0]['id'],
                        'status' => 'On',
                    ], 'sort'));

                    $all_method = $this->M_Base->data_where('method', 'status', 'On');

                    $accordion_data = [];

                    foreach ($all_method as $method) {
                        if (!isset($accordion_data[$method['type']])) {
                            $accordion_data[$method['type']] = [];
                        }
                        array_push($accordion_data[$method['type']], array('method' => $method['method'], 'image' => $method['image'], 'id' => $method['id'], 'code' => $method['code']));
                    }

                    $category_id = [];
                    foreach ($all_product as $loop) {
                        if (!empty($loop['category_id']) and $loop['category_id'] !== 0) {
                            $category_id[] = $loop['category_id'];
                        }
                    }

                    $category = [];
                    $product = [];

                    foreach (array_unique($category_id) as $loop) {

                        $data_category = $this->M_Base->data_where('product_category', 'id', $loop);

                        if (count($data_category) == 1) {
                            $category[] = $data_category[0];

                            $product[$loop] = array_reverse(array_merge($this->M_Base->data_where_array('product', [
                                'games_id' => $games[0]['id'],
                                'category_id' => $loop,
                                'status' => 'On',
                            ], 'sort')));
                        }
                    }

                    $data = array_merge($this->base_data, [
                        'title' => $games[0]['games'],
                        'games' => $games[0],
                        'pay_balance' => $this->M_Base->u_get('pay_balance'),
                        'method' => $this->M_Base->data_where('method', 'status', 'On'),
                        'product' => $all_product,
                        'accordion_data' => $accordion_data,
                        'category' => $category,
                        'products' => $product,
                    ]);

                    return view('Games/index', $data);

                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function order($action = null, $id = null)
    {

        if ($action === 'get-price') {
            if (is_numeric($id)) {
                $product = $this->M_Base->data_where('product', 'id', $id);

                $jumlah = 1;
                if ($this->request->getPost('jumlah')) {
                    if (is_numeric($this->request->getPost('jumlah'))) {
                        $jumlah = addslashes(trim(htmlspecialchars($this->request->getPost('jumlah'))));
                    }
                }

                if (count($product) == 1) {

                    $level = 'Members';
                    $product_price = $product[0]['price'];

                    if ($this->users !== false) {
                        $level = $this->users['level'];

                        if ($level == 'Silver') {

                            if ($product[0]['price_silver'] == 0 or empty($product[0]['price_silver'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_silver'];
                            }


                        } else if ($level == 'Gold') {

                            if ($product[0]['price_gold'] == 0 or empty($product[0]['price_gold'])) {
                                $product_price = $product[0]['price'];
                            } else {
                                $product_price = $product[0]['price_gold'];
                            }

                        } else if ($level == 'Member') {

                            $product_price = $product[0]['price'];

                        } else {
                            $product_price = $product[0]['price'];
                        }
                    }

                    $price = [];
                    foreach ($this->M_Base->all_data('method') as $loop) {

                        $custom_price = $product_price;

                        $price[] = [
                            'method' => $loop['id'],
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }

                    if ($this->M_Base->u_get('pay_balance') == 'Y') {

                        $custom_price = $product_price;

                        $price[] = [
                            'method' => 'balance',
                            'price' => number_format($custom_price * $jumlah, 0, ',', '.'),
                        ];
                    }

                    echo json_encode($price);
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if ($action == 'get-detail') {

            if ($this->request->getPost('user_id') and $this->request->getPost('zone_id') and $this->request->getPost('method') and $this->request->getPost('wa')) {
                $data_post = [
                    'user_id' => addslashes(trim(htmlspecialchars($this->request->getPost('user_id')))),
                    'zone_id' => addslashes(trim(htmlspecialchars($this->request->getPost('zone_id')))),
                    'method' => addslashes(trim(htmlspecialchars($this->request->getPost('method')))),
                    'product' => $id,
                    'wa' => addslashes(trim(htmlspecialchars($this->request->getPost('wa')))),
                    'voucher' => addslashes(trim(htmlspecialchars($this->request->getPost('voucher')))),

                ];

                $product = $this->M_Base->data_where('product', 'id', $data_post['product']);

                if (count($product) === 1) {

                    if ($data_post['method'] === 'balance') {
                        $method = [
                            [
                                'method' => 'Saldo Akun',
                            ],
                        ];
                    } else {
                        $method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                    }

                    if (count($method) === 1) {

                        $games = $this->M_Base->data_where('games', 'id', $product[0]['games_id']);

                        if (count($games) == 1) {

                            $price = $this->M_Base->data_where_array('price', [
                                'method_id' => $data_post['method'],
                                'product_id' => $data_post['product'],
                            ]);

                            $real_price = count($price) == 1 ? $price[0]['price'] : $product[0]['price'];

                            if (!empty($data_post['zone_id']) and $data_post['zone_id'] != 1) {
                                $target = $data_post['user_id'] . $data_post['zone_id'];
                            } else {
                                $target = $data_post['user_id'];
                            }

                            if ($games[0]['check_status'] == 'Y') {

                                $key = '82800b75fa79e65';

                                $url_en = 'aHR0cHM6Ly9hbGZhdGhhbi5teS5pZA==';
                                $url_de = base64_decode($url_en);

                                if (in_array($games[0]['check_code'], array('mobilelegends', 'mobilelegend'))) {
                                    $urlcek = '' . $url_de . '/api/game/mobile-legends/?id=' . $data_post['user_id'] . '&zone=' . $data_post['zone_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('freefire', 'free-fire'))) {
                                    $urlcek = '' . $url_de . '/api/game/free-fire/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('higgsdomino', 'higgs'))) {
                                    $urlcek = '' . $url_de . '/api/game/higgsdomino/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('valorant', 'wildrift'))) {
                                    $encoded = str_replace('%', '%25', urlencode($data_post['user_id']));
                                    $urlcek = '' . $url_de . '/api/game/' . $games[0]['check_code'] . '/?id=' . $encoded . '&key=' . $key . '';
                                } else if (in_array($games[0]['check_code'], array('azur-lane', 'gensin', 'hyperfront', 'punishing', 'ragnarokm', 'ragnarokx'))) {
                                    $zoneid = $data_post['zone_id'];
                                    $zoneid_mapping = array(
                                        'azur-lane' => array(
                                            'avrora' => '1',
                                            'lexington' => '2',
                                            'Sandy' => '3',
                                            'Washington' => '4',
                                            'Amagi' => '5'
                                        ),
                                        'gensin' => array(
                                            'asia' => 'os_asia',
                                            'usa' => 'os_usa',
                                            'america' => 'os_usa',
                                            'Europe' => 'os_euro',
                                            'euro' => 'os_euro',
                                            'hk' => 'os_cht',
                                            'cht' => 'os_cht'
                                        ),
                                        'hyperfront' => array(
                                            'SEA' => '10000',
                                            'BR' => '10100',
                                            'AU' => '10200',
                                            'NA' => '10300',
                                            'LA' => '10400',
                                            'MENA' => '10600',
                                            'EU' => '10700'
                                        ),
                                        'punishing' => array(
                                            'Asia' => '5000',
                                            'Europe' => '5001',
                                            'America' => '5002'
                                        ),
                                        'ragnarokm' => array(
                                            'Eternal' => '90001',
                                            'Midnight' => '90002',
                                            'Memory' => '90002003'
                                        ),
                                        'ragnarokx' => array(
                                            'Opera Phantom' => '2010',
                                            'Wing of Blessing' => '2011',
                                            'Royal Instrument' => '2012',
                                            'Valhalla' => '2013',
                                            'Gungnir' => '2014',
                                            'Central Plains' => '2015',
                                            'Dark Lord' => '2016',
                                            'Clock Tower' => '2017',
                                            'Comodo' => '2018',
                                            'Temple of Dawn' => '2020',
                                            'Golden Lava' => '2021',
                                            'Highland' => '2022',
                                            'Demon' => '2023',
                                            'Sealed Island' => '2024',
                                            'Sipera' => '2025',
                                            'Silent Ship' => '2030',
                                            'Golden Route' => '2031',
                                            'Sapir' => '2032',
                                            'Rose Red' => '2033',
                                            'Kingdom of Freedom' => '2034',
                                            'Nicola' => '2035',
                                            'Crystal Waterfall' => '2040',
                                            'Bifrost' => '2041',
                                            'Nastia' => '2042',
                                            'Strouf Treasury' => '2043',
                                            'Green Tranquil Pond' => '2044',
                                            'Ingael' => '2045',
                                            'Tome of Glory' => '2050',
                                            'Incense Pavilion' => '2051',
                                            'Carew' => '2052',
                                            'Boulders and Horns' => '2053',
                                            'Exquisite Pond' => '2054',
                                            'Nemesis' => '2055',
                                            'Aldebaran' => '2056',
                                            'Honor of Emperium' => '2057',
                                            'Bright Lotus Pond' => '2060',
                                            'Seocho Market' => '2061',
                                            'Eudora' => '2062',
                                            'Moonlit Temple' => '2063',
                                            'Hidden Wood Ruins' => '2064',
                                            'Dungeon Throne' => '2065',
                                            'Dimension Door' => '2066',
                                            'Ayothaya' => '2070',
                                            'Luzon' => '2071',
                                            'Majapahit' => '2072',
                                            'Garden City' => '2073',
                                            'Manila' => '2074',
                                            'Sukhothai' => '2075',
                                            'Attack On Poring' => '2076',
                                            'Tossakan' => '2080',
                                            'Badang' => '2081',
                                            'Lapulapu' => '2082',
                                            'Gatotkaca' => '2083',
                                            'Srikandi' => '2084',
                                            'Kumpakan' => '2085',
                                            'Angeling' => '2090',
                                            'Deviling' => '2091',
                                            'Ghostring' => '2092',
                                            'Mastering' => '2093',
                                            'Song Tử' => '2100',
                                            'Xử Nữ' => '2101',
                                            'Half Anniversary' => '2110'
                                        ),
                                    );

                                    $game_code = $games[0]['check_code'];
                                    $zoneid = strtolower($zoneid);

                                    if (isset($zoneid_mapping[$game_code])) {
                                        $zoneid_map = $zoneid_mapping[$game_code];
                                        foreach ($zoneid_map as $key => $value) {
                                            if (strpos($zoneid, strtolower($key)) !== false) {
                                                $zoneid = $value;
                                                break;
                                            }
                                        }
                                    }

                                    $urlcek = '' . $url_de . '/' . $game_code . '/?id=' . $data_post['user_id'] . '&server=' . $zoneid . '&key=' . $key . '';

                                } else {
                                    $urlcek = '' . $url_de . '/api/game/' . $games[0]['check_code'] . '/?id=' . $data_post['user_id'] . '&key=' . $key . '';
                                }

                                $curl = curl_init();

                                curl_setopt_array(
                                    $curl,
                                    array(
                                        CURLOPT_URL => $urlcek,
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'GET',
                                        CURLOPT_POSTFIELDS => '',
                                        CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/x-www-form-urlencoded'
                                        ),
                                    )
                                );

                                $result = curl_exec($curl);
                                $result = json_decode($result, true);

                                if (isset($result['error_msg'])) {

                                    if (in_array($games[0]['check_code'], array('mobilelegends', 'mobilelegend'))) {
                                        $cekkode = 'mobilelegend';
                                    } else if (in_array($games[0]['check_code'], array('freefire', 'free-fire'))) {
                                        $cekkode = 'freefire';
                                    } else if (in_array($games[0]['check_code'], array('higgsdomino', 'higgs'))) {
                                        $cekkode = 'higgs';
                                    }

                                    $curl = curl_init();

                                    curl_setopt_array(
                                        $curl,
                                        array(
                                            CURLOPT_URL => 'https://v1.apigames.id/merchant/M220624ANIH7980TY/cek-username/' . $cekkode . '?user_id=' . $target . '&signature=fe51f2abf7d4796429b92d3fa64568c3',
                                            CURLOPT_RETURNTRANSFER => true,
                                            CURLOPT_ENCODING => '',
                                            CURLOPT_MAXREDIRS => 10,
                                            CURLOPT_TIMEOUT => 0,
                                            CURLOPT_FOLLOWLOCATION => true,
                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                            CURLOPT_CUSTOMREQUEST => 'GET',
                                            CURLOPT_POSTFIELDS => '',
                                            CURLOPT_HTTPHEADER => array(
                                                'Content-Type: application/x-www-form-urlencoded'
                                            ),
                                        )
                                    );

                                    $resultx = curl_exec($curl);
                                    $resultx = json_decode($resultx, true);
                                    $nickname = '';

                                    if ($resultx) {
                                        if ($resultx['status'] == 1) {

                                            $nickname = $resultx['data']['username'];
                                            echo json_encode([
                                                'status' => true,
                                                'msg' => '
                                        <form action="" method="POST">

                                            <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                            <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                            <input type="hidden" name="username" value="' . $result['data']['username'] . '">
                                            <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                            <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                            <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                            <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                            <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">


                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nickname:</td>
                                                        <td class="text-left pt-2 pb-2"><b> ' . $nickname . ' </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">UserID:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                            </div>
                                        </form>
                                        ',
                                            ]);

                                        } else if ($resultx['status'] == 0) {
                                            echo json_encode([
                                                'status' => false,
                                                'msg' => 'Usernames tidak Ditemukan',
                                            ]);
                                        }
                                    } else {
                                        echo json_encode([
                                            'status' => false,
                                            'msg' => 'Akuns gagal dicek'
                                        ]);
                                    }
                                } else {
                                    if ($result) {
                                        if (isset($result['nickname'])) {

                                            $nickname = $result['nickname'];

                                            echo json_encode([
                                                'status' => true,
                                                'msg' => '
                                        <form action="" method="POST">

                                            <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                            <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                            <input type="hidden" name="username" value="' . $result['data']['username'] . '">
                                            <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                            <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                            <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                            <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                            <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">


                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Nickname:</td>
                                                        <td class="text-left pt-2 pb-2"><b> ' . $nickname . ' </b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">UserID:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                        <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="text-right">
                                                <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                            </div>
                                        </form>
                                        ',
                                            ]);

                                        } else {
                                            echo json_encode([
                                                'status' => false,
                                                'msg' => 'Username tidak Ditemukan .xal',
                                            ]);
                                        }
                                    } else {
                                        echo json_encode([
                                            'status' => false,
                                            'msg' => 'Akun gagal dicek .xal'
                                        ]);
                                    }
                                }






                            } else {

                                $html_target = '';

                                if ($this->request->getPost('target')) {
                                    if ($this->request->getPost('target') !== 'joki') {
                                        $html_target = '<tr>
                                            <td class="text-left pt-2 pb-2">UserID:</td>
                                            <td class="text-left pt-2 pb-2"> ' . $target . '</td>
                                        </tr>';
                                    }
                                }




                                echo json_encode([
                                    'status' => true,
                                    'msg' => '
                                    <form action="" method="POST">

                                        <input type="hidden" name="user_id" value="' . $data_post['user_id'] . '">
                                        <input type="hidden" name="zone_id" value="' . $data_post['zone_id'] . '">
                                        <input type="hidden" name="method" value="' . $data_post['method'] . '">
                                        <input type="hidden" name="product" value="' . $data_post['product'] . '">
                                        <input type="hidden" name="wa" value="' . $data_post['wa'] . '">
                                        <input type="hidden" name="target" value="' . $this->request->getPost('target') . '">
                                        <input type="hidden" name="voucher" value="' . $data_post['voucher'] . '">


                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Kategori Layanan:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $games[0]['games'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Nominal Layanan:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $product[0]['product'] . '</td>
                                                </tr>
                                                ' . $html_target . '
                                                <tr>
                                                    <td class="text-left pt-2 pb-2">Metode Pembayaran:</td>
                                                    <td class="text-left pt-2 pb-2"> ' . $method[0]['method'] . '</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-left pt-2 pb-2"> Pastikan data game Anda sudah benar. Kesalahan input data game bukan tanggung jawab kami. </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-right">
                                            <button class="btn text-white" type="button" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit" name="tombol" value="submit" id="1xorder" onclick="nonaktif_button()">Bayar Sekarang</button>
                                        </div>
                                    </form>
                                    ',
                                ]);
                            }
                        } else {
                            echo json_encode([
                                'status' => false,
                                'msg' => 'Games tidak ditemukan',
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'status' => false,
                            'msg' => 'Metode pembayaran tidak ditemukan',
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => false,
                        'msg' => 'Produk tidak ditemukan',
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => false,
                    'msg' => 'Pembelian gagal dilakukan',
                ]);
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function voucher($product_id = null)
    {

        if ($product_id) {
            if (is_numeric($product_id)) {
                if ($this->request->getPost('voucher')) {

                    $voucher = addslashes(trim(htmlspecialchars($this->request->getPost('voucher'))));

                    if (!empty($voucher)) {

                        $array = [
                            'success' => false,
                            'msg' => 'Produk tidak ditemukan',
                        ];

                        $product = $this->M_Base->data_where('product', 'id', $product_id);

                        if (count($product) == 1) {

                            $data_voucher = $this->M_Base->data_where_array('voucher', [
                                'voucher' => $voucher,
                                'status' => 'Active',
                            ]);

                            if (count($data_voucher) === 1) {

                                if ($product[0]['price'] < $data_voucher[0]['min']) {
                                    $array['msg'] = 'Minimal nominal transaksi Rp ' . number_format($data_voucher[0]['min'], 0, ',', '.') . ' untuk menggunakan voucher ini';
                                } else {

                                    $orders = $this->M_Base->data_count('orders', [
                                        'voucher' => $voucher,
                                    ]);


                                    $potongan = (($product[0]['price']) / 100) * $data_voucher[0]['diskon'];

                                    if ($potongan > $data_voucher[0]['max_diskon']) {
                                        $potongan = $data_voucher[0]['max_diskon'];
                                    }

                                    if ($orders <= $data_voucher[0]['max_use']) {

                                        $valid = false;
                                        if ($data_voucher[0]['type_produk'] == 'all') {
                                            $valid = true;
                                        } else {
                                            if (in_array($product[0]['id'], explode(',', $data_voucher[0]['produk']))) {
                                                $valid = true;
                                            }
                                        }

                                        if ($valid == true) {
                                            $array['success'] = true;
                                            $array['msg'] = 'Kode voucher berhasil digunakan, Anda mendapatkan Potongan Harga sebesar Rp ' . number_format($potongan, 0, ',', '.') . '  ';
                                        } else {
                                            $array['msg'] = 'Voucher tidak dapat digunakan untuk nominal ini';
                                        }
                                    } else {
                                        $array['msg'] = 'Kode voucher telah mencapai limit';
                                    }
                                }
                            } else {
                                $array['msg'] = 'Kode voucher tidak ditemukan';
                            }
                        }

                        echo json_encode($array);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}