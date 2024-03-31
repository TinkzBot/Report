<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    #[Route('/lucky', name: 'lucky')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        $colors = ['red', 'blue', 'green', 'yellow', 'purple'];
        $randomColor = $colors[array_rand($colors)];
        $css = "<style>
                    body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; text-align: center; padding: 50px; }
                    .lucky-number { background-color: $randomColor; color: white; padding: 20px; border-radius: 10px; display: inline-block; }
                    img { border: 5px solid $randomColor; border-radius: 10px; }
                    h1 { color: $randomColor; }
                </style>";

        $htmlContent = "
            $css
            <html>
                <body>
                    <h1>Your Lucky Page</h1>
                    <div class='lucky-number'>Lucky number: $number</div>
                    <p>Today's lucky color is <span style='color: $randomColor;'>$randomColor</span>!</p>
                    <img src='https://source.unsplash.com/random/400x200' alt='Random Unsplash Image'>
                    <p>Refresh the page for new luck!</p>
                </body>
            </html>";

        return new Response($htmlContent);
    }
}
