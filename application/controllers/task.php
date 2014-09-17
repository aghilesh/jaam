<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task extends CI_Controller {

    public function Task() {
        parent::__construct();
        
        (!$this->authentication->check_logged_in()) ? redirect('') : '';

        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('task_model', 'task');
        $this->load->model('user_model', 'user');
        $this->load->model('taskstatus_model', 'taskstatus');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Task';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'task';

        $this->gen_contents['paths'] = array(
            'add' => 'task/add',
            'edit' => 'task/edit',
            'delete' => 'task/delete',
            'list' => 'task'
        );
        $this->entity = 'Task';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        
        $loggedUser = $this->authentication->getUserInfo();
        //echo '<pre>'; print_r($loggedUser);
        $this->USER_ID = $loggedUser['USER_ID'];
    }

    public function index() {

        $this->gen_contents['tasks'] = $this->task->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'task/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * add a task
     */
    public function add() {
        if ($_POST) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[500]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['add']);
            } else {
                // build array for the model
                $formData = array(
                    'title' => set_value('title'),
                    'description' => set_value('description'),
                    'when' => $_POST['when'] ? date('Y-m-d',strtotime($_POST['when'])) : '0000-00-00',
                    'assigned_by' => $this->USER_ID,
                    'assigned_to' => $_POST['assigned_to'] ?$_POST['assigned_to']: '0',
                    'status' => 1,
                    'created_date' => date('Y-m-d'),
                );
                //print_r($formData);
                $res = $this->task->insert($formData);
                //var_dump($res);exit;
                if ($res) {
                    $this->session->set_flashdata('message', $this->entity . ' was added successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['list']);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in adding the ' . $this->entity . '.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['add']);
                }
            }
        }
        
        $this->gen_contents['users'] = prepareOptionList($this->user->get(), array('key' => 'id', 'value' => 'first_name'),$this->USER_ID);
        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'task/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * edit a task
     */
    public function edit() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[500]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['edit'].'/'.$id);
            } else {
                // build array for the model
                $formData = array(
                    'title' => set_value('title'),
                    'description' => set_value('description'),
                    'when' => $_POST['when'] ? date('Y-m-d',strtotime($_POST['when'])) : '0000-00-00',
                    'assigned_by' => $this->USER_ID,
                    'assigned_to' => $_POST['assigned_to'] ?$_POST['assigned_to']: '0',
                    'status' => 1,
                    'created_date' => date('Y-m-d'),
                );

                if ($this->task->update($formData, $id) == TRUE) {
                    $this->session->set_flashdata('message', $this->entity . ' was updated successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['edit'] . '/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in updating the ' . $this->entity . '.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['edit'] . '/' . $id);
                }
            }
        }
        if ($id) {
            $this->gen_contents['task'] = $this->task->get($id);
        }
        $this->gen_contents['users'] = prepareOptionList($this->user->get(), array('key' => 'id', 'value' => 'first_name'),$this->USER_ID);
        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'task/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete Task
     * @param type $id
     */
    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->task->delete($id)) {
                $this->session->set_flashdata('message', $this->entity . ' was deleted successfully.');
                $this->session->set_flashdata('msg_class', 'success_message');
                redirect($this->gen_contents['paths']['list']);
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }

        if ($error) {
            $this->session->set_flashdata('message', 'Unable to delete, Try later.');
            $this->session->set_flashdata('msg_class', 'error_message');
            redirect($this->gen_contents['paths']['list']);
        }
    }

}
