<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $this->load->view("layout/auth_header");
    //     $this->load->view("Auth/login");
    //     $this->load->view("layout/auth_footer");
    // }

    public function index()
    {
        // Jika sudah login, arahkan ke halaman yang sesuai
        // if ($this->session->userdata('email')) {
        //     $role = $this->session->userdata('role');
        //     if ($role == 'Admin' || $role == 'KBK') {
        //         redirect('Dashboard');
        //     } elseif ($role == 'Staff') {
        //         redirect('DanaKBK');
        //     } else {
        //         redirect('Home');
        //     }
        // }
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }

        // Validasi Form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            // $this->load->view("layout/auth_header");
            $this->load->view("Auth/login");
            // $this->load->view("layout/auth_footer");
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'id' => $user['id'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
                redirect('Auth');
            }
        }
    }

    public function registrasi()
    {
        // Validasi Form
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $this->load->view("layout/auth_header");
            $this->load->view("Auth/registrasi");
            // $this->load->view("layout/auth_footer");
        }
    }

    public function cek_registrasi()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            // 'gambar' => 'default.jpg',
            'role' => "User",
            'timestamp' => time()
        ];
        $this->userrole->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun anda telah berhasil terdaftar, silahkan login!</div>');
        redirect('Auth');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}