<?php

// 1. DANE WEJŚCIOWE
$uczniowie = [
    ["imie" => "Adam", "punkty" => 85],
    ["imie" => "Kasia", "punkty" => 92],
    ["imie" => "Marek", "punkty" => 48],
    ["imie" => "Ola", "punkty" => 67],
    ["imie" => "Tomek", "punkty" => 35]
];

// 2. FUNKCJE
function obliczProcent($punkty) {
    return $punkty;
}

function przyznajOcene($punkty) {
    if ($punkty >= 90) {
        return 5;
    } elseif ($punkty >= 80) {
        return 4;
    } elseif ($punkty >= 60) {
        return 3;
    } elseif ($punkty >= 40) {
        return 2;
    } else {
        return 1;
    }
}

function czyZdal($punkty) {
    return $punkty >= 40;
}

// 3. WYŚWIETLANIE WYNIKÓW INDYWIDUALNYCH 
echo "RAPORT WYNIKÓW TESTU INFORMATYCZNEGO\n";
echo "--------------------------------\n";

$zdali = [];
$nieZdali = [];

foreach ($uczniowie as $uczen) {
    $imie = $uczen["imie"];
    $punkty = $uczen["punkty"];
    $procent = obliczProcent($punkty);
    $ocena = przyznajOcene($punkty);
    $zdal = czyZdal($punkty);

    if ($zdal) {
        $zdali[] = $imie;
        $status = "ZALICZONY";
    } else {
        $nieZdali[] = $imie;
        $status = "NIEZALICZONY";
    }

    echo "$imie\n";
    echo "Punkty: $punkty\n";
    echo "Procent: $procent%\n";
    echo "Ocena: $ocena\n";
    echo "Status: $status\n\n";
}

// 4. OBLICZENIA DLA KLASY 
$sumaPunktow = 0;
$liczbaUczniow = count($uczniowie);

for ($i = 0; $i < $liczbaUczniow; $i++) {
    $sumaPunktow += $uczniowie[$i]["punkty"];
}

$srednia = $sumaPunktow / $liczbaUczniow;

// 5. INSTRUKCJA SWITCH 
$komentarz = "";
switch (true) {
    case ($srednia < 40):
        $komentarz = "Bardzo słaby wynik klasy";
        break;
    case ($srednia >= 40 && $srednia < 60):
        $komentarz = "Wynik klasy jest niezadowalający";
        break;
    case ($srednia >= 60 && $srednia < 80):
        $komentarz = "Dobry wynik klasy";
        break;
    case ($srednia >= 80):
        $komentarz = "Bardzo dobry wynik klasy";
        break;
}

// 6. PODSUMOWANIE 
echo "--------------------------------\n";
echo "PODSUMOWANIE KLASY\n\n";
echo "Liczba uczniów: $liczbaUczniow\n";
echo "Suma punktów: $sumaPunktow\n";
echo "Średnia punktów: " . round($srednia, 1) . "\n\n";
echo "Zaliczyło: " . count($zdali) . "\n";
echo "Nie zaliczyło: " . count($nieZdali) . "\n";

if (count($nieZdali) > 0) {
    echo "Uczniowie, którzy nie zaliczyli: " . implode(", ", $nieZdali) . "\n";
}

echo "\nKomentarz: $komentarz\n";
