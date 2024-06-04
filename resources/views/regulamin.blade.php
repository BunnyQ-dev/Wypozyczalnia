@extends('layouts.main')

@section('content')
    <style>
        .container-fluid {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            padding-top: 110px;
        }

        h2 {
            font-size: 24px;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        strong {
            font-weight: bold;
        }
    </style>

    <div class="container-fluid">
        <h1>Regulamin Wypożyczalni Maszyn Budowlanych</h1>

        <h2>§1. Postanowienia ogólne</h2>
        <p>Regulamin określa zasady i warunki wypożyczania maszyn budowlanych przez firmę [Nazwa Firmy], zwaną dalej „Wypożyczalnią”. Regulamin jest integralną częścią umowy najmu zawieranej pomiędzy Wypożyczalnią a Najemcą. Najemca zobowiązany jest do zapoznania się z regulaminem przed zawarciem umowy najmu.</p>

        <h2>§2. Warunki najmu</h2>
        <p>Maszyny budowlane wynajmowane są na podstawie umowy najmu zawartej w formie pisemnej. Najemca zobowiązuje się do korzystania z maszyn zgodnie z ich przeznaczeniem i instrukcją obsługi. Wypożyczalnia zastrzega sobie prawo do odmowy wynajmu maszyn bez podania przyczyny.</p>

        <h2>§3. Czas trwania najmu</h2>
        <p>Okres najmu ustalany jest indywidualnie w umowie najmu. Najemca zobowiązany jest do zwrotu maszyny w ustalonym terminie. Przedłużenie okresu najmu wymaga zgody Wypożyczalni.</p>

        <h2>§4. Opłaty i płatności</h2>
        <p>Najemca zobowiązany jest do uiszczenia opłaty najmu zgodnie z cennikiem Wypożyczalni. Opłata najmu obejmuje koszty eksploatacyjne maszyny, chyba że umowa stanowi inaczej. Płatność za najem dokonywana jest z góry za cały okres najmu, chyba że strony ustalą inaczej.</p>

        <h2>§5. Kaucja</h2>
        <p>Wypożyczalnia może zażądać kaucji przed wydaniem maszyny Najemcy. Kaucja zwracana jest Najemcy po zakończeniu okresu najmu, pod warunkiem zwrotu maszyny w stanie niepogorszonym ponad normalne zużycie.</p>

        <h2>§6. Obowiązki Najemcy</h2>
        <p>Najemca zobowiązuje się do użytkowania maszyny z należytą starannością i zgodnie z jej przeznaczeniem. Najemca ponosi odpowiedzialność za wszelkie szkody powstałe w wyniku niewłaściwego użytkowania maszyny. Najemca zobowiązany jest do niezwłocznego informowania Wypożyczalni o wszelkich awariach lub uszkodzeniach maszyny.</p>

        <h2>§7. Obowiązki Wypożyczalni</h2>
        <p>Wypożyczalnia zobowiązuje się do wydania maszyny w stanie technicznie sprawnym i gotowym do użytku. Wypożyczalnia przeprowadza regularne przeglądy techniczne i konserwację maszyn.</p>

        <h2>§8. Odpowiedzialność</h2>
        <p>Wypożyczalnia nie ponosi odpowiedzialności za szkody powstałe w wyniku niewłaściwego użytkowania maszyn przez Najemcę. W przypadku uszkodzenia lub utraty maszyny Najemca zobowiązany jest do pokrycia kosztów naprawy lub zakupu nowej maszyny.</p>

        <h2>§9. Zwrot maszyny</h2>
        <p>Najemca zobowiązany jest do zwrotu maszyny w stanie niepogorszonym ponad normalne zużycie. Maszyna powinna być zwrócona czysta i w pełni sprawna technicznie.</p>

        <h2>§10. Postanowienia końcowe</h2>
        <p>W sprawach nieuregulowanych niniejszym regulaminem zastosowanie mają przepisy Kodeksu cywilnego. Wszelkie zmiany regulaminu wymagają formy pisemnej pod rygorem nieważności. Ewentualne spory wynikłe z tytułu wykonywania umowy najmu będą rozstrzygane przez sąd właściwy dla siedziby Wypożyczalni.</p>

        <h2><a href="{{ route('kontakt') }}">Kontakt</a></h2>
        <p><strong>Rentify</strong><br>
            ul. Czarnieckiego 16, 37-500 Jarosław<br>
            123-456-789<br>
            info@rentify.pl</p>

        <p>Podpisując umowę najmu, Najemca oświadcza, że zapoznał się z treścią niniejszego regulaminu i akceptuje jego warunki.</p>
    </div>
@endsection
