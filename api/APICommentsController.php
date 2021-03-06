<?php

require_once './/app/Model/CommentModel.php';
require_once 'APIController.php';

class APICommentsController extends APIController
{

    function __construct()
    {
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new APIView();
    }

    public function getComments($params = null)
    {
        $comments = $this->model->getComments();
        $this->view->response($comments, 200);
    }

    public function getCommentsByComponentID($params = null)
    {
        if (isset($params[':ID']) && !empty($params[':ID'])) {
            $component_id = $params[':ID'];
            $comments = $this->model->getCommentsByComponentID($component_id);
            if ($comments) {
                $this->view->response($comments, 200);
            } else
                $this->view->response("No se encontraron comentarios para el componente con ID -> $component_id", 404);
        }
    }

    public function getComment($params = null)
    {
        if (isset($params[':ID']) && !empty($params[':ID'])) {
            $comment_id = $params[':ID'];
            $comment = $this->model->getComment($comment_id);
            if ($comment) {
                $this->view->response($comment, 200);
            } else
                $this->view->response("El comentario con ID -> $comment_id no fue encontrado", 404);
        }
    }

    public function deleteComment($params = null)
    {
        if (isset($params[':ID']) && !empty($params[':ID'])) {
            $comment_id = $params[':ID'];
            $result = $this->model->deleteComment($comment_id);
            if ($result > 0) {
                $this->view->response("El comentario con ID -> $comment_id fue borrado exitosamente", 200);
            } else
                $this->view->response("El comentario con ID -> $comment_id no fue encontrado", 404);
        }
    }

    public function postComment($params = null)
    {
        $body = $this->getData();
        if (isset($body) && !empty($body)) {
            $id_comment = $this->model->insertComment($body->content, $body->score, $body->user_id, $body->id_component);
            if ($id_comment) {
                $this->view->response($this->model->getComment($id_comment), 201);
            } else
                $this->view->response("El comentario no pudo ser insertado", 404);
        }
    }
}
