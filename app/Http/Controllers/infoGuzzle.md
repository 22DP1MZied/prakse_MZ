# Guzzle HTTP Klients Laravel projektā

## **Kas ir Guzzle?**
Guzzle ir PHP bibliotēka HTTP pieprasījumu veikšanai, kas ļauj ērti un efektīvi sūtīt GET, POST, PUT, DELETE u.c. pieprasījumus uz API. Tas ir viegli konfigurējams, piedāvā asinhronus pieprasījumus un atbalsta dažādus autentifikācijas mehānismus.

### **Guzzle priekšrocības:**
- **Vienkārša sintakse** – viegli lasāms un rakstāms kods.
- **Pilnīgs HTTP klienta atbalsts** – darbojas ar visiem HTTP metožu veidiem.
- **Asinhrona pieprasījumu izpilde** – iespējams izpildīt vairākus pieprasījumus vienlaicīgi.
- **Integrācija ar Laravel** – to var izmantot Laravel servisos un kontrolieros.
- **Pielāgojami galvenes (headers) un vaicājuma parametri** – viegli pievienot papildu informāciju.
- **Iebūvēta kļūdu apstrāde** – ļauj apstrādāt kļūdas un izņēmumus.
- **Atbalsta JSON un XML** – var viegli nosūtīt un saņemt dažādus datu formātus.

---

## **1. Guzzle Instalēšana**
Lai pievienotu **Guzzle** Laravel projektam, palaidiet šo komandu terminālī:

```bash
composer require guzzlehttp/guzzle
```

Pēc veiksmīgas instalēšanas Guzzle būs pievienots projektam un to varēs izmantot visā kodā.

---

## **2. Vienkāršs GET pieprasījums**
Lai nosūtītu GET pieprasījumu un saņemtu datus no API, var izmantot šo kodu Laravel kontrolierī:

```php
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function fetchJsonData()
    {
        $client = new Client();
        $response = $client->get('https://jsonplaceholder.typicode.com/posts/1');
        $data = json_decode($response->getBody(), true);
        
        return response()->json($data);
    }
}
```

---

## **3. Pievienošana maršrutēm (routes)**
Lai šo API metodi padarītu pieejamu caur pārlūkprogrammu, pievienojiet maršrutu `routes/web.php` vai `routes/api.php`:

```php
use App\Http\Controllers\ApiController;

Route::get('/fetch-json', [ApiController::class, 'fetchJsonData']);
```

Tagad varat atvērt pārlūkprogrammu un ievadīt:
```
http://127.0.0.1:8000/fetch-json
```
Lai saņemtu JSON atbildi.

---

## **4. POST pieprasījuma veikšana**
Lai nosūtītu datus API ar **POST** pieprasījumu, izmantojiet šādu kodu:

```php
public function sendData()
{
    $client = new Client();
    $response = $client->post('https://jsonplaceholder.typicode.com/posts', [
        'json' => [
            'title' => 'Mans virsraksts',
            'body' => 'Šis ir mana POST pieprasījuma saturs',
            'userId' => 1
        ]
    ]);

    $data = json_decode($response->getBody(), true);
    return response()->json($data);
}
```

---

## **5. Guzzle izmantošana Laravel Servisos**
Labā prakse ir izveidot atsevišķu servisa klasi API pieprasījumiem.

1. **Izveidojiet failu `app/Services/ApiService.php`:**
   ```php
   namespace App\Services;
   
   use GuzzleHttp\Client;
   
   class ApiService
   {
       protected $client;
   
       public function __construct()
       {
           $this->client = new Client();
       }
   
       public function fetchPost()
       {
           $response = $this->client->get('https://jsonplaceholder.typicode.com/posts/1');
           return json_decode($response->getBody(), true);
       }
   }
   ```

2. **Pievienojiet servisu kontrolierī:**
   ```php
   use App\Services\ApiService;
   
   public function fetchData(ApiService $apiService)
   {
       $data = $apiService->fetchPost();
       return response()->json($data);
   }
   ```

---

## **6. Kļūdu Apstrāde**
Lai apstrādātu iespējamās kļūdas, pievienojiet `try-catch` blokā:

```php
try {
    $response = $client->get('https://jsonplaceholder.typicode.com/posts/1');
    $data = json_decode($response->getBody(), true);
} catch (\GuzzleHttp\Exception\RequestException $e) {
    return response()->json(['error' => 'Neizdevās izveidot savienojumu'], 500);
}
```

---

## **7. Autentifikācija ar Guzzle**
Guzzle atbalsta dažādas autentifikācijas metodes, piemēram, Bearer Token, Basic Auth un OAuth.

### **Bearer Token autentifikācija**
```php
$response = $client->get('https://api.example.com/data', [
    'headers' => [
        'Authorization' => 'Bearer YOUR_ACCESS_TOKEN'
    ]
]);
```

### **Basic Auth autentifikācija**
```php
$response = $client->get('https://api.example.com/data', [
    'auth' => ['username', 'password']
]);
```

### **API Atslēgas izmantošana**
```php
$response = $client->get('https://api.example.com/data', [
    'query' => ['api_key' => 'YOUR_API_KEY']
]);
```

---

## **Secinājums**
Guzzle ir spēcīgs un viegli lietojams HTTP klients, kas palīdz veikt API pieprasījumus Laravel projektā. Tā izmantošana kopā ar servisa klasi padara kodu organizētāku un pārskatāmāku.

Tas piedāvā asinhronus pieprasījumus, kļūdu apstrādi un vairākus autentifikācijas veidus, padarot to par vienu no labākajiem rīkiem API integrācijām PHP projektos.


