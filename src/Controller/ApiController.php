<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route("/api", name: "api")]
    public function jsonData(): Response
    {
        $data = [
            '/' => "Home Page",
            '/about' => 'About Page',
            '/report' => 'Report Page',
            '/api' => 'API Page',
            '/api/quote' => 'Generate Ranom Quote',
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/quote", name: "api_quote")]
    public function randomQuote(): JsonResponse
    {

        $quotes = [
            "The greatest glory in living lies not in never falling, but in rising every time we fall. - Nelson Mandela",
            "The way to get started is to quit talking and begin doing. - Walt Disney",
            "Life is what happens when you're busy making other plans. - John Lennon",
            "The future belongs to those who believe in the beauty of their dreams. - Eleanor Roosevelt",
            "It is during our darkest moments that we must focus to see the light. - Aristotle",
        ];


        $randomQuote = $quotes[array_rand($quotes)];

        $todayDate = date("Y-m-d");

        $timestamp = time();

        $formattedTimestamp = date("Y-m-d H:i:s", $timestamp);

        $response = new JsonResponse([
            'quote' => $randomQuote,
            'Todays Date' => $todayDate,
            'Time Stamp' => $formattedTimestamp
        ]);

        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }
}