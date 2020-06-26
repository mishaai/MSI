<?php

class Role {

    private $dt=[
        
        '1'=>'პროგრამის მენეჯერი', //ტოპ მენეჯერები ხედავენ ყველაფერს შესაძლებელი უნდა იყოს რედაქტირების ჩართვის უფლება(შესაძლებელი უნდა იყოს ტოპ მენეჯერმა თავის დაქვემდებარებაში მყოფ პროგრამების მონაცემები დაარედაქტიროს)
        '2'=>'პროექტის კოორდინატორი', //პროგრამის კოორდინატორები ხედავენ მათ პროგამაში გაწევრიანებულ პროექტის მენეჯერების პროექტებს შესაძლებელი უნდა იყოს რედაქტირების ჩართვის უფლება(უნდა ჰქონდეთ შესაძლებლობა დაარედაქტიროს პროექტის მენეჯერების შეყვანილი მონაცემები პროექტებზე)
        '3'=>'პროექტის მენეჯერი', //პროექტის მენეჯერები ხედავენ თავიანთ პროექტებს ააქვთ რედაქტირების უფლება
        '4'=>'ტესტერი',//სტუმრები ხედავენ ყველაფერს არ აქვთ უფლება რედაქტირების
        '5'=>'ადმინისტრატორი',//ადმინისტრატორი ყველაფერს ხედავენ და ყველაფრის რედაქტირების საშუალება აქვთ
        '6'=>'უფროსი' //სამსახურის უფროსები ვისი თანამშრომლებიც მონაწილეობენ პროეტებში მათი პროეტების ნახვის საშუალებით და რედაქტრების უფების გარეშე.
    ];

    private $User;

    function __construct() {
        
        $this->User =  $this->session();

    }

    public function getUsersProjects(){
    
        return $this->sql(array_search($this->User->User_Position,$this->dt));

    }

    private function session(){
        
        if(isset($_SESSION["user"])) return $_SESSION["user"];
    }
    private function sql($id){

        $data=[
            '1'=>[
                'sql'=>'',
                'read'=>true,
                'insert'=>false,
                'update'=>false,
                'delete'=>false
            ],
            '2'=>[
                'sql'=>'',
                'read'=>true,
                'insert'=>false,
                'update'=>false,
                'delete'=>false
            ],
            '3'=>[
                'sql'=>'',
                'read'=>true,
                'insert'=>false,
                'update'=>false,
                'delete'=>false
            ],
            '4'=>[
                'sql'=>'',
                'read'=>true,
                'insert'=>false,
                'update'=>false,
                'delete'=>false
            ],
            '5'=>[
                'sql'=>'',
                'read'=>true,
                'insert'=>false,
                'update'=>false,
                'delete'=>false
            ],
        ];

        return $data[$id];

    } 

}



?>