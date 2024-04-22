# Neutron-0

## Abstract
Projekt Neutron-0 ma na celu usprawnienie procesów zarządzania i dokumentowania protokołów badawczych, zapewniając jednocześnie możliwość analizy danych oraz generowania istotnych raportów dla użytkowników.

## Szczegóły
Projekt Neutron-0 stanowi system zarządzania protokołami badawczymi, stworzony w oparciu o framework Laravel. Celem projektu jest ułatwienie organizacji i monitorowania różnorodnych procesów związanych z przeprowadzaniem, dokumentowaniem i śledzeniem wyników protokołów badawczych.

System umożliwia użytkownikom tworzenie różnych rodzajów protokołów, takich jak protokoły z badań odbiorczych, okresowych czy po remoncie. Każdy protokół zawiera informacje dotyczące tytułu, numeru, daty, zleceniodawcy, rodzaju, orzeczenia oraz uwag. Dodatkowo, protokoły mogą być przypisane do użytkowników oraz mieć przypisane mierniki, co umożliwia szczegółowe śledzenie i analizę danych.

Projekt umożliwia również tworzenie oraz zarządzanie obiektami, które mogą być powiązane z protokołami. Obiekty mogą zawierać badania, co pozwala na strukturalne przechowywanie danych dotyczących przeprowadzonych testów oraz wyników.

Kluczowe cechy projektu obejmują:
<ul>
    <li>Tworzenie, edycję i usuwanie różnych rodzajów protokołów badawczych.</li>
    <li>Zarządzanie użytkownikami, zleceniodawcami oraz miernikami.</li>
    <li>Strukturalne przechowywanie danych dotyczących obiektów oraz powiązanych z nimi badań.</li>
    <li>Możliwość ustalania dat następnych badań dla poszczególnych protokołów.</li>
    <li>Dokumentowanie wyników badań oraz generowanie raportów.</li>
</ul>

## Wymagania
<ul>
<li>Server MySQL</li>
<li>PHP</li>
</ul>

## Instalacja i uruchomienie

`gh repo clone Sagittarius-py/Neutron-0`

`cd Neutron-0`

`npm install`

`npm run dev`

`php artisan migrate`

`php artisan serve`

## Baza danych
![ERD](/database/migrations/2024_04_22_222416_erd.svg)

# TODO
<ol>
<li>Modele</li>
<li>Kontrolery</li>
<li>Widoki</li>
</ol>