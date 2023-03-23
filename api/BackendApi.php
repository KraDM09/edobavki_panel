<?php

namespace app\api;

class BackendApi extends ApiBase {

    public function __construct() {
        parent::__construct($_ENV['BACKEND_API_URL']);
    }

    public function search(array $data = []): array {
        return $this->request($data, 'search');
    }

    public function createAdditive(array $data = []): array {
        return $this->request($data, 'admin/additives/create');
    }

    public function updateAdditive(array $data = []): array {
        return $this->request($data, 'admin/additives/update');
    }

    public function deleteAdditive(array $data = []): array {
        return $this->request($data, 'admin/additives/delete');
    }

    public function createArticle(array $data = []): array {
        return $this->request($data, 'admin/articles/create');
    }

    public function updateArticle(array $data = []): array {
        return $this->request($data, 'admin/articles/update');
    }

    public function deleteArticle(array $data = []): array {
        return $this->request($data, 'admin/articles/delete');
    }
}
