# Motyw WordPress „Masz Ci Kwiatek”

Ten motyw odtwarza 1:1 wygląd i działanie statycznej strony maszcikwiatek.pl
(wideo w tle, animacje, banner/okno zgód na cookies, panel dostępności WCAG,
przełącznik PL/EN), ale wszystkie teksty i większość zdjęć edytuje się teraz
z poziomu kokpitu WordPressa — bez dotykania kodu.

## 1. Czego potrzebujesz

- WordPress (6.0+) na własnym hostingu.
- Darmowa wtyczka **Advanced Custom Fields** (ACF) — daje ładne, opisane pola
  zamiast surowego "Custom Fields". Motyw działa też bez niej, ale wtedy pola
  poniżej nie pokażą się w kokpicie.
- Wtyczka **Polylang** (darmowa) — obsługa wersji PL/EN.

## 2. Instalacja

1. Spakuj zawartość tego folderu (`masz-ci-kwiatek/`) do ZIP-a i wgraj przez
   **Wygląd → Motywy → Dodaj nowy → Wgraj motyw**, albo wrzuć folder przez
   FTP/SFTP do `wp-content/themes/`.
2. Aktywuj motyw. Przy pierwszej aktywacji motyw sam utworzy ukrytą stronę
   **„Ustawienia strony”** (slug `ustawienia-strony`) — to na niej wpiszesz
   dane kontaktowe, godziny i zdjęcia używane w całej witrynie.
3. Zainstaluj i aktywuj wtyczki ACF oraz Polylang (**Wtyczki → Dodaj nową**).

## 3. Utwórz strony i przypisz szablony

W **Strony → Dodaj nową** utwórz 6 stron i każdej, w bocznym panelu
**Atrybuty strony → Szablon**, przypisz odpowiedni szablon:

| Strona          | Szablon (Atrybuty strony)   |
|-----------------|------------------------------|
| Strona główna   | Strona główna                |
| O nas           | O nas                        |
| Usługi          | Usługi                        |
| Portfolio       | Portfolio                     |
| Kontakt         | Kontakt                       |
| Polityka prywatności | Polityka prywatności    |

Następnie w **Ustawienia → Czytanie** ustaw "Strona główna wyświetla:
Stronę statyczną" i wybierz jako stronę główną tę ze szablonem
**„Strona główna”**.

## 4. Wypełnij „Ustawienia strony”

Otwórz stronę **Ustawienia strony** (jest ukryta, nie ma jej w żadnym menu) i
uzupełnij pola: telefon, e-mail, link do Facebooka/TikToka, WhatsApp, adres,
NIP, logo, zdjęcie Kwiatomatu oraz godziny otwarcia. Te dane pokazują się
automatycznie w headerze, stopce, na stronie kontaktowej i w mapie dojazdu.

## 5. Menu

**Wygląd → Menu** → utwórz dwa menu:
- **Menu główne** (lokalizacja: *Menu główne (header)*) — Home, O nas,
  Usługi, Portfolio, Kontakt.
- **Menu w stopce** (lokalizacja: *Menu w stopce*) — O nas, Usługi,
  Portfolio, Kontakt (bez Home, tak jak w oryginalnym projekcie).

## 6. Dodaj treści list (rosną z czasem, więc mają własne "wpisy")

W lewym menu kokpitu pojawiły się trzy nowe pozycje — dodawanie kolejnego
elementu wygląda dokładnie jak dodawanie zwykłego wpisu na blogu:

- **Usługi** — jedna pozycja = jedna karta usługi (np. "Bukiety"). Tytuł =
  nazwa usługi, treść = opis, plus pole *Ikona* (wybór z listy). Kolejność
  kart ustawiasz przeciągając w liście "Wszystkie usługi" (Screen Options →
  włącz widok listy z przeciąganiem, albo wejdź w edycję i użyj pola
  "Kolejność" jeśli je widzisz).
- **Opinie** — jedna pozycja = jedna opinia klienta. Tytuł = imię i
  nazwisko, treść = tekst opinii, plus pola *Liczba gwiazdek* i *Źródło*
  (np. "Google · 5 opinii").
- **Portfolio** — jedna pozycja = jeden kafelek portfolio. Tytuł = nazwa,
  plus pola *Ikona*, *Podpis*, *Link* (Facebook/TikTok, opcjonalnie) i
  przełącznik *To kafelek wideo*.

Strona główna pokazuje pierwsze 5 usług / 8 opinii / 3 realizacje; pełne
listy widać na stronach Usługi i Portfolio.

## 7. Wypełnij pola tekstowe na każdej stronie

Po przypisaniu szablonu, przy edycji każdej strony w prawym/dolnym panelu
pojawią się grupy pól ACF (nagłówek "hero", teksty sekcji, przyciski CTA
itd.) pogrupowane w zakładki — uzupełnij je tekstem zastępującym to, co
wcześniej było na sztywno w HTML-u. Historia firmy na stronie "O nas" i sama
treść polityki prywatności edytuje się w zwykłym edytorze bloków (główne
pole treści strony), nie w ACF.

## 8. Wersja angielska (Polylang)

1. **Języki → Języki** → dodaj Polski i Angielski (Polski jako domyślny).
2. Na liście każdej Strony/Usługi/Opinii/Realizacji zobaczysz teraz kolumny
   z flagami — kliknij "+", żeby utworzyć angielską wersję tego wpisu, i
   przetłumacz jego pola tak samo jak polską wersję.
3. **Języki → Tłumaczenia ciągów** (String translations) → grupa "Masz Ci
   Kwiatek - elementy stałe" — tu tłumaczysz stałe napisy, których nie ma na
   żadnej stronie (np. "Zamów kwiaty", tekst banera cookies, etykiety w
   panelu WCAG).
4. Menu (krok 5) też trzeba skonfigurować dla obu języków — Polylang doda
   przełącznik języka menu w Wygląd → Menu.

Przełącznik PL/EN w headerze i w menu mobilnym pojawi się sam, automatycznie,
gdy tylko Polylang jest aktywny i ma skonfigurowane oba języki.

## 9. Co zostaje "zaszyte" w motywie (celowo, nieedytowalne z kokpitu)

- Wideo w tle (`assets/video/`), dekoracyjne kwiaty (`assets/img/flower-*`)
  — to gotowe, przetworzone pliki (przycięte/przekolorowane), podmiana
  wymagałaby ponownej obróbki wideo, nie jest to zwykłe "podmień zdjęcie".
- Cały wygląd (kolory, animacje, banner cookies, panel WCAG) — kod w
  `assets/css/style.css` i `assets/js/main.js`, identyczny jak na
  oryginalnej stronie.

## 10. Test przed publikacją

Sprawdź: menu mobilne, banner cookies (Akceptuj/Odrzuć/Dostosuj), panel
dostępności (lewy dolny róg), formularz kontaktowy (wysyła przez
FormSubmit.co — adres e-mail ustawiasz w polu *Adres wysyłki formularza* na
stronie Kontakt), oraz przełącznik PL/EN na każdej podstronie.
