<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class GithubComponent extends Component
{
    private $api = 'https://api.github.com/';

    private function queryApi($endpoint, $params = []) {
        if (!empty($params)) {
            $params = http_build_query($params);
        } else {
            $params = '';
        }
        $url = $this->api . $endpoint . '?' . $params;

        // Faz requisição cURL à API do Github
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1, // Retornar a resposta
            CURLOPT_USERAGENT => 'GusAntoniassi-CRUD-Funcionario' // User-Agent é obrigatório para usar a API do Github
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function searchUsers($query)
    {
        $endpoint = 'search/users';

        // Fazer requisição à API do GitHub para pesquisar os usuários
        // $requestUsers = file_get_contents(TESTS . 'files' . DS . 'githubUsersTest.json'); // arquivo .json para testes

        $requestUsers = $this->queryApi($endpoint, ['q' => $query]);

        $users = [];

        if (!empty($requestUsers)) {
            $requestUsers = json_decode($requestUsers, true);

            // Parâmetro total_count indica quantos usuários existem na resposta
            if (!empty($requestUsers['total_count']) && $requestUsers['total_count'] > 0) {
                $count = 0;
                foreach ($requestUsers['items'] as $requestUser) {
                    $users[] = [
                        'login' => $requestUser['login'],
                        'avatar' => $requestUser['avatar_url'],
                        'url' => $requestUser['html_url'],
                    ];
                    // Limitar o número de resultados a 10 usuários
                    if ($count > 10) {
                        break;
                    }
                    $count++;
                }
            }
        }

        return $users;
    }

    public function getUser($username) {
        // Fazer requisição à API do GitHub para pegar o usuário
        $endpoint = 'users/' . $username;

        // $requestUser = file_get_contents(TESTS . 'files' . DS . 'githubUserTest.json'); // arquivo .json para testes
        $requestUser = $this->queryApi($endpoint);

        $user = [];

        if (!empty($requestUser)) {
            $requestUser = json_decode($requestUser, true);
            if (!empty($requestUser)) {
                $user = [
                    'login' => $requestUser['login'],
                    'avatar' => $requestUser['avatar_url'],
                    'url' => $requestUser['html_url'],
                ];
            }
        }

        return $user;
    }
}