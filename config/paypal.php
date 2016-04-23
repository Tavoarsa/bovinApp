<?php
return array(
    // set your paypal credential
    'client_id' => 'AXCiJdEhXuoE4b37oViCpslVCrkwM-8gB6O_jM1vabdlyvjfTlKi1V2u_tdNDRACvyWQ9HC5f0vj2LYh',
    'secret' => 'EM9FWiiy9vMdOwr3ecP0qf6vgoATpwlgYxzhbkgStSpv5eGqJby7k0_Yb86QZ0J98loe5f9ARkMkJK24',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);