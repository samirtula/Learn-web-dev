<?php

require_once __DIR__ . '/vendor/autoload.php';
$googleKeyPath = __DIR__ . '/tables-pipe-fedf596b58cb.json';

class GoogleTables
{
    CONST  SCOPE = 'https://www.googleapis.com/auth/spreadsheets';
    public $googleTableId = '';
    public $googleService = null;
    public $googleTable = null;
    public $googleTableProperties = null;
    public $googleSheetsProperties = null;
    public $googleSheetData = null;

// в конструктор передаем путь до файла с ключем api, id таблицы и имя страницы.
    public function __construct($googleKeyPath, $googleTableId)
    {
        $this->googleTableId = $googleTableId;
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleKeyPath);
        $this->googleConnection();
        $this->getGoogleTable();
    }

// создаем связь с googleApi и spreadsheets  в частности
    private function googleConnection()
    {
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(self::SCOPE);
        return $this->googleService = new Google_Service_Sheets($client);
    }

// получаем таблицу из googleApi включая свойства
    public function getGoogleTable()
    {
        return $this->googleTable = $this->googleService->spreadsheets->get($this->googleTableId);
    }

// через googleApi получаем данные о свойствах таблицы
    public function getTableProperties()
    {
        return $this->googleTableProperties = $this->googleTable->getProperties();
    }

// через googleApi получаем данные о свойствах каждого листа таблицы
    public function getAllSheetsProperties()
    {
        foreach ($this->googleTable->getSheets() as $key => $sheet) {
            $this->googleSheetsProperties[$key] = $sheet->getProperties();
        }
        return $this->googleSheetsProperties;
    }

// через googleApi получаем данные конкретного листа
    public function getSheetData($pageName = 'Лист1')
    {
        return $this->googleSheetData = $this->googleService
            ->spreadsheets_values
            ->get($this->googleTableId, $pageName)
            ->values;
    }
// через  googleApi записываем данные в таблицу при вызове метода данные должны передаваться во вложенном массиве,
// вторым аргументом адрес ячейки в виде ассоциативного массива где column наименование колонки, а row номер ряда
    public function setDataToTable($value = [[]], $cell = ['column' => 'A', 'row' => 0], $pageName = 'Лист1')
    {
        if ($cell['row'] > 0) {
            $requestBody = new Google_Service_Sheets_ValueRange();
            $requestBody->setValues($value);
            $cellForAdd = "!" . $cell['column'] . $cell['row'];
            $options = ['valueInputOption' => 'USER_ENTERED'];
            $this->googleService
                ->spreadsheets_values
                ->update($this->googleTableId, $pageName . $cellForAdd, $requestBody, $options);
        }
    }
}

$sheets = new GoogleTables($googleKeyPath, '1PwtzU4_3IzPkIjOTF-6xC0VON3-XyxhINrYm7t3gY0g');


class SetGoogleTablesDataToPipe
{
    private $googleTable = null;

    public function __construct($googleKeyPath, $googleTableId, $pageName = 'Лист1')
    {
        $this->googleTable = new GoogleTables($googleKeyPath, $googleTableId);
        $this->googleTable->getSheetData($pageName);
        $this->setDataToPipe($pageName);
    }

// запись данных в pipe
    private function setDataToPipe($pageName)
    {
        $requestBody = new Google_Service_Sheets_ValueRange();
        $value = [['Y']];
        $requestBody->setValues($value);
        $options = ['valueInputOption' => 'USER_ENTERED'];
        if (is_array($this->googleTable->googleSheetData)) {
// перебираем каждый ряд на листе таблицы кроме первого
            foreach ($this->googleTable->googleSheetData as $key => $row) {
                if ($key > 0) {
                    $personalData = [
                        'processedValue' => $this->stripTagsAndTrim($row[0]),
                    ];
// проверка первой ячеки ряда на статус обработан
                    if (empty($personalData['processedValue'])) {
                        $personalData += [
                            'personName' => $this->stripTagsAndTrim($row[1]),
                            'personEmailValue' => $this->stripTagsAndTrim($row[2]),
                            'personTelNum' => $this->stripTagsAndTrim($row[3]),
                            'organization' => $this->stripTagsAndTrim($row[4]),
                            'position' => $this->stripTagsAndTrim($row[5]),
                            'event' => $this->stripTagsAndTrim($row[6])
                        ];
                        $person = $this->checkPersonInPipe($personalData['personEmailValue']);
// проверка на существование email
                        if ($person) {
                            $this->createEvent($personalData);
                        } else {
                            $person = $this->createPerson($personalData);
                            $this->createEvent($personalData);
                        }
// записываем Y в первую ячейку данного ряда, что этот ряд уже отработан
                        $rowNumberInTable = $key + 1;
                        $this->googleTable->googleService
                            ->spreadsheets_values
                            ->update($this->googleTable->googleTableId, $pageName . "!A$rowNumberInTable", $requestBody, $options);
                    }
                }
            }
        }
    }

    private function stripTagsAndTrim($value)
    {
        return strip_tags(trim($value));
    }

    private function checkPersonInPipe($email)
    {
        // $person = new Pipe->getPersonByEmail($email);
        // return $person;
    }

    private function createPerson($personalData)
    {
        // $person = new Person(значения);
        //return $person;
    }

    private function createEvent($personalData)
    {
        // $event = new FormEventMain();
        // $event->accept(передаем значения из personalData);
        // return $event;
    }
}

$setToPipeData = new SetGoogleTablesDataToPipe($googleKeyPath, '1PwtzU4_3IzPkIjOTF-6xC0VON3-XyxhINrYm7t3gY0g', 'Лист1');


