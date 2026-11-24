<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        $adminPassword = Hash::make('Admin123!');
        $userPassword = Hash::make('User123!');

        // Check if users already seeded
        if (DB::table('users')->count() === 0) {
            $michalAdminId = DB::table('users')->insertGetId([
                'name' => 'Michał Administrator',
                'email' => 'admin@fishing.pl',
                'password' => $adminPassword,
                'status' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('users')->insertGetId([
                'name' => 'Michał Muzyka',
                'email' => 'michal.muzyka2002@gmail.com',
                'password' => $adminPassword,
                'status' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $janUserId = DB::table('users')->insertGetId([
                'name' => 'Jan Kowalski',
                'email' => 'user@fishing.pl',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('users')->insertGetId([
                'name' => 'Michał Userowski',
                'email' => 'michal2.muzyka2002@gmail.com',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $elzbietaId = DB::table('users')->insertGetId([
                'name' => 'Elżbieta Nowak',
                'email' => 'elzbieta@wp.pl',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $piotrId = DB::table('users')->insertGetId([
                'name' => 'Piotr Wiśniewski',
                'email' => 'piotr@wp.pl',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $andrzejId = DB::table('users')->insertGetId([
                'name' => 'Andrzej Nowak',
                'email' => 'andrzej@wp.pl',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $karolId = DB::table('users')->insertGetId([
                'name' => 'Karol Kowalski',
                'email' => 'karol@wp.pl',
                'password' => $userPassword,
                'status' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $michalAdmin = DB::table('users')->where('status', 'admin')->first();
            $michalAdminId = $michalAdmin ? $michalAdmin->id : 1;
            $janUser = DB::table('users')->where('status', 'user')->first();
            $janUserId = $janUser ? $janUser->id : 2;
            $elzbietaId = $janUserId;
            $piotrId = $janUserId;
            $andrzejId = $janUserId;
            $karolId = $janUserId;
        }

        // 2. Comments / Opinions (Reviews)
        if (DB::table('comments')->count() === 0) {
            DB::table('comments')->insert([
                [
                    'user_id' => $michalAdminId,
                    'message' => 'Super sklep. Bogaty wybór sprzętu spinningowego i karpiowego. Przychodzę tu przed każdą wyprawą!',
                    'created_at' => '2024-06-16 15:33:25',
                    'updated_at' => '2024-06-17 11:29:56',
                ],
                [
                    'user_id' => $michalAdminId,
                    'message' => 'Obsługa klienta jest przyjazna i pomocna. Pracownicy chętnie udzielają porad i dzielą się swoją wiedzą na temat najlepszych miejsc do wędkowania czy nowości w świecie wędkarstwa.',
                    'created_at' => '2024-06-16 15:47:25',
                    'updated_at' => '2024-06-17 11:30:06',
                ],
                [
                    'user_id' => $elzbietaId,
                    'message' => 'Świetne zanęty i przynęty naturalne, zawsze świeże robaki i ochotka. Polecam każdemu!',
                    'created_at' => '2024-06-16 16:31:38',
                    'updated_at' => '2024-06-16 16:31:38',
                ],
                [
                    'user_id' => $elzbietaId,
                    'message' => 'Kupiłam tutaj kompletny zestaw spławikowy dla syna. Doradzili idealnie do jego wieku i umiejętności. Będę często wpadać.',
                    'created_at' => '2024-06-16 16:32:08',
                    'updated_at' => '2024-06-17 11:26:13',
                ],
                [
                    'user_id' => $andrzejId,
                    'message' => 'Super sklep wędkarski. Można tu znaleźć wszystko, co się potrzebuje, od drobnych haczyków po pontony.',
                    'created_at' => '2024-06-17 11:54:58',
                    'updated_at' => '2024-06-17 11:54:58',
                ],
                [
                    'user_id' => $karolId,
                    'message' => 'Sklep wędkarski z prawdziwego zdarzenia. Tutaj znajdziesz wszystko, czego potrzebujesz do udanej wędkarskiej wyprawy.',
                    'created_at' => '2024-06-17 11:56:23',
                    'updated_at' => '2024-06-17 11:56:23',
                ],
                [
                    'user_id' => $janUserId,
                    'message' => 'Błyskawiczna realizacja zamówień online. Wędka feederowa dotarła w idealnym stanie, zabezpieczona w sztywnej tubie.',
                    'created_at' => '2024-07-02 10:20:00',
                    'updated_at' => '2024-07-02 10:20:00',
                ],
                [
                    'user_id' => $piotrId,
                    'message' => 'Najlepszy asortyment woblerów i przynęt gumowych w mieście! Każdy spinningista znajdzie tu swoje kilerki.',
                    'created_at' => '2024-07-18 14:15:30',
                    'updated_at' => '2024-07-18 14:15:30',
                ],
                [
                    'user_id' => $elzbietaId,
                    'message' => 'Wysoka jakość odzieży termicznej i kaloszy piankowych. Zasiadki jesienne wreszcie są przyjemne i ciepłe.',
                    'created_at' => '2024-08-05 18:30:10',
                    'updated_at' => '2024-08-05 18:30:10',
                ],
                [
                    'user_id' => $andrzejId,
                    'message' => 'Bardzo profesjonalny serwis kołowrotków na miejscu – wyczyszczone, nasmarowane i chodzą jak nowe.',
                    'created_at' => '2024-09-12 12:45:00',
                    'updated_at' => '2024-09-12 12:45:00',
                ],
                [
                    'user_id' => $karolId,
                    'message' => 'Kupiłem sygnalizatory brań z centralką i swingery. Sprawdziły się znakomicie podczas weekendowej nocki na karpiach.',
                    'created_at' => '2024-10-01 16:00:20',
                    'updated_at' => '2024-10-01 16:00:20',
                ],
                [
                    'user_id' => $janUserId,
                    'message' => 'Ceny bardzo przystępne, a program rabatowy dla stałych bywalców pozwala sporo zaoszczędzić.',
                    'created_at' => '2024-11-03 09:10:00',
                    'updated_at' => '2024-11-03 09:10:00',
                ],
            ]);
        }

        // 3. Posts
        if (DB::table('posts')->count() === 0) {
            $postsFile = database_path('data/posts.json');
            if (file_exists($postsFile)) {
                $postsData = json_decode(file_get_contents($postsFile), true);
                foreach ($postsData as $postItem) {
                    DB::table('posts')->insert([
                        'title' => $postItem['title'],
                        'short_description' => $postItem['short_description'],
                        'content' => $postItem['content'],
                        'author' => $postItem['author'],
                        'image_link' => $postItem['image_link'],
                        'created_at' => $postItem['created_at'],
                        'updated_at' => $postItem['created_at'],
                    ]);
                }
            } else {
                DB::table('posts')->insert([
                    [
                        'title' => 'Najlepsze miejsca na wędkowanie',
                        'short_description' => 'Odkryj najlepsze miejsca na spokojne wędkowanie.',
                        'content' => 'Dziś rano wstałem przed świtem, pełen entuzjazmu na myśl o kolejnej wędkarskiej przygodzie. Opłynąłem spokojne jezioro łodzią, czując rytm fal i delikatny zapach porannej mgły. Po kilku godzinach połowu, zdobyłem kilka pięknych okoni. To była perfekcyjna harmonia między człowiekiem a przyrodą.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_6.jpg',
                        'created_at' => '2021-10-12 13:24:53',
                        'updated_at' => '2021-10-12 13:24:53',
                    ],
                    [
                        'title' => 'Techniki wędkarskie: spinning',
                        'short_description' => 'Poznaj tajniki skutecznego łowienia ryb na spinning.',
                        'content' => 'Wędkarstwo to sztuka balansu i zrozumienia ryb. Dziś spędziłem cały dzień nad malowniczym stawem. Złowiłem nie tylko ryby, ale także chwilę spokoju i ucieczki od codziennego zgiełku. Gdy szczupaczek wskoczył na moją wędkę, serce zabiło mi mocniej - ta ryba była wyjątkowa, tak jak każda chwila spędzona z wędką.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_5.jpg',
                        'created_at' => '2023-01-19 23:56:09',
                        'updated_at' => '2023-01-19 23:56:09',
                    ],
                    [
                        'title' => 'Złap swojego wielkiego Amura',
                        'short_description' => 'Praktyczne porady na złowienie wielkiego amura.',
                        'content' => 'Wędkarstwo to nie tylko sport, to pasja, która łączy nas z naturą. Dzisiaj postanowiłem wybrać się na dziką rzekę, pełną tajemnic i nieprzewidywalnych zwrotów akcji. Pomimo tego, że łowienie było wyzwaniem, udało mi się złowić kilka pięknych pstrągów. Czas spędzony nad wodą zawsze przynosi nowe doświadczenia i wrażenia.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_3.jpg',
                        'created_at' => '2022-10-24 08:26:12',
                        'updated_at' => '2022-10-24 08:26:12',
                    ],
                    [
                        'title' => 'Wiosenne połowy - karpie na powierzchni',
                        'short_description' => 'Jak skutecznie łowić karpie na powierzchni wiosną.',
                        'content' => 'Dzień spędzony nad rzeką to dzień pełen niespodzianek. Wędkarstwo to nie tylko o łowieniu ryb, ale także o obcowaniu z pięknem przyrody. Dziś złowiłem klenia, a chwile spędzone na brzegu rzeki pozwoliły mi oderwać się od codziennych zmartwień.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_4.jpg',
                        'created_at' => '2023-11-26 19:22:38',
                        'updated_at' => '2023-11-26 19:22:38',
                    ],
                    [
                        'title' => 'Zanęta DIY dla wędkarzy',
                        'short_description' => 'Jak przygotować własną zanętę do wędkowania.',
                        'content' => 'Wędkarstwo rzeczne ma swój urok. Wędrując brzegiem, spotkałem dzisiaj innych pasjonatów tego pięknego hobby. Wspólnie wymienialiśmy się historiami o największych zdobyczach. Z tego wszystkiego wyniosłem nie tylko ryby, ale także nowe przyjaźnie.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_1.jpg',
                        'created_at' => '2023-12-22 00:34:35',
                        'updated_at' => '2023-12-22 00:34:35',
                    ],
                    [
                        'title' => 'Wędkowanie nocą: sekrety połowu',
                        'short_description' => 'Odkryj tajniki nocnego wędkowania i złów ryby marzeń.',
                        'content' => 'Chwile samotności nad jeziorem są bezcenne. Dzisiaj to tylko ja, moja wędka i szum fal. Złowiłem spokojnego sandacza, ale najważniejsze to wewnętrzne wyciszenie i kontakt z naturą.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_1.jpg',
                        'created_at' => '2021-01-16 17:45:03',
                        'updated_at' => '2021-01-16 17:45:03',
                    ],
                    [
                        'title' => 'Rzeka Białka: raj dla wędkarzy',
                        'short_description' => 'Przygoda z wędkowaniem na malowniczej rzece Białka.',
                        'content' => 'Wędkarstwo to sztuka przewidywania ruchów ryb. Dziś próbowałem swoich sił w połowie na sporym stawie. Złowiłem kilka karpieńców, ale największą frajdę sprawiło mi obserwowanie natury wokół.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_7.webp',
                        'created_at' => '2021-06-18 16:01:35',
                        'updated_at' => '2021-06-18 16:01:35',
                    ],
                    [
                        'title' => 'Wędkarski sprzęt na sezon: top 10',
                        'short_description' => 'Przegląd najlepszego sprzętu wędkarskiego na nadchodzący sezon.',
                        'content' => 'Wspomnienia z wędkarskich wypraw są jak skarby. Każda wypłowiała fotografia, każdy drobny szczegół. Dziś złowiłem amura, a jednocześnie złapałem chwilę do zapamiętania.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_8.jpg',
                        'created_at' => '2023-03-08 03:52:50',
                        'updated_at' => '2023-03-08 03:52:50',
                    ],
                    [
                        'title' => 'Wędkowanie zimowe: złowione pod lodem',
                        'short_description' => 'Historie i porady związane z zimowym wędkowaniem pod lodem.',
                        'content' => 'Wędkarstwo to także nauka cierpliwości. Dzisiaj długo czekałem na swojego trofeum, ale warto było. Złowiłem wielkiego suma, który na chwilę zatopił moją łódkę swoim majestatycznym ogonem.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_9.jpg',
                        'created_at' => '2021-05-10 20:19:26',
                        'updated_at' => '2021-05-10 20:19:26',
                    ],
                    [
                        'title' => 'Pstrąg tęczowy: perła górskich potoków',
                        'short_description' => 'Sekrety połowu pstrąga tęczowego w górskich strumieniach.',
                        'content' => 'Łowienie na muchę to prawdziwa sztuka. Dziś wybrałem się na górską rzekę, gdzie delikatne unoszenie się much na wodzie kusiło pstrągi do ataku. To wędkarstwo wymagające precyzji, ale i dostarczające niezapomnianych emocji.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_10.jpg',
                        'created_at' => '2022-05-06 18:58:45',
                        'updated_at' => '2022-05-06 18:58:45',
                    ],
                    [
                        'title' => 'Magiczny dzień na brzegu: wędkarska przygoda w otoczeniu natury',
                        'short_description' => 'Zapraszamy do relaksu nad brzegiem, gdzie natura splata się z pasją wędkarską. Odkryj spokój wędkarskich chwil, złów swoje ulubione ryby, a wszystko to otoczone malowniczym krajobrazem.',
                        'content' => 'Wędkarstwo to nie tylko o samych rybach, ale także o przyjaźniach. Dzisiaj łowiłem w towarzystwie najlepszego przyjaciela. Chociaż ryby były kapryśne, to wspólna przygoda sprawiła, że dzień był udany.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_11.jpg',
                        'created_at' => '2023-08-08 10:55:31',
                        'updated_at' => '2023-08-08 10:55:31',
                    ],
                    [
                        'title' => 'Ryby drapieżne polskich jezior',
                        'short_description' => 'Opis i porównanie gatunków ryb drapieżnych występujących w polskich jeziorach.',
                        'content' => 'Zawsze fascynują mnie różne techniki wędkarskie. Dzisiaj eksperymentowałem z połowem spinningowym i udało mi się złowić kilka okoni na lekkie woblery. Każda metoda ma swój urok, a ja uwielbiam odkrywać nowe.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_12.jpg',
                        'created_at' => '2023-11-11 22:41:22',
                        'updated_at' => '2023-11-11 22:41:22',
                    ],
                    [
                        'title' => 'Złowione szczupaki nad Bugiem',
                        'short_description' => 'Relacja z połowów szczupaków nad malowniczym Bugiem.',
                        'content' => 'Wędkarstwo to nie tylko lato nad jeziorem. Dzisiaj zaryzykowałem połów w zimie. Choć aura była surowa, to udało mi się zdobyć kilka pstrągów pod lodem. To niesamowite doświadczenie, które na pewno powtórzę.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_13.jpg',
                        'created_at' => '2021-05-27 09:40:21',
                        'updated_at' => '2021-05-27 09:40:21',
                    ],
                    [
                        'title' => 'Wędkarstwo muchowe: sztuka łowienia',
                        'short_description' => 'Podstawy wędkarstwa muchowego i tajniki skutecznego połowu.',
                        'content' => 'Wędkarstwo to dziedzina, w której nigdy się nie kończy nauka. Dziś testowałem nowe przynęty i techniki połowu. Efekt? Złowiłem różnorodne gatunki ryb, co dowodzi, że warto być otwartym na nowości.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_14.jpg',
                        'created_at' => '2023-08-01 05:17:42',
                        'updated_at' => '2023-08-01 05:17:42',
                    ],
                    [
                        'title' => 'Wędkowanie na spławik: najlepsze metody',
                        'short_description' => 'Sekrety skutecznego wędkowania na spławik.',
                        'content' => 'Dziś postanowiłem spróbować swoich sił w wędkarstwie morskim. Wyruszyłem na głębokie wody, czując energię oceanu i tajemnicę głębin. Po długiej walce w końcu złowiłem imponującego dorsza. Jego srebrzysta skóra błyszczała na słońcu, a to uczucie spełnienia było bezcenne. Wędkarstwo to nie tylko łowienie ryb, to podróż w świat przygody i odkrywania.',
                        'author' => 'Michał Muzyka',
                        'image_link' => '/assets/img/posts/photo_15.jpg',
                        'created_at' => '2023-07-16 22:27:29',
                        'updated_at' => '2023-07-16 22:27:29',
                    ],
                ]);
            }
        }

        // 4. Fishes (Wasze połowy / Catches gallery)
        if (DB::table('fishes')->count() === 0) {
            DB::table('fishes')->insert([
                [
                    'user_id' => $michalAdminId,
                    'location' => 'Jezioro Śniardwy',
                    'fish_species' => 'Szczupak',
                    'catch_weight' => 5.40,
                    'catch_date' => '2024-05-12',
                    'photo_path' => 'fishes/szczupak.jpg',
                    'created_at' => '2024-05-12 18:30:00',
                    'updated_at' => '2024-05-12 18:30:00',
                ],
                [
                    'user_id' => $janUserId,
                    'location' => 'Zalew Zegrzyński',
                    'fish_species' => 'Okoń',
                    'catch_weight' => 1.35,
                    'catch_date' => '2024-05-25',
                    'photo_path' => 'fishes/okon.jpg',
                    'created_at' => '2024-05-25 10:15:00',
                    'updated_at' => '2024-05-25 10:15:00',
                ],
                [
                    'user_id' => $andrzejId,
                    'location' => 'Rzeka Narew',
                    'fish_species' => 'Sandacz',
                    'catch_weight' => 4.80,
                    'catch_date' => '2024-06-08',
                    'photo_path' => 'fishes/sandacz.jpg',
                    'created_at' => '2024-06-08 21:40:00',
                    'updated_at' => '2024-06-08 21:40:00',
                ],
                [
                    'user_id' => $karolId,
                    'location' => 'Łowisko Dębowa',
                    'fish_species' => 'Karp',
                    'catch_weight' => 14.20,
                    'catch_date' => '2024-06-22',
                    'photo_path' => 'fishes/karp.jpg',
                    'created_at' => '2024-06-22 06:10:00',
                    'updated_at' => '2024-06-22 06:10:00',
                ],
                [
                    'user_id' => $piotrId,
                    'location' => 'Rzeka Wisła (okolice Torunia)',
                    'fish_species' => 'Sum',
                    'catch_weight' => 21.50,
                    'catch_date' => '2024-07-05',
                    'photo_path' => 'fishes/sum.jpg',
                    'created_at' => '2024-07-05 23:05:00',
                    'updated_at' => '2024-07-05 23:05:00',
                ],
                [
                    'user_id' => $elzbietaId,
                    'location' => 'Rzeka Dunajec',
                    'fish_species' => 'Pstrąg potokowy',
                    'catch_weight' => 2.15,
                    'catch_date' => '2024-07-19',
                    'photo_path' => 'fishes/pstrag.jpg',
                    'created_at' => '2024-07-19 14:50:00',
                    'updated_at' => '2024-07-19 14:50:00',
                ],
                [
                    'user_id' => $janUserId,
                    'location' => 'Jezioro Gosławskie',
                    'fish_species' => 'Amur biały',
                    'catch_weight' => 11.60,
                    'catch_date' => '2024-08-02',
                    'photo_path' => 'fishes/amur.jpg',
                    'created_at' => '2024-08-02 17:20:00',
                    'updated_at' => '2024-08-02 17:20:00',
                ],
                [
                    'user_id' => $andrzejId,
                    'location' => 'Rzeka Odra (Wrocław)',
                    'fish_species' => 'Boleń',
                    'catch_weight' => 3.65,
                    'catch_date' => '2024-08-16',
                    'photo_path' => 'fishes/bolen.jpg',
                    'created_at' => '2024-08-16 08:30:00',
                    'updated_at' => '2024-08-16 08:30:00',
                ],
                [
                    'user_id' => $karolId,
                    'location' => 'Jezioro Powidzkie',
                    'fish_species' => 'Lin',
                    'catch_weight' => 2.45,
                    'catch_date' => '2024-09-04',
                    'photo_path' => 'fishes/lin.jpg',
                    'created_at' => '2024-09-04 11:10:00',
                    'updated_at' => '2024-09-04 11:10:00',
                ],
                [
                    'user_id' => $michalAdminId,
                    'location' => 'Jezioro Wigry',
                    'fish_species' => 'Węgorz',
                    'catch_weight' => 1.90,
                    'catch_date' => '2024-09-20',
                    'photo_path' => 'fishes/wegorz.jpg',
                    'created_at' => '2024-09-20 22:15:00',
                    'updated_at' => '2024-09-20 22:15:00',
                ],
            ]);
        }

        // 5. Orders (Zamówienia)
        if (DB::table('orders')->count() === 0) {
            DB::table('orders')->insert([
                [
                    'user_id' => $janUserId,
                    'selectedProducts' => 'Wędka spinningowa 2.7m, Kołowrotek z przednim hamulcem 3000, Plecionka 0.14mm',
                    'paymentMethod' => 'card',
                    'city' => 'Warszawa',
                    'postal_code' => '00-001',
                    'age' => 34,
                    'street' => 'Marszałkowska',
                    'houseNumber' => '12/4',
                    'created_at' => '2024-06-20 12:00:00',
                    'updated_at' => '2024-06-20 12:00:00',
                ],
                [
                    'user_id' => $elzbietaId,
                    'selectedProducts' => 'Wędka spławikowa typu bat 6m, Zestaw spławików, Żyłka 0.16mm',
                    'paymentMethod' => 'cash',
                    'city' => 'Kraków',
                    'postal_code' => '30-002',
                    'age' => 45,
                    'street' => 'Floriańska',
                    'houseNumber' => '5',
                    'created_at' => '2024-07-01 15:30:00',
                    'updated_at' => '2024-07-01 15:30:00',
                ],
                [
                    'user_id' => $andrzejId,
                    'selectedProducts' => 'Wędka karpiowa 3.6m 3lbs, Kołowrotek karpiowy z wolnym biegiem, Zestaw sygnalizatorów brań',
                    'paymentMethod' => 'card',
                    'city' => 'Poznań',
                    'postal_code' => '60-101',
                    'age' => 38,
                    'street' => 'Półwiejska',
                    'houseNumber' => '18A',
                    'created_at' => '2024-07-22 09:45:00',
                    'updated_at' => '2024-07-22 09:45:00',
                ],
                [
                    'user_id' => $piotrId,
                    'selectedProducts' => 'Zestaw woblerów szczupakowych (5 szt.), Przypony wolframowe, Podbierak gumowany',
                    'paymentMethod' => 'card',
                    'city' => 'Gdańsk',
                    'postal_code' => '80-001',
                    'age' => 29,
                    'street' => 'Długa',
                    'houseNumber' => '22/3',
                    'created_at' => '2024-08-10 17:15:00',
                    'updated_at' => '2024-08-10 17:15:00',
                ],
                [
                    'user_id' => $karolId,
                    'selectedProducts' => 'Wędka feederowa 3.3m c.w. 60g, Koszyki zanętowe, Przynęty dumbells 8mm',
                    'paymentMethod' => 'cash',
                    'city' => 'Wrocław',
                    'postal_code' => '50-001',
                    'age' => 42,
                    'street' => 'Świdnicka',
                    'houseNumber' => '7',
                    'created_at' => '2024-09-02 11:20:00',
                    'updated_at' => '2024-09-02 11:20:00',
                ],
            ]);
        }
    }
}
