<?php 
class Notion {

    protected $baseURL = '';
    protected $secretKey = '';
    protected $notionVersion = '';
    protected $databaseId = '';

    public function __construct($config)
    {
        $this->baseURL          = $config['NOTION_API'];
        $this->secretKey        = $config['NOTION_SECRET'];
        $this->databaseId       = $config['DATABASE_ID'];
        $this->notionVersion    = $config['NOTION_VERSION'];
    }

    public function signUp( $fullname, $password, $email )
    {
        return $this->_call( $this->baseURL . '/pages', 'POST', [
            'parent' => [
                'database_id' => $this->databaseId
            ],
            'properties' => [
                'Name' => [
                    'title' => [
                        [
                            'text' => [
                                'content' => $fullname
                            ]
                        ]
                    ]
                ],
                'Email' => [
                    "email" => $email
                ],
                'Password' => [
                    'rich_text' => [
                        [
                            "type" => "text",
                            "plain_text" => $password
                        ]
                    ]
                ] 
            ]
        ]);
    }

    private function _call( $url, $method = 'GET', $payload = [] )
    {
        $ch = curl_init();

        $headers = [
            'Authorization: Bearer '.$this->secretKey,
            'Notion-Version:'.$this->notionVersion,
            'Content-Type: application/json; charset=utf-8',
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);

        if ( $method == 'POST' ) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        }

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }
}