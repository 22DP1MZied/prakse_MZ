<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function fetchJsonData()
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/posts/1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request and get the response
        $response = curl_exec($ch);

        // Check for errors
        if(curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        }

        // Close cURL session
        curl_close($ch);

        // Decode the JSON response into an array
        $data = json_decode($response, true);

        // Return the JSON response
        return response()->json($data);
    }
}
