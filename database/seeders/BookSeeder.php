<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tragèdia d'en Saied Mattar
        $tragedia = new Book();
        $tragedia->slug = "la-tragedia-den-saied-mattar";
        $tragedia->lang = "ca";
        $tragedia->isbn = "978-84-127037-1-9";
        $tragedia->title = "La tragèdia d'en Saied Mattar";
        $tragedia->lang = "ca";
        $tragedia->headline = <<<HEREDOC
        La ciutat de Haifa és el decorat on es desenvolupen diverses històries en quatre temps, gravitant al voltant d'un personatge: en Saied Mattar.
        HEREDOC;
        $tragedia->description = <<<HEREDOC
        La tragèdia d’en Saied Mattar’, primera novel·la de l’escriptor palestí Majd Kayyal, és una poderosa al·legoria de l’alienació cultural dels palestins d’Israel.
        Des del lirisme, que frega l’espai del somni, i d’una construcció argumental que encavalca diferents personatges, Kayyal pinta, amb un llenguatge plàstic i suggestiu, la vida d’aquells que pertanyen perquè no pertanyen, mentre basteix un retrat imperdible de la Haifa contemporània.
        HEREDOC;
        $tragedia->publisher = "Èter Edicions";
        $tragedia->image = "la-tragedia-den-saied-mattar.webp";
        $tragedia->number_of_pages = 149;
        $tragedia->publication_date = Date("2023/04/23");
        $tragedia->pvp = 20.80;
        $tragedia->iva = 4;
        $tragedia->discounted_price;
        $tragedia->stock = 400;
        $tragedia->visible = 1;
        $tragedia->legal_diposit = "B 8646-2023";
        $tragedia->slug = "la-tragedia-den-saied-mattar";
        $tragedia->sample = $tragedia->slug.".pdf";
        $tragedia->meta_title = $tragedia->title;
        $tragedia->meta_description = $tragedia->headline ?? $tragedia->description;
        $tragedia->save();

        $tragedia->authors()->attach(1);
        $tragedia->translators()->attach(2);
        $tragedia->translators()->attach(3);
        $tragedia->collections()->attach(2);

        // Panorama
        $panorama = new Book();
        $panorama->isbn = "978-84-127037-0-2";
        $panorama->title = "Panorama de mort i desolació";
        $panorama->lang = "ca";
        $panorama->headline = <<<HEREDOC
        A Panorama de mort i desolació, Rasha Omran passa comptes amb la devastació dels anys en un exercici que transita entre la rebel·lió, la ràbia i el fatalisme.
        HEREDOC;
        $panorama->description = <<<HEREDOC
        Amb versos esquarterats i lúcids, i sense estalviar-se ni la crueltat ni la tendresa, Omran solapa l’exili que els anys imposen sobre el cos a l’exili que els temps imposen sobre l’individu.
        Omran exposa, sense pors ni concessions als lectors, la vivència d’un trencament polidimensional: un trencament personal, però també generacional i social, el d’una societat que s’ha vist partida per una guerra civil i una nova diàspora. La rellevància d’aquests versos no podia ser ignorada pel públic català.
        HEREDOC;
        $panorama->publisher = "Èter Edicions";
        $panorama->image = "panorama-de-mort-i-desolacio.webp";
        $panorama->number_of_pages = 188;
        $panorama->publication_date = Date("2023/04/20");
        $panorama->pvp = 15;
        $panorama->iva = 4;
        $panorama->discounted_price;
        $panorama->stock = 300;
        $panorama->visible = 1;
        $panorama->legal_diposit = "B 8647-202";
        $panorama->slug = "panorama-de-mort-i-desolacio";
        $panorama->sample = $panorama->slug . ".pdf";
        $panorama->meta_title = $panorama->title;
        $panorama->meta_description = $panorama->headline ?? $panorama->description;
        $panorama->save();

        $panorama->authors()->attach(6);
        $panorama->translators()->attach(4);
        $panorama->collections()->attach(1);


        // Si fossin nens suecs
        $nenssuecs = new Book();
        $nenssuecs->isbn = "978-84-127037-3-3";
        $nenssuecs->title = "Si fossin nens suecs";
        $nenssuecs->lang = "ca";
        $nenssuecs->headline = <<<HEREDOC
        QUÈ FA QUE UN ADOLESCENT COMENCI PER NEGAR-SE A PARLAR FINS A ENFONSAR-SE EN UN SON QUE SEMBLA INACABABLE?
        HEREDOC;
        $nenssuecs->description = <<<HEREDOC
        La síndrome de resignació és una malaltia psiquiàtrica que afecta infants i adolescents refugiats a Suècia: la somatització d’un trauma, reaparegut per la possibilitat d’una deportació —que significa el retorn al bell mig de la ferida— s’inicia amb els símptomes d’una depressió, que sumirà gradualment els afectats en un estat catatònic. Aquest assaig narra alguns dels molts casos que l’autora Elisabeth Hultcrantz ha anat acompanyant els darrers quinze anys. Sense condescendència ni morbositats, ressalta vivament el rostre més humà dels malalts, denuncia la crueltat de les institucions europees i alça la veu en defensa dels drets humans i, d’entre ells, dels drets del col·lectiu més vulnerable: la infància.
        HEREDOC;
        $nenssuecs->publisher = "Èter Edicions i Pol·len Edicions";
        $nenssuecs->image = "si-fossin-nens-suecs.webp";
        $nenssuecs->number_of_pages = 230;
        $nenssuecs->publication_date = Date("2023/10/01");
        $nenssuecs->pvp = 21;
        $nenssuecs->iva = 4;
        $nenssuecs->discounted_price;
        $nenssuecs->stock = 300;
        $nenssuecs->visible = 1;
        $nenssuecs->legal_diposit = "B 16476-2023";
        $nenssuecs->slug = "si-fossin-nens-suecs";
        $nenssuecs->sample = $nenssuecs->slug . ".pdf";
        $nenssuecs->meta_title = $nenssuecs->title;
        $nenssuecs->meta_description = $nenssuecs->headline ?? $nenssuecs->description;
        $nenssuecs->save();

        $nenssuecs->authors()->attach(9);
        $nenssuecs->translators()->attach([7, 8]);
        $nenssuecs->collections()->attach(4);


        // Orientalisme i orientalisme invers
        $orientalisme = new Book();
        $orientalisme->isbn = "978-84-127037-4-0";
        $orientalisme->title = "Orientalisme i orientalisme invers";
        $orientalisme->lang = "ca";
        $orientalisme->description = <<<HEREDOC
        L’assaig Orientalisme i Orientalisme invers aparegué en àrab [al-Istixraq wa-l-Istixraq ma’kussan] per primer cop en la revista libanesa al-Hayat al-Jadida [Nova Vida], al número 2 de gener-febrer de 1981. El text es divideix en dos articles. El primer és una extensa ressenya del llibre Orientalisme d’Edward Said, publicat a Nova York l’any 1978. El segon, «Orientalisme invers», estructura una crí tica aguda i no gens comportívola de dos corrents de pensament aleshores en alça al món àrab: el nacionalisme essencialista conservador i el radicalisme islàmic. L’autor enfoca la crítica partint dels estrets lligams que observa entre els postulats de l’orientalisme occidental i ambdós corrents. La crítica que Sàdiq Jalal al-Àzem planteja a Edward Said, tanmateix, no el situa pas d’entrada en la llista de ‘detractors’, perquè a «Orientalisme invers», al-Àzem expressa el seu acord amb Said en alguns aspectes del discurs exposat a Orientalisme i els fa servir com a punt de partida per a dirigir la crítica vers el nacionalisme conservador i l’islamisme. Com a principi vertebrador del text, trobem el rebuig a l’essencialisme que defineix trets propis, inalterables i irreconciliables. Aquesta edició, primera en català de la mà de la traductora Margarida Castells, inclou la breu, però intensa, correspondència que mantingueren al-Àzem i Edward W. Said.
        HEREDOC;
        $orientalisme->publisher = "Èter Edicions";
        $orientalisme->image = "orientalisme-i-orientalisme-invers.webp";
        $orientalisme->number_of_pages = 118;
        $orientalisme->publication_date = Date("2024/01/20");
        $orientalisme->pvp = 21;
        $orientalisme->iva = 4;
        $orientalisme->discounted_price;
        $orientalisme->stock = 100;
        $orientalisme->visible = 1;
        $orientalisme->legal_diposit = "B 16476-2023";
        $orientalisme->enviromental_footprint = "527 grams";
        $orientalisme->slug = "orientalisme-i-orientalisme-invers";
        $orientalisme->sample = $orientalisme->slug . ".pdf";
        $orientalisme->meta_title = $orientalisme->title;
        $orientalisme->meta_description = $orientalisme->headline ?? $orientalisme->description;
        $orientalisme->save();

        $orientalisme->authors()->attach(10);
        $orientalisme->translators()->attach(4);
        $orientalisme->collections()->attach(5);


        // La insubmisa de Gaza
        $insubmisa = new Book();
        $insubmisa->isbn = "pending";
        $insubmisa->title = "La insubmisa de Gaza";
        $insubmisa->lang = "ca";
        $insubmisa->description = <<<HEREDOC
        Filla de Rafah, periodista i escriptora palestina, la vida d’Asmaa Alghoul s’ha vist tenallada pel xoc de dues forces: d’una banda, l’exèrcit d’Israel, els soldats del qual terroritzaven les nits i els dies de la seva infància. De l’altra, l’ascens de l’integrisme religiós de Hamàs, que va prendre el poder polític i social durant la seva joventut, també en el si de la seva família.
        Alghoul, per un caprici del  seu propi temperament i un entorn obert que li ha permès de no tenir pèls a la llengua, s’ha vist sempre sota el punt de mira de totes les faccions que la rodejaven. Liberal, musulmana secular i activista pels drets democràtics, s’ha oposat frontalment a la petrificació islamista de Hamàs, a la corrupció del Fatah i, com a teló de fons, al sempitern setge d’Israel sobre Gaza. Escrit a quatre mans entre ella i l’escriptor libanès Sélim Nassib, La insubmisa de Gaza és al mateix temps una biografia d’Alghoul i una poderosa crònica de trenta anys d’història de la Franja.
        Vitalista a la vegada que greu, amb tant d’humor com de duresa, La insubmisa de Gaza no és només, però, una incisiva anàlisi social i política: és sobretot un cant d’amor a la llibertat i a la cultura, la història d’algú que ha lluitat sempre en favor del seu poble i del seu immens desig de vida. La història d’algú que estima i comprèn, íntimament, Gaza i la seva gent.
        HEREDOC;
        $insubmisa->publisher = "Èter Edicions";
        $insubmisa->image = "la-insubmisa-de-gaza.webp";
        $insubmisa->number_of_pages = 300;
        $insubmisa->publication_date = Date("2024/05/01");
        $insubmisa->pvp = 21;
        $insubmisa->iva = 4;
        $insubmisa->discounted_price;
        $insubmisa->stock = 100;
        $insubmisa->visible = 1;
        $insubmisa->legal_diposit = "pending";
        $insubmisa->slug = "la-insubmisa-de-gaza";
        $insubmisa->sample = $insubmisa->slug . ".pdf";
        $insubmisa->meta_title = $insubmisa->title;
        $insubmisa->meta_description = $insubmisa->headline ?? $insubmisa->description;
        $insubmisa->save();

        $insubmisa->authors()->attach([11,12]);
        $insubmisa->translators()->attach(8);
        $insubmisa->collections()->attach(5);
    }
}
