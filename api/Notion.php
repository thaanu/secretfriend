<?php 
class Notion {

    protected $baseURL = '';
    protected $notionVersion = '';
    protected $databaseId = '';

    public function __construct($config)
    {
        $this->baseURL          = $config['NOTION_API'];
        $this->databaseId       = $config['DATABASE_ID'];
        $this->notionVersion    = $config['NOTION_VERSION'];
    }

    public function signUp()
    {
        return $this->_call( $this->baseURL . '/pages', 'POST', [
            ''
        ]);
    }

    private function _call( $url, $method = 'GET', $payload = [] )
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        if ( $method == 'POST' ) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        }

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }
}