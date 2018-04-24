<?php
session_start();
class Edit extends CI_Controller{


    public function index(){
        if (!isset($_SESSION['user'])){ //Если сессия не установлена, то выкидываем на главную

            header('Location:'.base_url());
        }
        else  // Если сессия установлена
        {
            $data['form'] = 'none';  // Скрыть форму фвторизации
            $data['but_log_out'] = 'block'; // Показать кнопку выход из сисемы и кнопу создать объявление
            $data['user'] = $_SESSION['user']; // запись польовотеля
            $data['array_ad'][0]['title']='';
            $data['array_ad'][0]['description']='';
            $data['array_ad'][0]['id']='0'; // присваиваем 0 ид ,для новых объявлений,созданые будут содержать свой текущий ид
        }         //ОБРАБОТКА НОВОГО ОБЪЯВЛЕНИЯ !!


        if (isset($_POST['create_new'])){ // Кнопка Save/ сохраняет измененые записи или записывает новые
            if($_POST['id']!='0'){  //  если ид не равен 0 то объявление уже было ранее создано

                $this->UpdateAd($_POST['id'],$_POST['title'],$_POST['description']);// функция обновления данных
            }
            else // если ид равен 0, то запись новая и запускаем обработку добавления новой записи
            {
                $this->load->model('edit_model');
               $result= $this->edit_model->Insert_new_ad($_POST['title'],$_POST['description']);
                header('Location:'.base_url().$result[0]['id']);
            }
        }

        //вывод видов
        $this->load->view('header_view', $data);
        $this->load->view('edit_view');

    }



    public function UpdateAd($id,$title,$description){   // метод изменения существующей записи
            $this->load->model('edit_model');
            $this->edit_model->UpdateAd($title,$description,$id);
            header('Location:' . base_url());
    }





    public function edit_created(){ // метод редактирования объявления
                if (!isset($_SESSION['user'])){  // если сессия не установлена - переходим на главную страницу
                    header('Location:'.base_url());
                }
                    // если установлена, то  загружаем модели и ищем нужно объявления для редактирование

                $data['form'] = 'none';
                $data['but_log_out'] = 'block';
                $data['user'] = $_SESSION['user'];
                $id=$this->uri->segment(2);


                $this->load->model('edit_model');
                $result=$this->edit_model->Get_author($id);// метод для получения имени автора с бд

                if(!empty($result[0])) { // если результа не пустой, значит в бд объявление есть

                    if ($result[0]['author_name'] == $_SESSION['user']) { // проверям автора объявления с установленной сессией

                        $data['array_ad']=$this->edit_model->GetDataById($id);  // метод загрузки объявления
                        $this->load->view('header_view', $data); // загрузка видов
                        $this->load->view('edit_view');
                    } else {
                        header('Location:' . base_url()); // если автор не совпадает с сессией- выкидываем на главную страницу
                    }
                }
                else // если такого автора нет
                {
                    header('Location:' . base_url()); // выкидываем на главную страницу
                }

            }

        public function delete()
        { // метод удаления записи из бд
            if (!isset($_SESSION['user'])) {  // если сессия не установлена - переходим на главную страницу
                header('Location:' . base_url());
            }
            $id = $this->uri->segment(2);
            $this->load->model('edit_model');
            $result = $this->edit_model->Get_author($id);

            if (!empty($result[0])) { // если результа не пустой, значит в бд объявление есть

                if ($result[0]['author_name'] == $_SESSION['user']) {

                    $this->load->model('edit_model');
                    $this->edit_model->deleteAd($this->uri->segment(2));
                    header('Location:' . base_url());
                } else {
                    header('Location:' . base_url());
                }
            }
        }
}
?>