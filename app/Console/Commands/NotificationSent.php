<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotificationSent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:sent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'to' => "/topics/news",
            'data' => array(
                "own_no" => "11111",
                "no" => "11111",
                "message" => "IND VS PAK"
            )
        );
        $fields = json_encode($fields);

        $headers = array(
            'Authorization: key=' . "AIzaSyACeRHbpimVqP1DIV1F3nLDSApc8ZZOTtg",
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);
    }
}
