1: php artisan vendor:publish --tag=contactform-views --force
2: php artisan vendor:publish --tag=contactform-config
3: @include('contactform::components.contact-form') doe dit ergens in een pagina waarop je het contactformulier wilt weergeven
4: maak een cloudflare turnstile aan en plaats de codes in het env bestand
5: post /contact doet het daadwerkelijk mail gebeuren
