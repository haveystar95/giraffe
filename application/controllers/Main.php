<?php
class  Main extends  CI_Controller
{

    public function index()
    {
        if ($this->session->has_userdata('user')) {   //если сессия установлена
            $data['form'] = 'none';                   // скрыть форму авторизации
            $data['but_log_out'] = 'block';           // показать кнопку LOgOut
            $data['user'] = $this->session->user;     // передать массив с именем
        } else {                                      // если сессия не устанвлена
            $data['form'] = 'block';                  // показать форму авторизации
            $data['but_log_out'] = 'none';            // скрыть кнопку выхода из системы
            $data['user'] = "Гость";                  // поставить имя пользователя : Гость
        }

//проверка нажатия кнопки SignIn

        if (isset($_POST['signIn'])) {                                     // если кнопка SignIn нажата
            $this->load->model('auth_model');
            $result = $this->auth_model->LogIn($_POST['login']);           // получаем результат с БД c login равным введенным пользователем

            if (empty($result[0])) {           // ecли массив пустой-значит такого пользователя нет. Вызываем метод регистрации нового пользователя
                $this->auth_model->RegNewUser($_POST['login'], $_POST['password']); // метод регистрации. Передаем логин и пароль
                $this->session->set_userdata('user', $_POST['login']);              // Сразу авторизируем пользователя в системе
                redirect(base_url(), 'location');                                   // перезагружаем страницу

            } else {                                                                // если массив не пустой, то такой пользователь существует. Проверяем пароль
                if (password_verify($_POST['password'], $result[0]['password'])) {  // проверяем хеш пароля хранимый в БД с хешем введеного пароля юзером
                    $this->session->set_userdata('user', $result[0]['login']);      // если результат TRUE - устанавливаем сессию
                    redirect(base_url(), 'location');
                } else {
                    echo "<script>alert('Incorrect data')</script>";                // если FALSE  выводим окно с ошибкой
                }
            }
        }

        $this->load->library('pagination');                 // загрузка библиотеки пагинации
        $config['base_url'] = base_url().'page';            // юри переключения страниц
        $config['total_rows'] = $this->db->count_all('ad'); // количество записей в базе данных
        $config['per_page'] = 5;                            // сколько записей выводить на страницу
        $this->pagination->initialize($config);
        $this->load->model('main_model');
        $data['array']=$this->main_model->Show_ad($config['per_page'],$this->uri->segment(2)); // запуск метода отображения объявлений.
        $this->load->view('header_view', $data);            // загрузка хедера
        $this->load->view('main_view', $data);              // загрузка main_view.php
    }


    public function logout()                                // метод выхода из системы
    {
        $this->session->unset_userdata('user');
        redirect(base_url(), 'location');
    }



    public function showOne()   // метод  отображения одного объявления
    {
        $this->load->model('main_model');
        $array_ad= $this->main_model->ShowOneAd($this->uri->segment(1)); // метод загрузки с БД нужной записи объявления. Сегмент 1 указывает на ID

        if(empty($array_ad[0])) {                                        // если массив пустой, значит введенного id нет в базе
            redirect(base_url(), 'location');                            // переход на главную станицу
           } else { // если массив не пустой
               if ($this->session->has_userdata('user')) {               // проверяем установлена ли сессия
                   $data['user'] =$this->session->user;
               } else {
                   $data['user'] = '';
               }
              $data['title']=$array_ad[0]['title'];
              $data['id']=$array_ad[0]['id'];
              $data['description']=$array_ad[0]['description'];
              $data['author_name']=$array_ad[0]['author_name'];
              $data['created_at_datetime']=$array_ad[0]['created_at_datetime'];
              $this->load->view('show_view',$data);
           }
    }
}

?>