<?php

namespace Database\Seeders;

use Carbon\Carbon;

use App\Models\Post;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Models\Author;
use App\Models\Translator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $oriol_collabTranslation = CollaboratorTranslation::where('first_name', 'LIKE', '%Oriol%')->where('last_name', 'LIKE', '%Rissech%')->first();
        $oriol_collab = $oriol_collabTranslation->collaborator;
        $oriol_author = $oriol_collab->author;
        $oriol_translator = $oriol_collab->translator;
        $oriol_user = User::where('first_name', 'LIKE', '%Oriol%')->where('last_name', 'LIKE', '%Rissech%')->first();

        $post1 = new Post();
        $post1->title = "'Síndrome de gel', una reflexió sobre el trauma del desarrelament dels refugiats";
        $post1->author_id = $oriol_author->id;
        $post1->image = "sindrome-de-gel.webp";
        $post1->description ="Què fa que un adolescent comenci per negar-se a parlar fins enfonsar-se ràpidament en un son aparentment inacable?";
        $post1->content = <<<HEREDOC
        El director Xicu Masó, amb els dramaturgs Mohammad Bitari i Claudia Cedó, estrenen al Teatre Lliure de Gràcia Síndrome de gel, un espectacle de nova creació sobre l'anomenada 'síndrome de resignació' que tracta el trauma del desarrelament dels refugiats que arriben a Europa.\nLa 'síndrome de resignació' és una misteriosa malaltia que, des de la dècada dels anys 90 a Suècia, afecta només els nens i joves provinents de l'Est, de Síria, i particularment la minoria religiosa jazidita. Una malaltia que porta a la letargia en resposta al trauma del desarrelament i la por de ser tornats al país d'origen on tant han patit. «Els nens deixen de jugar, de parlar, de menjar i entren en un estat catatònic, gairebé en estat de coma», explica Cedó: «Et preguntes què deuen haver viscut aquests nens -els éssers més adaptables del món- per voler apagar-se'n forma».\nLa font principal d'informació d'aquest espectacle, que sense ser un documental vol mantenir el rigor de les dades que es donen, és el llibre de la metgessa sueca Elisabeth Hultcrantz, la primera persona que va identificar aquest fenomen i va donar legalitat a aquesta malaltia, inexistent per al sistema mèdic suec i per al món.\nXicu Masó torna, doncs, a abordar el tema de la migració després del seu espectacle El metge de Lampedusa, estrenat al mateix teatre la temporada passada. Si aleshores se centrava en el viatge migratori, ara ho fa en els efectes i traumes dels refugiats una vegada establerts. Síndrome de gel explica la història d'Eman i les seves dues filles adolescents, Barán i Ginar, a qui deneguen el permís de residència. Davant el terror d'haver de tornar a l'Iraq, on el Daesh segueix present malgrat la fi oficial de la guerra armada, desenvolupen la síndrome. La història dibuixa una Suècia, cinquena essència de la socialdemocràcia amb una política del benestar i un concepte de la independència molt avançats, en el moment que el país tanca fronteres a causa del creixement de la ultradreta.\nEl repartiment està format pels intèrprets Sílvia Albert Sopale, Muntsa Alcanyís, Judit Farrés, Carles Martínez, Roc Martínez, Ramon Micó, Jana Punsola i Manar Taljo. Asma Ismail, malgrat no ser actriu professional, se suma a aquest repartiment aprofitant la seva experiència de vida que, com a refugiada palestina arribada a Catalunya el 2010, aporta un testimoni en primera persona molt valuós.
        HEREDOC;
        $post1->published_by = $oriol_user->id;
        $post1->publication_date = Carbon::createFromFormat('Y/m/d', '2022/03/23')->toDateTimeString();
        $post1->slug = "sindrome-de-gel-una-reflexio-sobre-el-trauma-del-desarrelament-dels-refugiats";
        $post1->meta_title = "Síndrome de gel, el trauma dels refugiats";
        $post1->meta_description = "El director Xicu Masó, amb els dramaturgs Mohammad Bitari i Claudia Cedó, estrenen al Teatre Lliure de Gràcia Síndrome de gel, un espectacle de nova creació sobre l'anomenada 'síndrome de resignació' que tracta el trauma del desarrelament dels refugiats que arriben a Europa.";
        $post1->save();

        $post2 = new Post();
        $post2->title = "Orientalisme i orientalisme invers";
        // $post2->author_id = CollaboratorTranslation::where('first_name', 'LIKE', 'Oriol')->where('last_name', 'LIKE', 'Rissech')->first()->collaborator_id;
        $post2->description = "Col·loqui. Aproximació interdisciplinària a Sàdiq Jalal al-Àzem.";
        $post2->image = "colloqui-orientalisme.webp";
        $post2->content = <<<HEREDOC
        Us convidem el proper dilluns 15 d’abril a un col·loqui sobre ‘Orientalisme i orientalisme invers’, del filòsof sirià Sàdiq Jalal al-Àzem, coeditat amb @pollen_edicions.  Com hem d’entendre actualment el concepte ‘Orientalisme’?  Té sentit parlar del concepte que Al-Àzem planteja, ‘Orientalisme invers’?  Com es plantegen actualment, des de les humanitats, els conceptes ‘identitat’, ‘essencialisme’ o ‘l’Altre’?  Són rellevants encara les tesis de Sàdiq Jalal al-Àzem per entendre les relacions entre els constructes ‘Occident’ i ‘Orient’? Com apliquen a l’actual situació de Gaza i al conflicte de Palestina?  🔍On? Residència d’Investigadors – CSIC, Carrer de l'Hospital, 64, Barcelona  ⏰Quan? Dilluns 15 d’abril, a les 18h  Amb la participació de:  Norbert Bilbeny, catedràtic d'ètica a @filosofia_ub Annalisa Mirizio, Professora al grau d'Estudis Literaris i al Màster de Teoria de la Literatura i Literatura Comparada  Mònica Rius, Professora del grau d'Estudis Àrabs i Hebreus, i del Màster en Creació i Representació d'Identitats Culturals (UB), directora del centre de recerca ADHUC, Teoria, gènere, sexualitat .  Presenta i modera Josep Martí, antropòleg i investigador al CSIC.  Us hi esperem!
        HEREDOC;
        $post2->date = Carbon::createFromFormat('Y/m/d', '2024/04/15')->toDateTimeString();
        $post2->location = "Residència d'Investigadors-CSIC. Carrer de l'Hospital, 64. Barcelona";
        $post2->published_by = $oriol_user->id;
        $post2->publication_date = Carbon::createFromFormat('Y/m/d', '2024/03/23')->toDateTimeString();
        $post2->slug = "colloqui-orientalisme-i-orientalisme-invers";
        $post2->meta_title = "Col·loqui Orientalisme i orientalisme invers";
        $post2->meta_description = "Us convidem el proper dilluns 15 d’abril a un col·loqui sobre ‘Orientalisme i orientalisme invers’, del filòsof sirià Sàdiq Jalal al-Àzem, coeditat amb @pollen_edicions.  ";
        $post2->save();

        $post3 = new Post();
        $post3->title = "Presentació del llibre 'La tragèdia d'en Saied Mattar'";
        $post3->description = "Presentació del llibre 'La tragèdia d'en Saied Mattar' de Majd Kayyal i xerrada a càrrec de Mohammad Bitari i Oriol Rissech.";
        $post3->image = "presentacio-llibre-saied-mattar.webp";
        $post3->content = <<<HEREDOC
        El proper dissabte 24 de febrer al matí serem a @lafigaflor.llibreria per participar a la xerrada ‘Qui ensenya vida’! Parlarem de ‘La tragèdia d’en Saied Mattar’ i la història dels palestins del 48, o de l’interior. Amb nosaltres, participaran la @neiix5 i el col·lectiu @montserratiambpalestina!
        HEREDOC;
        $post3->date = Carbon::createFromFormat('Y/m/d', '2024/02/24')->toDateTimeString();
        $post3->location = "Espai Cultural La Figaflor";
        $post3->published_by = $oriol_user->id;
        $post3->publication_date = Carbon::createFromFormat('Y/m/d', '2024/01/31')->toDateTimeString();
        $post3->slug = "presentacio-llibre-saied-mattar";
        $post3->meta_title = "Presentació de llibre";
        $post3->meta_description = "El proper dissabte 24 de febrer al matí presentarem el llibre 'La tragèdia d'en Saied Mattar'. Parlarem de ‘La tragèdia d’en Saied Mattar’ i la història dels palestins del 48, o de l’interior.";
        $post3->save();
    }
}
