<?php
class Controller {
    protected function view($path, $data = []) {
        extract($data);
        $viewFile = APP_PATH . '/views/' . $path . '.php';
        $layoutFile = APP_PATH . '/views/layouts/main.php';
        ob_start();
        require $viewFile;
        $content = ob_get_clean();
        require $layoutFile;
    }

    protected function viewPlain($path, $data = []) {
        extract($data);
        require APP_PATH . '/views/' . $path . '.php';
    }

    protected function redirect($url) {
        header('Location: ' . BASE_URL . '/' . ltrim($url, '/'));
        exit;
    }

    protected function requireAdmin() {
        if (!isset($_SESSION['admin_id'])) {
            $this->redirect('admin/login');
        }
    }

    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
