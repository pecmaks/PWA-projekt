-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 07:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmovi_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(3, 'Maks', 'Pećušak', 'makstrix', '$2y$10$pDcDMy0ydXzVRuUINxT93.7TyI.iiZQ1.bOtiE4bKfg9SATsggJcm', 0),
(4, 'Admin', 'Admin', 'admin', '$2y$10$QJI.dIQeJ9HA9tUPCwCyz.Tf19tIuDowDrUbxC3FeEA2eSIelQVPy', 1),
(5, 'Ivo', 'Novak', 'Walter White', '$2y$10$jUqo.NgLkXGfwOpY64g./.XvqgiHh7uZ/57qHLpfkURANkECwik3W', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `sazetak` varchar(255) NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(100) NOT NULL,
  `kategorija` varchar(20) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(2, '2025-06-20', 'Inception', 'Žanr: Znanstvena fantastika, Triler | Redatelj: Christopher Nolan | Trajanje: 148 min', 'Inception je vizualno zapanjujući znanstvenofantastični triler koji istražuje svijet snova, podsvijesti i stvarnosti. Film prati Dom Cobba (Leonardo DiCaprio), stručnjaka za ekstrakciju informacija iz podsvijesti tijekom sna, koji dobiva izazovan zadatak: ne ukrasti ideju, već je usaditi – proces poznat kao \"inception\".Redatelj Christopher Nolan majstorski koristi nelinearnu naraciju i višeslojnu strukturu sna u snu, stvarajući napetu i intelektualno zahtjevnu priču. Inception istražuje teme krivnje, gubitka i stvarnosti kroz emocionalnu i filozofsku dubinu, uz impresivne vizualne efekte i glazbu Hansa Zimmera koja dodatno pojačava atmosferu.Film je osvojio brojne nagrade, uključujući Oscare za kinematografiju, vizualne efekte, montažu i zvuk. \"Inception\" ostaje jedan od najhvaljenijih i najutjecajnijih filmova 21. stoljeća, uz neizbrisivu završnu scenu koja i dalje potiče rasprave među gledateljima.', 'inception.jpg', 'akcija', 0),
(3, '2025-06-20', 'Breaking bad', 'Žanr: Krimi, Drama, Triler | Stvorio: Vince Gilligan | Broj sezona: 5', '\"Breaking Bad\" je revolucionarna televizijska serija koja prati priču Waltera Whitea, srednjoškolskog profesora kemije koji nakon dijagnoze raka pluća ulazi u svijet proizvodnje metamfetamina. Njegova transformacija u zloglasnog kriminalca Heisenberga donosi jedan od najnapetijih razvojnih lukova u povijesti televizije.Osvojila je 16 Emmy nagrada, stekla kultni status i potaknula nastanak spin-off serije \"Better Call Saul\". Smatra se jednom od najboljih serija svih vremena i nezaobilazan je dio televizijske povijesti. Serija briljira zahvaljujući snažnoj glumi Bryana Cranstona i Aarona Paula, kompleksnom scenariju i moralnim dilemama koje postavlja. \"Breaking Bad\" istražuje granice čovjekove časti, obitelji i ambicije, uz briljantno isprepletene zaplete i nezaboravne dijaloge.', 'breakingbad.jpg', 'drama', 0),
(4, '2025-06-20', 'Interstellar', 'Žanr: Znanstvena fantastika, Drama | Redatelj: Christopher Nolan | Trajanje: 169 min', '\"Interstellar\" je epski znanstvenofantastični film koji kombinira znanost, emociju i vizualnu spektakularnost. Radnja prati bivšeg astronauta Coopera (Matthew McConaughey) koji kreće na putovanje kroz crvotočinu kako bi pronašao novi dom za čovječanstvo suočeno s propasti Zemlje.Christopher Nolan kombinira složene znanstvene teorije s osobnom pričom o ocu i kćeri, istražujući teme časne žrtve, relativnosti vremena i ljudske nadu. Film se istaknuo realističnim prikazom crne rupe zahvaljujući konzultacijama s fizičarem Kipom Thorneom.Glazba Hansa Zimmera dodatno pojačava emotivni naboj filma. \"Interstellar\" je ostavio snažan trag u modernoj kinematografiji i potaknuo publiku na razmišljanje o prirodi svemira i vremena.', 'interstellar.jpg', 'akcija', 0),
(5, '2025-06-20', 'Dark', 'Žanr: Znanstvena fantastika, Misterij, Drama | Stvorili: Baran bo Odar, Jantje Friese | Broj sezona: 3', '\"Dark\" je prva njemačka Netflixova serija i istinski kompleksna znanstvenofantastična priča o putovanju kroz vrijeme, obiteljskim tajnama i neizbježnim petljama sudbine. Serija započinje nestankom dječaka u gradiću Winden, ali ubrzo se otkriva mnogo dublja mreža povezanosti među generacijama.Kroz tri sezone serija briljira u naraciji, atmosferi i glumačkoj izvedbi. Složeni vremenski skokovi i paralelni svjetovi zahtijevaju pažljivo praćenje, što \"Dark\" čini idealnom za ljubitelje misaone i intrigantne fikcije.Pohvaljena za originalnost, stil i ambiciju, \"Dark\" se smatra jednom od najboljih znanstvenofantastičnih serija desetljeća te je ostavila snažan utjecaj na žanr.', 'dark.jpg', 'horor', 0),
(6, '2025-06-20', 'Chernobyl', 'Žanr: Drama, Povijest, Triler | Produkcija: HBO | Broj epizoda: 5', '\"Chernobyl\" je potresna miniserija koja rekonstruira jednu od najgorih nuklearnih katastrofa u povijesti, eksploziju reaktora u sovjetskoj elektrani 1986. godine. Serija se fokusira na borbu znanstvenika i vlasti da razumiju i zaustave katastrofu, kao i na prikrivanje koje je pogoršalo situaciju.Uz izuzetnu izvedbu Jareda Harrisa i Stellana Skarsgårda, serija prikazuje atmosferu straha, nesigurnosti i birokratske inertnosti. Autentičan prikaz sovjetskog sustava, detaljna produkcija i snažan narativ zaslužno su joj donijeli priznanja i pohvale.\"Chernobyl\" je osvojio brojne nagrade, uključujući Emmy za najbolju miniseriju. Svojom dokumentarnom preciznošću i emotivnim intenzitetom ostaje snažan podsjetnik na posljedice nesavjesnog upravljanja tehnologijom.', 'chernobyl.jpg', 'drama', 0),
(7, '2025-06-20', 'Parasite', 'Žanr: Drama, Triler, Crna komedija | Redatelj: Bong Joon-ho | Trajanje: 132 min', '\"Parasite\" je korejski film koji kroz priču o dvije obitelji, jednoj bogatoj i jednoj siromašnoj, prikazuje duboke klasne razlike i socijalnu nepravdu. Obitelj Kim, snalažljiva i siromašna, uspijeva infiltrirati dom imućne obitelji Park, ali situacija ubrzo izmiče kontroli.Redatelj Bong Joon-ho vješto kombinira žanrove, prelazeći iz crne komedije u triler i dramu, pritom ostavljajući snažan društveni komentar. Film je prepun simbola, dvosmislenih scena i upečatljivih obrata.\"Parasite\" je prvi južnokorejski film koji je osvojio Oscara za najbolji film, režiju, originalni scenarij i međunarodni film. Njegova univerzalna poruka o nejednakosti i ljudskoj prirodi čini ga jednim od najvažnijih filmova desetljeća.', 'parasite.jpg', 'horor', 0),
(8, '2025-06-20', 'Joker', 'Žanr: Drama, Triler | Režija: Todd Phillips | Trajanje: 122 min', '\"Joker\" je psihološka drama koja nudi mračan i uznemirujuć pogled na podrijetlo jednog od najpoznatijih zlikovaca iz svijeta stripa. Film prati Arthura Flecka, komičara koji se bori s mentalnom bolešću i osjećajem odbačenosti u bezosjećajnom društvu.Izvanredna izvedba Joaquina Phoenixa priskrbila mu je Oscara, a film je izazvao brojne polemike i pohvale zbog prikaza nasilja, mentalnog zdravlja i socijalne izolacije. Vizualno dojmljiv i emocionalno potresan, \"Joker\" ostavlja snažan dojam.\"Joker\" nije samo film o negativcu, već slojevita studija karaktera i čovječje krhkosti, koja zauvijek mijenja način na koji gledamo ikoničnog lika.', 'joker.jpg', 'drama', 0),
(9, '2025-06-20', 'The Prestige', 'Žanr: Drama, Misterija, Triler | Režija: Christopher Nolan | Trajanje: 130 min', '\"The Prestige\" je intrigantna drama o rivalstvu između dvojice iluzionista u viktorijanskom Londonu. Film istražuje granice opsesije, žertve i iluzije kroz priču isprepletenu tajnama i obratima.Uz izvrsne izvedbe Hugha Jackmana i Christiana Balea te prepoznatljiv režijski pečat Christophera Nolana, film drži gledatelje u neizvjesnosti do samog kraja. \"The Prestige\" postavlja pitanje: koliko ste spremni žrtvovati za savršenu iluziju?Vizualno dojmljiv i tematski slojevit, film ostaje jedan od najcjenjenijih Nolanovih radova koji se pamti i analizira još dugo nakon gledanja.', 'theprestige.jpg', 'drama', 0),
(10, '2025-06-20', 'Mindhunter', 'Žanr: Krimi, Drama, Triler | Producent: David Fincher | Broj sezona: 2', '\"Mindhunter\" je napeta kriminalistička serija koja prati rane dane FBI-evog ponašajnog odjela u kasnim 70-ima. Agent Holden Ford i njegov partner Bill Tench intervjuiraju serijske ubojice u zatvorima kako bi razumjeli njihovu psihu i razvili sustav profiliranja.Serija se temelji na stvarnim događajima i donosi autentičan, psihološki pristup kriminalistici, uz vrhunsku glumu i režiju. \"Mindhunter\" je sporijeg tempa, ali izuzetno intenzivna i inteligentna.Ova serija je nezaobilazna za sve ljubitelje kriminalističkih drama i portreta serijskih ubojica, a njezin stil i atmosfera izdvajaju je u moru sličnih naslova.', 'mindhunter.jpg', 'drama', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
