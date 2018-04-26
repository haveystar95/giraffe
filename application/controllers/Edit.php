<?php
//session_start();
class Edit extends CI_Controller
{


    public function index()
    {
        if (!$this->session->has_userdata('user')) {     //Если сессия не установлена, то выкидываем на главную

            redirect(base_url(), 'location');
        } else {                                         // Если сессия установлена
            $data['form'] = 'none';                      // Скрыть форму фвторизации
            $data['but_log_out'] = 'block';              // Показать кнопку выход из сисемы и кнопу создать объявление
            $data['user'] = $this->session->user;        // запись польовотеля
            $data['array_ad'][0]['title']='';
            $data['array_ad'][0]['description']='';
            $data['array_ad'][0]['id']='0';             // присваиваем 0 ид ,для новых объявлений,созданые будут содержать свой текущий ид
        }
                                                        //ОБРАБОТКА НОВОГО ОБЪЯВЛЕНИЯ !!
        if (isset($_POST['create_new'])) {              // Кнопка Save/ сохраняет измененые записи или записывает новые
            if($_POST['id']!='0') {                     //  если ид не равен 0 то объявление уже было ранее создано
                $this->UpdateAd($_POST['id'],$_POST['title'],$_POST['description']);// функция обновления данных
            } else  {                                 // если ид равен 0, то запись новая и запускаем обработку добавления новой записи
               $this->load->model('edit_model');
               $result= $this->edit_model->Insert_new_ad($_POST['title'],$_POST['description']);
               redirect(base_url().$result[0]['id'], 'location');
            }
        }

        //вывод видов
        $this->load->view('header_view', $data);
        $this->load->view('edit_view');

    }

    public function UpdateAd($id,$title,$description)    // метод изменения существующей записи
    {
            $this->load->model('edit_model');

             $result=$this->edit_model->Get_author($id); // метод для получения имени автора с бд

                if(!empty($result[0])) {
                    if ($result[0]['author_name'] == $this->session->user){
                        $this->edit_model->UpdateAd($title,$description,$id);
                         redirect(base_url(), 'location');}
                         else{ redirect(base_url(), 'location');
                            }

                } else {
                    echo "<script>alert('Не удалось изменить данные!!')</script>";
                }

    }





    public function editCreated()                         // метод редактирования объявления
    {
        if (!$this->session->has_userdata('user')) {      // если сессия не установлена - переходим на главную страницу
            redirect(base_url(), 'location');
        }
           // если установлена, то  загружаем модели и ищем нужно объявления для редактирование
                $data['form'] = 'none';
                $data['but_log_out'] = 'block';
                $data['user'] = $this->session->user;
                $id=$this->uri->segment(2);


                $this->load->model('edit_model');
                $result=$this->edit_model->Get_author($id);                      // метод для получения имени автора с бд

                if(!empty($result[0])) {                                        // если результа не пустой, значит в бд объявление есть

                    if ($result[0]['author_name'] == $this->session->user) {    // проверям автора объявления с установленной сессией
                        $data['array_ad']=$this->edit_model->GetDataById($id);  // метод загрузки объявления
                        $this->load->view('header_view', $data);                // загрузка видов
                        $this->load->view('edit_view');
                    } else {
                        redirect(base_url(), 'location');   // если автор не совпадает с сессией- выкидываем на главную страницу
                    }
                } else {                                   // если такого автора нет
                    redirect(base_url(), 'location');      // выкидываем на главную страницу
                }
            }

        public function delete()                          // метод удаления записи из бд
        {
            if (!$this->session->has_userdata('user')) {  // если сессия не установлена - переходим на главную страницу
                redirect(base_url(), 'location');
            }
            $id = $this->uri->segment(2);
            $this->load->model('edit_model');
            $result = $this->edit_model->Get_author($id);

            if (!empty($result[0])) {                     // если результа не пустой, значит в бд объявление есть

                if ($result[0]['author_name'] == $this->session->user) {
                    $this->load->model('edit_model');
                    $this->edit_model->deleteAd($this->uri->segment(2));
                    redirect(base_url(), 'location');
                } else {
                    redirect(base_url(), 'location');
                }
            }
        }
}
?>