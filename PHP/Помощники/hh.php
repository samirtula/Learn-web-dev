<?php
/*$api = 'https://api.hh.ru/vacancies?employer_id=205152&per_page=5';
$options = [
  'http' => [
      'method' => 'GET',
      'header' => 'User-Agent: test'
  ]
];
$context = stream_context_create($options);

$data = file_get_contents($api,false, $context);
$decodedData = json_decode($data,1);
$vacancies = $decodedData['items'];

function publishedTime($timeOne, $timeTwo)
    {
        if (strtotime($timeOne['published_at']) === strtotime($timeTwo['published_at'])) return 0;
        return strtotime($timeOne['published_at']) > strtotime($timeTwo['published_at']) ? -1 : 1;
    }

usort($vacancies, 'publishedTime');

$activeVacancies = [];
foreach ($vacancies as $vacancy) {
    if ($vacancy['archived'] == false) {
        $activeVacancies[] = $vacancy;
    }
}

$newVacancies = array_slice($activeVacancies,0,3);


echo '<pre>';
print_r($vacancies);*/

class Vacancies
{
    private $baseUrl = 'https://api.hh.ru/vacancies?employer_id=';
    private $perPage= '&per_page=';
    private $options =  [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: test'
        ]
    ];
    private $vacancies = [];
    private $activeVacancies = [];
    private $filteredVacanciesLength = 3;
    public $filteredVacancies = [];

    public $employerId= '';

    public function __construct($employerId, $vacanciesNum = '30', $filteredVacanciesLength = 3)
    {
        $this->employerId = $employerId;
        $this->filteredVacanciesLength = $filteredVacanciesLength;
        $this->getVacancies($vacanciesNum);
        $this->filterVacancies();
    }

    private function getVacancies($vacanciesNum)
    {
        $fullUrl = $this->baseUrl . $this->employerId . $this->perPage . $vacanciesNum;
        $context = stream_context_create($this->options);
        $data = file_get_contents($fullUrl,false, $context);
        $decodedData = json_decode($data,1);
        $this->vacancies = $decodedData['items'];
    }

    private function filterVacancies()
    {
        function publishedTime($timeOne, $timeTwo)
        {
            if (strtotime($timeOne['published_at']) === strtotime($timeTwo['published_at'])) return 0;
            return strtotime($timeOne['published_at']) > strtotime($timeTwo['published_at']) ? -1 : 1;
        }

        usort($this->vacancies, 'publishedTime');

        foreach ($this->vacancies as $vacancy) {
            if ($vacancy['archived'] == false && $vacancy['type']['id'] == 'open') {
                $this->activeVacancies[] = $vacancy;
            }
        }
        $this->filteredVacancies = array_slice( $this->activeVacancies,0, $this->filteredVacanciesLength);
    }
}

$vacancies = new Vacancies('205152',30,2);

echo '<pre>';
print_r($vacancies->filteredVacancies);

/*
 $positionName = $vacancies[0]['name'];
$salary = $vacancies[0]['salary']['from'] .'-' . $vacancies[0]['salary']['to']

 */
