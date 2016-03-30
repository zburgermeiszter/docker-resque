<?php

namespace Jobs;

class GitHubJob
{
    public function perform()
    {
        try {
            if (!array_key_exists('username', $this->args)) {
                throw new \Exception('Please pass a github username to the script such as `php basic_task.php dansackett`');
            }

            $url = sprintf('https://api.github.com/users/%s/repos', $this->args['username']);
            $client = new Guzzle\Http\Client();

            // Make the request
            $request = $client->get($url);
            $response = $request->send();

            // Print the number of a repositories for the user
            echo count($response->json());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}